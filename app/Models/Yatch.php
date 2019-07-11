<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yatch extends Model
{
    //
    protected $fillable = ["name", "description"];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
