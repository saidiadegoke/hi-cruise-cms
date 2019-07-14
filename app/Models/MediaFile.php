<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    //
    protected $fillable = ["type", "yacht_id", "source"];

    public function yacht()
    {
        return $this->belongsTo(Yacht::class);
    }
}
