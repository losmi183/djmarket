<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // |Random Prices for products
        $price_players = [99900, 119900, 149900, 199900, 219900];
        $price_mixers = [29900, 39900, 49900, 89900, 99900, 119900, 169900];
        $price_controllers = [19900, 29900, 39900, 69900, 79900, 89900, 109900];
        $price_headphones = [4900, 5900, 8900, 11900, 18900, 29900];
        $price_cards = [8900, 11900, 18900, 29900, 25900, 39900];

        $images = '["mixer1.png", "mixer2.png", "mixer3.png", "mixer4.png", "mixer5.png", "mixer6.png", "mixer7.png", "mixer8.png", "mixer9.png"]';

        // Players SEED
        // for($i=1; $i<=10; $i++) {
        //     Product::create([
        //         'slug' => 'player-' . $i,
        //         'name' => 'Player ' . $i,
        //         'details' => 'DVD, CD, USB / WAV FLAC MP3',
        //         'price' => $price_players[array_rand($price_players)],
        //         'description' => 'Lorem ' .$i. ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
        //         'image' => 'player-' . $i . '.jpg',
        //         'images' => $images
        //         ])->categories()->attach(1);
        //         // For every created product, add row in pivot (category_product) table, with category_id = 1
        //     }

        // // Mixer Seed
        // for($i=1; $i<=9; $i++) {
        //     Product::create([
        //         'slug' => 'mixer-' . $i,
        //         'name' => 'Mixer ' . $i,
        //         'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
        //         'price' => $price_mixers[array_rand($price_mixers)],
        //         'description' => 'Lorem ' .$i. ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
        //         'image' => 'mixer-' . $i . '.jpg',
        //         'images' => $images
        //         ])->categories()->attach(2);
        //     }

        //     //  products that have 2 categories for example
        //     $product = Product::find(1);
        //     $product->categories()->attach(4);
        //     $product = Product::where('slug', 'player-4')->first();
        //     $product->categories()->attach(4);

            
        //     // Controller Seed
        //     for($i=1; $i<=9; $i++) {
        //         Product::create([
        //             'slug' => 'controller-' . $i,
        //             'name' => 'Controller ' . $i,
        //         'details' => 'Digital Dj Controll, Hi Performance Dj-ing',
        //         'price' => $price_controllers[array_rand($price_controllers)],
        //         'description' => 'Lorem ' .$i. ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
        //         'image' => 'controller-' . $i . '.jpg',
        //         'images' => $images
        //     ])->categories()->attach(4);
        // }



        // // headphones Seed
        // for($i=1; $i<=9; $i++) {
        //     Product::create([
        //         'slug' => 'headphones-' . $i,
        //         'name' => 'Headphones ' . $i,
        //         'details' => 'Cloased type, High output dj headphones',
        //         'price' => $price_headphones[array_rand($price_headphones)],
        //         'description' => 'Lorem ' .$i. ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
        //         'image' => 'headphones-' . $i . '.jpg',
        //         'images' => $images
        //     ])->categories()->attach(5);
        // }


        // // Card Seed
        // for($i=1; $i<=9; $i++) {
        //     Product::create([
        //         'slug' => 'card-' . $i,
        //         'name' => 'Card ' . $i,
        //         'details' => '24bit 192Khz USB audio interface',
        //         'price' => $price_cards[array_rand($price_cards)],
        //         'description' => 'Lorem ' .$i. ' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
        //         'image' => 'card-' . $i . '.jpg',
        //         'images' => $images
        //     ])->categories()->attach(3);
        // }


    }
}
