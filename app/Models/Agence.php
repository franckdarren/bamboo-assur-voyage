<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = [
        'nom',
        'localisation',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function rdvs()
    {
        return $this->hasMany(Rdv::class);
    }
}
