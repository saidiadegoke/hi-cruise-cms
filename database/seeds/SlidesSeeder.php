<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Slide;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // source,order,page,published;
        $now = Carbon::now()->toDateTimeString();
        Slide::insert([
            ["source" => 1, "order" => 11, "page" => "home", "published" => 1, "created_at" => $now, "updated_at" => $now],
            ["source" => 2, "order" => 12, "page" => "home", "published" => 1, "created_at" => $now, "updated_at" => $now],
            ["source" => 3, "order" => 13, "page" => "home", "published" => 1, "created_at" => $now, "updated_at" => $now]
            // ["name" => "banner", "created_at" => $now, "updated_at" => $now],
        ]);
        // assets / img / banners / bn01 . jpg
    }
}
