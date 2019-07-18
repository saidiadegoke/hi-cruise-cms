<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //DaysSeeder::class, 
            
            //MediaFilePurposeSeeder::class, 
            //UploadedFileSeeder::class, 
            //SlidesSeeder::class, 
            //YachtSeeder::class, 
            //PackageSeeder::class, 
            //MediaFileSeeder::class,
            PageCategoriesTableSeeder::class
        ]);
    }
}
