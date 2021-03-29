<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes= array(
            array('title' => 'table A',"restaurant_profile_id"=>1),
            array('title' => 'table B',"restaurant_profile_id"=>1),
            array('title' => 'table C',"restaurant_profile_id"=>1),
            array('title' => 'table D',"restaurant_profile_id"=>1),
            array('title' => 'table E',"restaurant_profile_id"=>1),
        );
        DB::table('tables')->delete();
        DB::table('tables')->insert($sizes);
    }
}
