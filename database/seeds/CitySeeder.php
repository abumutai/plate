<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array('name'=>'Nairobi','country_id'=>1),
            array('name'=>'Mombasa','country_id'=>1),
            array('name'=>'Garissa','country_id'=>1),
            array('name'=>'Eldoret','country_id'=>1),
            array('name'=>'Kisumu','country_id'=>1),

            array('name'=>'Kampala','country_id'=>2),
            array('name'=>'Gulu','country_id'=>2),
            array('name'=>'Lira','country_id'=>2),
            array('name'=>'Mbarara','country_id'=>2),
            array('name'=>'Jinja','country_id'=>2),

            array('name'=>'Dar es Salaam','country_id'=>3),
            array('name'=>'Mwanza','country_id'=>3),
            array('name'=>'Zanzibar','country_id'=>3),
            array('name'=>'Arusha','country_id'=>3),
            array('name'=>'Morogoro','country_id'=>3),
        );

        DB::table('cities')->delete();
        DB::table('cities')->insert($cities);
    }
}
