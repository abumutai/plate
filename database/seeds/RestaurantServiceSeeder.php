<?php

use App\RestaurantService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rs = array(
            array('restaurant_profile_id'=>1,'service_id'=>3),

            array('restaurant_profile_id'=>2,'service_id'=>1),
            array('restaurant_profile_id'=>2,'service_id'=>2),
            array('restaurant_profile_id'=>2,'service_id'=>3),

            array('restaurant_profile_id'=>3,'service_id'=>1),
            array('restaurant_profile_id'=>3,'service_id'=>2),
            array('restaurant_profile_id'=>3,'service_id'=>3),

            array('restaurant_profile_id'=>4,'service_id'=>1),
            array('restaurant_profile_id'=>4,'service_id'=>2),
            array('restaurant_profile_id'=>4,'service_id'=>3),

            array('restaurant_profile_id'=>5,'service_id'=>1),
            array('restaurant_profile_id'=>5,'service_id'=>3),

            array('restaurant_profile_id'=>6,'service_id'=>1),
            array('restaurant_profile_id'=>6,'service_id'=>2),
            array('restaurant_profile_id'=>6,'service_id'=>3)
        );
        DB::table('restaurant_services')->delete();
        DB::table('restaurant_services')->insert($rs);
    }
}
