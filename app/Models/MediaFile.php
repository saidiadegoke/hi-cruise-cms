<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    //
    protected $fillable = ["type", "yatch_id", "source"];

    public function yatch()
    {
        return $this->belongsTo(Yatch::class);
    }
}
