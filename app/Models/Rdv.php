<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $fillable = [
        'date_rdv',
        'heure_rdv',
        'agence',
        'souscription_id',
    ];

    public function souscription()
    {
        return $this->belongsTo(Souscription::class);
    }
}
