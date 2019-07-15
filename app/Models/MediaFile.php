<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    //
    protected $fillable = [
        "type", "title", "description", "source", "purpose", "published"
    ];

    public function file() {
    	return $this->belongsTo('App\Models\UploadedFile', 'source');
    }

    public function mediaFilePurpose() {
    	return $this->belongsTo('App\Models\MediaFilePurpose', 'purpose');
    }
}
