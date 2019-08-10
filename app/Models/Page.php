<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
    	'field', 'label', 'value', 'page_category_id', 'published',
    ];

    public function category() {
    	return $this->belongsTo('App\Models\PageCategory', 'page_category_id');
    }
}
