<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailableDay extends Model
{
    //
    protected $fillable = ["available_day_id"];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
