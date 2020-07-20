<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Players',
            'slug' => 'players'
        ]);
        
        Category::create([
            'name' => 'Mixers',
            'slug' => 'mixers'
        ]);
        
        Category::create([
            'name' => 'Audio Cards',
            'slug' => 'audio-cards'
        ]);
        
        Category::create([
            'name' => 'Controllers',
            'slug' => 'controllers'
        ]);

        
        Category::create([
            'name' => 'Headphones',
            'slug' => 'headphones'
        ]);
        
        Category::create([
            'name' => 'Software',
            'slug' => 'software'
        ]);
        
        Category::create([
            'name' => 'Effects',
            'slug' => 'effects'
        ]);        

        Category::create([
            'name' => 'Bags',
            'slug' => 'bags'
        ]);
    }
}
