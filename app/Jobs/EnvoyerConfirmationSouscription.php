<?php

namespace App\Jobs;

use App\Models\Rdv;
use App\Models\Cotation;
use App\Models\Souscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationSouscription;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EnvoyerConfirmationSouscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $souscription;
    public $cotation;
    public $rdv;

    /**
     * Create a new job instance.
     */
    public function __construct(Souscription $souscription, Cotation $cotation, Rdv $rdv)
    {
        $this->souscription = $souscription;
        $this->cotation = $cotation;
        $this->rdv = $rdv;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->souscription->email_souscripteur)
            ->send(new ConfirmationSouscription($this->souscription, $this->cotation, $this->rdv));
    }
}
