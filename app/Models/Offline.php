<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offline extends Model
{
    /**
    * Fillables
    */
    protected $fillable = [
    	"amount_paid", "reference_no", "account", "date_paid_at", "time_paid_at", "status"
    ];

    public function payable()
    {
        return $this->morphOne('App\Models\Payment', 'payable');
    }

    public function reservation() {
        return $this->belongsTo('App\Models\Reservation', 'reference_no');
    }
}
