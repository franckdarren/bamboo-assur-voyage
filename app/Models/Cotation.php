<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'voyageurs',
        'depart',
        'retour',
        'nombre_jours',
        'montant',
    ];

    public function souscriptions()
    {
        return $this->hasMany(Souscription::class);
    }
}
