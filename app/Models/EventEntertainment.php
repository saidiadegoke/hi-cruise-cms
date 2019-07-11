<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventEntertainment extends Model
{
    //
    protected $fillable = ["name", "questionaire_id"];
    public function reservation()
    {
        return $this->belongsTo(Questionaire::class);
    }
}
