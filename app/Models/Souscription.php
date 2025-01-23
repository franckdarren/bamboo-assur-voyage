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
        'email_assure',
        'passeport_assure',
        'cotation_id',
        'statut',
        'mode_paiement',
        'url_passeport_assure',
        'url_billet_voyage'

    ];

    public function getMontantParVoyageurAttribute()
    {
        // Vérifier si la cotation est présente et que le nombre de voyageurs est supérieur à zéro
        if ($this->cotation && $this->cotation->voyageurs > 0) {
            // Formatage avec un espace comme séparateur de milliers
            return number_format($this->cotation->montant / $this->cotation->voyageurs, 0, ',', ' ') . ' FCFA';
        }

        return 'N/A'; // Si la cotation n'est pas définie ou si le nombre de voyageurs est zéro
    }


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
