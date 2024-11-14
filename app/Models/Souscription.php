<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Souscription extends Model
{
    protected $fillable = [
        'nom_prenom_souscripteur',
        'adresse_souscripteur',
        'phone_souscripteur',
        'email_souscripteur',
        'nom_prenom_assure',
        'date_naissance_assure',
        'adresse_assure',
        'phone_assure',
        'email_assure',
        'passeport_assure',
        'cotation_id',
        'statut'

    ];

    public function cotation()
    {
        return $this->belongsTo(Cotation::class);
    }

    // Relation avec les rendez-vous
    public function rendezvous()
    {
        return $this->hasMany(Rdv::class);
    }
}
