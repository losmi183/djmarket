<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin 
        User::create([
            'name' => 'admin',
            'email' => 'admin@djmarket.co',
            'password' => bcrypt('password'),
            'remember_token' => str_random(60),
            'role'        => 'admin',

        ]);

        // Publisher User
        User::create([
            'name' => 'publisher',
            'email' => 'publisher@djmarket.co',
            'password' => bcrypt('password'),
            'remember_token' => str_random(60),
            'role'        => 'publisher',
        ]);


        User::create([
            'name' => 'milos',
            'email' => 'milos.glogovac@gmail.com',
            'password' => bcrypt('losmi183'),
            'remember_token' => str_random(60),
            'role'        => 'admin',
        ]);

        User::create([
            'name' => 'nikola',
            'email' => 'nikola@djmarket.co',
            'password' => bcrypt('nikola'),
            'remember_token' => str_random(60),
            'role'        => 'admin',
        ]);

        // Random Users
        for ($i=1; $i < 11; $i++) { 
            User::create([
                'name' => 'random'.$i,
                'email' => 'random'.$i.'@mail.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(60),
                'role'        => 'customer',
            ]);
        }
        
    }
}
