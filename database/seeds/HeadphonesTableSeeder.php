<?php

use App\Product;
use Illuminate\Database\Seeder;

class HeadphonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'slug' => 'sennheiser-hd-25',
            'name' => 'sennheiser hd 25',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 20000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-1.jpg',
        ])->categories()->attach(5);
        
        Product::create([
            'slug' => 'JBSYSTEMS-HP-2000-Pro',
            'name' => 'JBSYSTEMS HP 2000 Pro',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 6000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-2.jpg',
        ])->categories()->attach(5);
        
        Product::create([
            'slug' => 'GEMINI-DJX-03',
            'name' => 'GEMINI DJX 03',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 7000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-3.jpg',
        ])->categories()->attach(5);
        
        Product::create([
            'slug' => 'RELOOP-RHP-20',
            'name' => 'RELOOP RHP-20',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 5000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-4.jpg',
        ])->categories()->attach(5);
        
        Product::create([
            'slug' => 'FOSTEX TR-70',
            'name' => 'FOSTEX TR-70',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 4000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-5.jpg',
        ])->categories()->attach(5);
        
        Product::create([
            'slug' => 'FOSTEX-TH-7',
            'name' => 'FOSTEX TH-7',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 8000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-6.jpg',
        ])->categories()->attach(5);
        
        Product::create([
            'slug' => 'RELOOP-SHP-8',
            'name' => 'RELOOP SHP-8',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 9000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-7.jpg',
        ])->categories()->attach(5);
        
        
        Product::create([
            'slug' => 'TASCAM-TH-02',
            'name' => 'TASCAM TH 02',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 6000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-8.jpg',
        ])->categories()->attach(5);
        
        
        Product::create([
            'slug' => 'TASCAM-TH-03',
            'name' => 'TASCAM TH 03',
            'details' => 'Cloased type, High output dj headphones',
            'price' => 10000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'headphones-9.jpg',
        ])->categories()->attach(5);
    }
}
