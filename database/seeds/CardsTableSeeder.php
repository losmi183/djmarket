<?php

use App\Product;
use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
                'slug' => 'native-instruments-control1',
                'name' => 'Native Instruments Control 1',
                'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
                'price' => 20000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
                'image' => 'card-1.jpg',
        ])->categories()->attach(3);
        
        Product::create([
                'slug' => 'RELOOP-PLAY',
                'name' => 'RELOOP PLAY',
                'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
                'price' => 15000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
                'image' => 'card-3.jpg',
        ])->categories()->attach(3);
        
        Product::create([
                'slug' => 'maudio-torq',
                'name' => 'M-AUDIO Torq Conectiv with Vinyl',
                'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
                'price' => 10000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
                'image' => 'card-4.jpg',
        ])->categories()->attach(3);
        
        
        Product::create([
                'slug' => 'RELOOP-iPhono-2',
                'name' => 'RELOOP iPhono 2',
                'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
                'price' => 20000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
                'image' => 'card-6.jpg',
        ])->categories()->attach(3);
        
        Product::create([
                'slug' => 'RELOOP-PLAY-MK2',
                'name' => 'RELOOP PLAY MK2',
                'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
                'price' => 20000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
                'image' => 'card-7.jpg',
        ])->categories()->attach(3);
        
        Product::create([
                'slug' => 'Vestax-Tube-1',
                'name' => 'Vestax Tube 1',
                'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
                'price' => 10000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
                'image' => 'card-8.jpg',
        ])->categories()->attach(3);
        
        Product::create([
                'slug' => 'Vestax-Via-40',
                'name' => 'Vestax Via 40',
                'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
                'price' => 25000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
                'image' => 'card-9.jpg',
        ])->categories()->attach(3);




    }
}
