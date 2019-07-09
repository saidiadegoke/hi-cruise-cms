<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    //

    protected $guarded = [];
    protected $casts = ['decoration' => 'array', 'entertainment' => 'array'];
}
