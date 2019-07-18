<?php

use Illuminate\Database\Seeder;
use App\Models\Package;
use Carbon\Carbon;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        //name,description,price
        Package::insert([
            [

                "created_at" => $now,
                "updated_at" => $now,
                "name" => "PRESTIGE PACKAGE",
                "description" => "",
                "yacht_id" => 1,
                "price" => 30000
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "name" => "DELUXE PACKAGE",
                "description" => "",
                "yacht_id" => 1,
                "price" => 35000
            ],

            [
                "created_at" => $now,
                "updated_at" => $now,
                "name" => "ROYAL PACKAGE",
                "description" => "",
                "yacht_id" => 1,
                "price" => 1000000
            ],
            [

                "created_at" => $now,
                "updated_at" => $now,
                "name" => "SILVER PACKAGE",
                "description" => "",
                "yacht_id" => 2,
                "price" => 300000
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "name" => "GOLD PACKAGE",
                "description" => "",
                "yacht_id" => 2,
                "price" => 500000
            ]

        ]);
    }
}
