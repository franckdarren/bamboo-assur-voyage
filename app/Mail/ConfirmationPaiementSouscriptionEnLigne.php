<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationPaiementSouscriptionEnLigne extends Mailable
{
    use Queueable, SerializesModels;
    public $souscription;
    public $cotation;

    /**
     * Create a new message instance.
     */
    public function __construct($souscription, $cotation)
    {
        $this->souscription = $souscription;
        $this->cotation = $cotation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation Paiement Souscription En Ligne',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    public function build()
    {
        return $this->view('emails.confirmation_souscription_enligne')
            ->with([
                'souscription' => $this->souscription,
                'cotation' => $this->cotation,
                'montantParAssure' => $this->cotation->montant / $this->cotation->voyageurs
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
