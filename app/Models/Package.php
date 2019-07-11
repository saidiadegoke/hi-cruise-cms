<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ["name", "description", "price", "available_days", "yatch_id"];
    //
    public function yatch()
    {
        return $this->belongsTo(Yatch::class);
    }
}
