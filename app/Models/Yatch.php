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

    public function images()
    {
        return $this->hasManyThrough(UploadedFile::class, MediaFile::class, 'yatch_id', 'id');
    }

    // public function media()
    // {
    //     return $this->hasMany(MediaFile::class);
    // }
}
