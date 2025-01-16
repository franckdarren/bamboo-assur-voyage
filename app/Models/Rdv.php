<?php

namespace App\Models;

use App\Models\Agence;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $fillable = [
        'date_rdv',
        'heure_rdv',
        'agence_id',
        'souscription_id',
    ];

    public function souscription()
    {
        return $this->belongsTo(Souscription::class);
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }
}
