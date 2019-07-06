<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Fillables
     */
    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'phone', 'email', 'address', 'city', 'state', 'country_id',
    ];
}
