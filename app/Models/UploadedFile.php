<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    /**
     * Fillables
     */
    protected $fillable = [
        'filename', 'extension', 'mime', "type"
    ];
}
