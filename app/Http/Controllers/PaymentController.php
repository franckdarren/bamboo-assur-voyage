<?php

namespace App\Http\Controllers;

use App\Jobs\EnvoyerConfirmationPaiementSouscriptionEnLigne;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'cotation_id' => 'required|integer',
        ]);

        $transaction = Transaction::create([
            'reference' => uniqid('txn_'),
            'customer_name' => $validated['name'],
            'customer_email' => $validated['email'],
            'customer_msisdn' => $validated['phone'],
            'amount' => $validated['amount'],
            'cotation_id' => $validated['cotation_id'],
            'status' => 'created',
        ]);

        $idRef = $transaction->reference;
        try {
            $response = Http::withBasicAuth('FranckDarren', '46363079-3caf-4cf9-ba59-dcf40b4cd53a')
                ->timeout(30)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post('https://lab.billing-easy.net/api/v1/merchant/e_bills', [
                    'reference' => $transaction->reference,
                    'amount' => $transaction->amount,
                    'payer_email' => $transaction->customer_email,
                    'payer_msisdn' => $transaction->customer_msisdn,
                    'due_date' => now()->addDay()->toDateString(),
                    'short_description' => 'Payment for Souscription',
                    'merchant_redirect_url' => url('/payment-success/' . $transaction->reference),
                ]);
            if ($response->successful() && isset($response->json()['e_bill']['bill_id'])) {
                $data = $response->json();
                $transaction->update([
                    'status' => 'pending',
                    'transaction_id' => $data['e_bill']['bill_id'],
                ]);

                // Rediriger le client vers la plateforme eBilling avec les bons paramètres
                $redirectUrl = 'https://test.billing-easy.net?invoice='
                    . $data['e_bill']['bill_id']
                    . '&redirect_url='
                    . urlencode(url('/payment-success/' . $transaction->reference));

                $bill_id = $data['e_bill']['bill_id'];
                $eb_callbackurl = urlencode(route('payment.success', ['id' => $transaction->reference]));



                // dd($redirectUrl);
                // Redirect to E-Billing portal
                // echo "<form action='" . env('POST_URL', 'https://test.billing-easy.net') . "' method='post' name='frm'>";
                // echo "<input type='hidden' name='invoice_number' value='" . $bill_id . "'>";
                // echo "<input type='hidden' name='eb_callbackurl' value='" . $eb_callbackurl . "'>";
                // echo "</form>";
                // echo "<script language='JavaScript'>";
                // echo "document.frm.submit();";
                // echo "</script>";

                // exit();

                return redirect()->away($redirectUrl);

            }

            return back()->with('error', 'Unable to initiate payment. Invalid API response.');
        } catch (\Exception $e) {
            Log::error('E-Billing API error: ' . $e->getMessage());
            return back()->with('error', 'Unable to initiate payment. Please try again.');
        }
    }


    public function callback(Request $request)
    {
        $transaction = Transaction::where('reference', $request->input('reference'))->first();

        if ($transaction) {
            $transaction->update([
                'status' => 'paid',
                'paid_at' => now(),
                'operator' => $request->input('paymentsystem'),
                'transaction_id' => $request->input('transactionid'),
            ]);

            //Mettre a jour le statut de la souscription
            $transaction->cotation->souscription->update([
                'statut' => 'Payée',
            ]);

            $souscription = $transaction->cotation->souscription;
            $cotation = $transaction->cotation;

            // Envoyer la confirmation par email
            EnvoyerConfirmationPaiementSouscriptionEnLigne::dispatch($souscription, $cotation);

            return response()->json(['message' => 'Callback processed successfully'], 200);
        }

        return response()->json(['message' => 'Transaction not found'], 404);
    }

    public function success(string $id)
    {
        if ($transaction = Transaction::where('transaction_id', $id)->first()) {
            if ($transaction && $transaction->status == 'paid') {
                return view('payment.success', [
                    'message' => 'Your payment was successful!',
                    'transaction' => $transaction
                ]);
            } else {
                return view('payment.error', [
                    'message' => 'Your payment was err!',
                    'transaction' => $transaction
                ]);
            }
        }

        if ($transaction = Transaction::where('reference', $id)->first()) {
            if ($transaction && $transaction->status == 'paid') {
                return view('payment.success', [
                    'message' => 'Your payment was successful!',
                    'transaction' => $transaction
                ]);
            } else {
                return view('payment.error', [
                    'message' => 'Payment failed. Please try again.',
                    'transaction' => $transaction
                ]);
            }
        }



    }

    public function relancer_payement(string $id)
    {
        $transaction = Transaction::where('transaction_id', $id)->first();

        // Vérifier si la différence en heures est inférieure à 1
        if ($transaction->created_at->diffInMinutes(Carbon::now()) < 60) {
            $redirectUrl = 'https://test.billing-easy.net?invoice='
                . $id
                . '&redirect_url='
                . urlencode(url('/payment-success/' . $transaction->transaction_id));

            // Rediriger vers l'URL externe
            return redirect()->away($redirectUrl);
        } else {
            // Rediriger vers la page d'accueil ou une autre URL interne
            return redirect(url('/'));
        }
    }




}
