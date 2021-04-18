<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = array(
            array('title' => '','restaurant_profile_id'=>"","category_id"=>'',"currency"=>"","pricing"=>"","status"=>"", 'description' => '','image'=>''),
        );
        DB::table('menus')->delete();
        DB::table('menus')->insert($menu);
    }
}
