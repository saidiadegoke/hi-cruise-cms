<?php

use Illuminate\Database\Seeder;

class PageCategoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('page_categories')->truncate();
    	$pages = [
    		array('slug' => 'home', 'label' => 'Homepage', 'description' => 'Homepage content'),
    		array('slug' => 'about', 'label' => 'About page', 'description' => 'Aboutus content'),
    		array('slug' => 'contact', 'label' => 'Contact Information', 'description' => 'Site contact information'),
    		array('slug' => 'package', 'label' => 'Package Information', 'description' => 'Site package information'),
    	];

        foreach($pages as $page) { 
            DB::table('page_categories')->insert([
                'slug' => $page['slug'], 
                'label' => $page['label'],
                'description' => $page['description'],
            ]);
        }
    }
}
