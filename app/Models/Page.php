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

    public static function getContent($field) {
    	return \App\Models\Page::select('value')->where(['field' => $field, 'published' => 1])->first()['value'];
    }

    public static function byCategory($id) {
    	$rows = \App\Models\Page::where(['page_category_id' => $id, 'published' => 1])->get();
    	$pages = [];
    	foreach($rows as $row) {
    		$pages[$row['field']] = $row['value'];
    	}
    	return $pages;
    }
}
