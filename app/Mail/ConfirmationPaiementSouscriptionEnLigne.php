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
    protected $pdfContent;

    /**
     * Create a new message instance.
     */
    public function __construct($souscription, $cotation, $pdfContent)
    {
        $this->souscription = $souscription;
        $this->cotation = $cotation;
        $this->pdfContent = $pdfContent;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation Paiement Souscription',
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
            ])
            ->attachData($this->pdfContent, 'document.pdf', [
                'mime' => 'application/pdf',
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
