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
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(MixersTableSeeder::class);
        $this->call(CardsTableSeeder::class);
        $this->call(HeadphonesTableSeeder::class);
        $this->call(ControllersTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
