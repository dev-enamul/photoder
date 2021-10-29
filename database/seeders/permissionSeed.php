<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class permissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name'=>'All',
                'display_name'=>'all'
            ],
        ]);
    }
}
