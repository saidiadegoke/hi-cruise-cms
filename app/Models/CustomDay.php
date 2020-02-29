<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomDay extends Model
{
    /**
    * Fillables
    */
    protected $fillable = [
    	'date', 'day', 'night', 'available',
    ];
}
