<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'reference',
        'customer_name',
        'customer_email',
        'amount',
        'status',
        'paid_at',
        'operator',
        'transaction_id',

        'cotation_id',
        'customer_msisdn',

    ];

    public function cotation()
    {
        return $this->belongsTo(Cotation::class);
    }
}
