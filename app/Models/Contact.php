<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Fillables
     */
    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'comment',
    ];
}
