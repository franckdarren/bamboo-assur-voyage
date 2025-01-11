<?php

namespace App\Mail;

use App\Models\Rdv;
use App\Models\Cotation;
use App\Models\Souscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationSouscription extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $souscription;
    public $cotation;
    public $rdv;

    public function __construct($souscription, $cotation, $rdv)
    {
        $this->souscription = $souscription;
        $this->cotation = $cotation;
        $this->rdv = $rdv;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation Souscription',
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
        return $this->view('emails.confirmation_souscription')
            ->with([
                'souscription' => $this->souscription,
                'cotation' => $this->cotation,
                'rdv' => $this->rdv,
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
