<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'package_id', 'start_date', 'finish_date',  'seats', 'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
