<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users') -> insert([

        //Admin
        [
            'name' => 'Admin',
            'email' => 'g.debouard@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'admin',
            'status' => 'active',
        ],

         //User
         [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'status' => 'active',
        ],

    ]);
    }
}
