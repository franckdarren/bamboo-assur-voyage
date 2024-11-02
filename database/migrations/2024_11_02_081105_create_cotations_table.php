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
        Schema::create('cotations', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->integer('voyageurs')->default(1);
            $table->date('depart');
            $table->date('retour');
            $table->integer('nombre_jours')->nullable();
            $table->integer('montant')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotations');
    }
};
