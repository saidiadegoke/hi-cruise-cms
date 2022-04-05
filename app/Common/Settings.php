<?php

namespace App\Common;

use App\Models\CruiseDateSetting;

class Settings
{
	public static function get($key) {
		$setting = CruiseDateSetting::where('key', $key)->first();
		return !$setting? 'Not set': $setting->value?: $setting->default;
	}
}