<?php

use Illuminate\Database\Seeder;
use App\Models\MediaFile;
use Carbon\Carbon;

class MediaFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //type,purpose,yacht_id,published;
        $now = Carbon::now()->toDateTimeString();
        $slides_purpose_id = 1;
        $banner_purpose_id = 2;
        MediaFile::insert([
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $banner_purpose_id,
                "yacht_id" => 1,
                "source" => 4,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $banner_purpose_id,
                "yacht_id" => 2,
                "source" => 5,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 1,
                "source" => 6,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 1,
                "source" => 7,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 1,
                "source" => 8,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 1,
                "source" => 9,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 2,
                "source" => 10,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 2,
                "source" => 11,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 2,
                "source" => 12,
                "published" => true
            ],
            [
                "created_at" => $now,
                "updated_at" => $now,
                "purpose" => $slides_purpose_id,
                "yacht_id" => 2,
                "source" => 13,
                "published" => true
            ]
        ]);
    }
}
