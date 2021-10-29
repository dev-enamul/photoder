<?php

namespace Database\Seeders;
Use DB;
use Illuminate\Database\Seeder;

class tagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
            'name'=>'Natural',
            'slug'=>'natural'
            ],
            [
            'name'=>'Water',
            'slug'=>'water'
            ]
        ]);
    }
}
