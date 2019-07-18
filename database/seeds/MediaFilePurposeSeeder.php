<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\MediaFilePurpose;

class MediaFilePurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        MediaFilePurpose::insert([
            ["name" => "slides", "created_at" => $now, "updated_at" => $now],
            ["name" => "banner", "created_at" => $now, "updated_at" => $now],
        ]);
        //
    }
}
