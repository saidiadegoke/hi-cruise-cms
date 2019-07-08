<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'amount', 'reservation_id', 'status', 'reference', 'payable_id', 'payable_type', 'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
