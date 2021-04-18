<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            array('name'=>'Kenya'),
            array('name'=>'Uganda'),
            array('name'=>'Tanzania'),
        );

        DB::table('countries')->delete();
        DB::table('countries')->insert($countries);
    }
}
