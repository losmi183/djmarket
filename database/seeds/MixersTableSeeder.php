<?php

use App\Product;
use Illuminate\Database\Seeder;

class MixersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Product::create([
            'slug' => 'pioneer-djm900-mk2',
            'name' => 'Pioneer DJM 900 mk2 Nexus ',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 180000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-1.jpg',
        ])->categories()->attach(2);
        
        Product::create([
            'slug' => 'pioneer-djm700-mk2',
            'name' => 'Pioneer DJM 700 mk2 Nexus ',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 80000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-2.jpg',
        ])->categories()->attach(2);

        Product::create([
            'slug' => 'alen-heath-xone23c',
            'name' => 'Alen&Heath Xone 23c',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 35000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-4.jpg',
        ])->categories()->attach(2);

        Product::create([
            'slug' => 'numark-vision',
            'name' => 'Numark Vision series',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 25000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-5.jpg',
        ])->categories()->attach(2);

        Product::create([
            'slug' => 'alen-heath-xone23-mk3',
            'name' => 'Alen&Heath Xone 23c MK3',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 40000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-6.jpg',
        ])->categories()->attach(2);

        Product::create([
            'slug' => 'alen-heath-xone43',
            'name' => 'Alen&Heath Xone 43',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 80000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-7.jpg',
        ])->categories()->attach(2);

        Product::create([
            'slug' => 'pioneer-djm250',
            'name' => 'Pioneer Djm 250',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 40000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-8.jpg',
        ])->categories()->attach(2);

        Product::create([
            'slug' => 'jbsystem-mx2',
            'name' => 'JbSystem MX2',
            'details' => '24 bit, 192KHz, Stereo Hi Quality sound',
            'price' => 20000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum.',
            'image' => 'mixer-9.jpg',
        ])->categories()->attach(2);





        
    }
}
