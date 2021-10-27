<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make(123456),
                'slug'=>Str::slug('Admin'),
            ],
            [
                'name'=>'Author',
                'email'=>'author@gmail.com',
                'password'=> Hash::make(123456),
                'slug'=>Str::slug('Author'),
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=> Hash::make(123456),
                'slug'=>Str::slug('User'),
            ]
        ]);
    }
}
