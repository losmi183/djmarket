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
            'password' => 'password'
        ]);

        // Publisher User
        User::create([
            'name' => 'publisher',
            'email' => 'publisher@djmarket.co',
            'password' => 'password'
        ]);


        User::create([
            'name' => 'milos',
            'email' => 'milos.glogovac@gmail.com',
            'password' => 'losmi183'
        ]);

        // Random Users
        for ($i=1; $i < 11; $i++) { 
            User::create([
                'name' => 'random'.$i,
                'email' => 'random'.$i.'@mail.com',
                'password' => 'password'
            ]);
        }
        
    }
}
