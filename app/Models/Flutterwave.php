<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flutterwave extends Model
{
    protected $fillable = [
    	'amount', 'reference', 'transaction_id', 'status', 'currency', 'transaction_date',
    ];
}
