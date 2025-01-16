<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siege extends Model
{
    protected $fillable = [
        'nom',
        'localisation',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
