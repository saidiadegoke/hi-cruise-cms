<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ["name", "description", "price", "yacht_id", "type", "publish", "total_available"];
    //
    public function yacht()
    {
        return $this->belongsTo(Yacht::class);
    }

    public function available_days()
    {
        return $this->hasManyThrough(Day::class, AvailableDay::class, 'package_id', 'id', 'id', 'day_id');
    }
}
