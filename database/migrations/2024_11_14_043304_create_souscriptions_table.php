<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom_souscripteur');
            $table->string('adresse_souscripteur');
            $table->string('phone_souscripteur');
            $table->string('email_souscripteur');
            $table->string('nom_prenom_assure');
            $table->date('date_naissance_assure');
            // $table->string('adresse_assure');
            // $table->string('phone_assure');
            $table->string('email_assure')->nullable();
            $table->string('passeport_assure');
            $table->string('url_passeport_assure');
            $table->string('url_billet_voyage');

            $table->string('statut')->default('En attente de paiement');
            $table->string('mode_paiement')->default('En agence');


            $table->foreignId('cotation_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souscriptions');
    }
};
