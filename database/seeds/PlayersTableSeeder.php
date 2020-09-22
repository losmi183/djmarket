<?php

use App\Product;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Product::create([
            'slug' => 'pioneer-2000',
            'name' => 'Pioneer Cdj 2000 Nexus',
            'details' => 'The CDJ-2000NXS2 inherits all the best features from its predecessor – the CDJ-2000NXS – and takes a giant leap forward. We’ve added a larger, multicolour touch screen with a Qwerty keyboard and search filters to help you select tracks faster. 2 banks of 4 Hot Cues give you more creative freedom, while a 96 kHz/24-bit sound card and support for FLAC/Apple Lossless Audio (ALAC) means you can play with higher resolution formats.',
            'price' => 220000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-8.jpg',
            ])->categories()->attach(1);            
        Product::create([
            'slug' => 'pioneer-200',
            'name' => 'Pioneer Cdj 200',
            'details' => 'The CDJ-200 inherits all the best features from its predecessor – the CDJ-100 – and takes a giant leap forward. We’ve added a larger, multicolour touch screen with a Qwerty keyboard and search filters to help you select tracks faster. 2 banks of 4 Hot Cues give you more creative freedom, while a 96 kHz/24-bit sound card and support for FLAC/Apple Lossless Audio (ALAC) means you can play with higher resolution formats.',
            'price' => 25000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-3.jpg',
            ])->categories()->attach(1);             
        Product::create([
            'slug' => 'pioneer-350',
            'name' => 'Pioneer Cdj 350',
            'details' => 'The CDJ-350 inherits all the best features from its predecessor – the CDJ-400 – and takes a giant leap forward. We’ve added a larger, multicolour touch screen with a Qwerty keyboard and search filters to help you select tracks faster. 2 banks of 4 Hot Cues give you more creative freedom, while a 96 kHz/24-bit sound card and support for FLAC/Apple Lossless Audio (ALAC) means you can play with higher resolution formats.',
            'price' => 40000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-4.jpg',
            ])->categories()->attach(1);            
        Product::create([
            'slug' => 'pioneer-400',
            'name' => 'Pioneer Cdj 400',
            'details' => 'The CDJ-400 inherits all the best features from its predecessor – the CDJ-200 – and takes a giant leap forward. We’ve added a larger, multicolour touch screen with a Qwerty keyboard and search filters to help you select tracks faster. 2 banks of 4 Hot Cues give you more creative freedom, while a 96 kHz/24-bit sound card and support for FLAC/Apple Lossless Audio (ALAC) means you can play with higher resolution formats.',
            'price' => 30000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-5.jpg',
            ])->categories()->attach(1);              
        Product::create([
            'slug' => 'pioneer-800',
            'name' => 'Pioneer Cdj 800',
            'details' => 'The CDJ-800 inherits all the best features from its predecessor – the CDJ-100 – and takes a giant leap forward. We’ve added a larger, multicolour touch screen with a Qwerty keyboard and search filters to help you select tracks faster. 2 banks of 4 Hot Cues give you more creative freedom, while a 96 kHz/24-bit sound card and support for FLAC/Apple Lossless Audio (ALAC) means you can play with higher resolution formats.',
            'price' => 60000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-6.jpg',
            ])->categories()->attach(1);             
        Product::create([
            'slug' => 'pioneer-1000',
            'name' => 'Pioneer Cdj 1000',
            'details' => 'The CDJ-1000 top Pionner Player device for 2002, and mk3 for 2006. as a last edition',
            'price' => 220000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-7.jpg',
            ])->categories()->attach(1);             
        Product::create([
            'slug' => 'vestax-cdx05',
            'name' => 'Vestax cdx-05',
            'details' => 'Vestax response at Pioneer cdj 350. Their mid range model.',
            'price' => 30000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-9.jpg',
            ])->categories()->attach(1);               
        Product::create([
            'slug' => 'vestax-cdx05-mk2',
            'name' => 'Vestax cdx-05 MK2',
            'details' => 'Vestax response at Pioneer cdj 350. Their mid range model.',
            'price' => 40000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'player-10.jpg',
            ])->categories()->attach(1);   
    }
}
