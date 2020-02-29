<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CruiseDateSetting extends Model
{
    /**
    * Fillables
    */
    protected $fillable = [
    	'key', 'value', 'default',
    ];

    public function getItem($key) {
    	$settings = $this->all();
    	foreach($settings as $setting) {
    		if($setting->key == $key) {
    			return strlen(strval($setting->value)) > 0? $setting->value: $setting->default;
    		}
    	}
    	return null;
    }
}
