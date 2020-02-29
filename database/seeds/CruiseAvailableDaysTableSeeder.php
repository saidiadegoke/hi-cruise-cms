<?php

use Illuminate\Database\Seeder;

class CruiseAvailableDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
        	[
        		'short' => 'Mon', 
        		'long' => 'Monday', 
        		'available' => 0
        	],
        	[
        		'short' => 'Tue', 
        		'long' => 'Tuesday', 
        		'available' => 0
        	],
        	[
        		'short' => 'Wed', 
        		'long' => 'Wednesday', 
        		'available' => 0
        	],
        	[
        		'short' => 'Thu', 
        		'long' => 'Thursday', 
        		'available' => 0
        	],
        	[
        		'short' => 'Fri', 
        		'long' => 'Friday', 
        		'available' => 0
        	],
        	[
        		'short' => 'Sat', 
        		'long' => 'Saturday', 
        		'available' => 1
        	],
        	[
        		'short' => 'Sun', 
        		'long' => 'Sunday', 
        		'available' => 1
        	]
        ];

        DB::table('cruise_available_days')->truncate();
        DB::table('cruise_available_days')->insert($days);
    }
}
