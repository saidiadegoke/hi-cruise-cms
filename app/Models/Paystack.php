<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paystack extends Model
{
    //
    protected $fillable = [
        'amount', 'reference', 'channel', 'transaction_date'
    ];

    public function payable()
    {
        return $this->morphOne('App\Models\Payment', 'payable');
    }
}
