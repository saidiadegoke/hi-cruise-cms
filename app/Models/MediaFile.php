<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    //
    protected $fillable = [
        "type", "title", "description", "source", "purpose", "published", 'yacht_id'
    ];

    protected $with = ['file', 'mediaFilePurpose'];

    public function file()
    {
        return $this->belongsTo('App\Models\UploadedFile', 'source');
    }

    public function yacht() {
        return $this->belongsTo('App\Models\Yacht');
    }

    public function mediaFilePurpose()
    {
        return $this->belongsTo('App\Models\MediaFilePurpose', 'purpose');
    }
}
