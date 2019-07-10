<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
    * Fillables
    */
    protected $fillable = [
    	'title', 'description', 'source', 'published', 'page',
    ];

    public function file() {
    	return $this->belongsTo('App\Models\UploadedFile', 'source');
    }
}
