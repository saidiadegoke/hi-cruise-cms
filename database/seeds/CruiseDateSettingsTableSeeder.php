<?php

use Illuminate\Database\Seeder;

class CruiseDateSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
        	[
        		'key' => 'select_days_by_default',
        		'value' => '1',
        		'default' => '1'
        	],
        	[
        		'key' => 'days_per_page',
        		'value' => '30',
        		'default' => '30'
        	]
        ];

        DB::table('cruise_date_settings')->truncate();
        DB::table('cruise_date_settings')->insert($settings);
    }
}
