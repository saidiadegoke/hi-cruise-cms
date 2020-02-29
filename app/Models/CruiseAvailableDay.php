<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CruiseAvailableDay extends Model
{
    /**
    * Fillables
    */
    protected $fillable = [
    	'short', 'long', 'available',
    ];
}
