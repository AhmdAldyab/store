<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email'=> 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
                'address' => 'in damascus',
                'number_phone' => '0928546333',
                'last_name' => 'aldayb'

            ],[
                'name' => 'customer',
                'email'=> 'customer@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'customer',
                'address' => 'in damascus',
                'number_phone' => '0928546333',
                'last_name' => 'aldayb'

            ],[
                'name' => 'accountant',
                'email'=> 'accountant@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'accountant',
                'address' => 'in damascus',
                'number_phone' => '0928546333',
                'last_name' => 'aldayb'

            ],[
                'name' => 'watcher',
                'email'=> 'watcher@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'watcher',
                'address' => 'in damascus',
                'number_phone' => '0928546333',
                'last_name' => 'aldayb'
            ]
        ]);
    }
}

