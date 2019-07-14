<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    //
    protected $fillable = ["name", "description"];

    protected $with = ["packages"];
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function images()
    {
        return $this->hasManyThrough(UploadedFile::class, MediaFile::class, 'yacht_id', 'id');
    }

    // public function media()
    // {
    //     return $this->hasMany(MediaFile::class);
    // }
}
