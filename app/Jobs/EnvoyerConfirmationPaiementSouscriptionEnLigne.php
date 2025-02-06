<?php

namespace App\Jobs;

use App\Models\Cotation;
use App\Models\Souscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\ConfirmationPaiementSouscriptionEnLigne;

class EnvoyerConfirmationPaiementSouscriptionEnLigne implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $souscription;
    public $cotation;

    /**
     * Create a new job instance.
     */
    public function __construct(Souscription $souscription, Cotation $cotation)
    {
        $this->souscription = $souscription;
        $this->cotation = $cotation;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->souscription->email_souscripteur)
            ->send(new ConfirmationPaiementSouscriptionEnLigne($this->souscription, $this->cotation));
    }
}
