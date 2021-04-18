<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes= array(
            array('title' => 'Medium'),
            array('title' => 'Large'),
            array('title' => 'Extra Large')
        );
        DB::table('sizes')->delete();
        DB::table('sizes')->insert($sizes);
    }
}
