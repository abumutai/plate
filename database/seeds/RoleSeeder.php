<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array('title' => 'Admin', 'description' => 'Admin of the System'),
            array('title' => 'Restaurant', 'description' => 'Restaurant hosting the services'),
            array('title' => 'Customer', 'description' => 'Customer looking to buy or order food'),
        );
        DB::table('roles')->delete();
        DB::table('roles')->insert($roles);
    }
}
