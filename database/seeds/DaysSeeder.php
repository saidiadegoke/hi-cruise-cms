<?php

use Illuminate\Database\Seeder;
use App\Models\Day;
use \Carbon\Carbon;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now()->toDateTimeString();
        Day::insert([
            ["name" => "Sunday", "abbreviation" => "Sun", "created_at" => $now, "updated_at" => $now],
            ["name" => "Monday", "abbreviation" => "Mon", "created_at" => $now, "updated_at" => $now],
            ["name" => "Tuesday", "abbreviation" => "Tue", "created_at" => $now, "updated_at" => $now],
            ["name" => "Wednesday", "abbreviation" => "Wed", "created_at" => $now, "updated_at" => $now],
            ["name" => "Thursday", "abbreviation" => "Thu", "created_at" => $now, "updated_at" => $now],
            ["name" => "Friday", "abbreviation" => "Fri", "created_at" => $now, "updated_at" => $now],
            ["name" => "Saturday", "abbreviation" => "Sat", "created_at" => $now, "updated_at" => $now]
        ]);
    }
}
