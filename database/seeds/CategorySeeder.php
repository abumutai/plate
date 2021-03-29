<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = array(
            array('title' => 'Starter', 'description' => '','image'=>''),
            array('title' => 'Main Courses', 'description' => '','image'=>''),
            array('title' => 'Beef', 'description' => '','image'=>''),
            array('title' => 'Desserts', 'description' => '','image'=>''),
            array('title' => 'Drinks', 'description' => '','image'=>''),
        );
        DB::table('categories')->delete();
        DB::table('categories')->insert($cat);
    }
}
