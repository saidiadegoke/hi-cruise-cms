<?php

use Illuminate\Database\Seeder;
use App\Models\UploadedFile;
use Carbon\Carbon;

class UploadedFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //filename, extension,mime
        $now = Carbon::now()->toDateTimeString();
        UploadedFile::insert([
            // Homepage Sliders
            ["filename" => "banners/bn01.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/bn02.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/bn03.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],

            // Yatch Banners
            ["filename" => "banners/eugene1_bn.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/eugene_bn.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],

            // Yatch Slides
            ["filename" => "banners/b11.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/b12.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/bn01.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/bn02.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/b1.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/b2.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/b3.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
            ["filename" => "banners/bn04.jpg", "extension" => "jpg", "mime" => "home",  "created_at" => $now, "updated_at" => $now],
        ]);
    }
}
