<?php

use App\Product;
use Illuminate\Database\Seeder;

class ControllersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'slug' => 'native-instruments-s4-mk2',
            'name' => 'Native instruments s4 mk2',
            'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
            'price' => 60000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'controller-1.jpg',
        ])->categories()->attach(4);
        
        Product::create([
            'slug' => 'HERCULES-DJCONTROL',
            'name' => 'HERCULES DJCONTROL',
            'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
            'price' => 20000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'controller-3.jpg',
        ])->categories()->attach(4);
        
        Product::create([
            'slug' => 'HERCULES-P32-DJ',
            'name' => 'HERCULES P32-DJ',
            'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
            'price' => 25000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'controller-4.jpg',
        ])->categories()->attach(4);
        
        Product::create([
            'slug' => 'AKAI-XR20',
            'name' => 'AKAI XR20',
            'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
            'price' => 20000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'controller-5.jpg',
        ])->categories()->attach(4);
        
        Product::create([
            'slug' => 'AKAI-MPC-ELEMENT',
            'name' => 'AKAI MPC ELEMENT',
            'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
            'price' => 25000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'controller-6.jpg',
        ])->categories()->attach(4);
        
        Product::create([
            'slug' => 'NOVATION-Dicer',
            'name' => 'NOVATION Dicer',
            'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
            'price' => 8000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'controller-7.jpg',
        ])->categories()->attach(4);
        
        
        Product::create([
            'slug' => 'NOVATION-Dicer-2',
            'name' => 'NOVATION Dicer 2',
            'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
            'price' => 10000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'controller-8.jpg',
        ])->categories()->attach(4);
        





    }
}
