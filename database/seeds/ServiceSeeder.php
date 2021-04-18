<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = array(
            array('title' => 'Takeaway'),
            array('title' => 'Delivery'),
            array('title' => 'Dine-in'));
        DB::table('services')->delete();
        DB::table('services')->insert($services);
    }
}
