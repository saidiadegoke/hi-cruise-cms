<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFilePurpose extends Model
{
    /**
     * Fillables
     */
    protected $fillable = [
        'name',
    ];

    public function mediaFiles() {
    	return $this->hasMany('App\Models\MediaFile', 'purpose')->orderBy('updated_at', 'DESC');
    }
}
