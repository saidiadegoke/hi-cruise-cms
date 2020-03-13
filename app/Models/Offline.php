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
}
