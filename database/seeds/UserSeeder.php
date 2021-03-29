<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('name' => "Frankline Sable", "email" => "test@gmail.com", 'restaurant_profile_id' => 1, "password" => bcrypt("test1234"), "role_id" => 2, 'email_verified_at' => "2020-02-20 16:22:09", "created_at" => "2020-02-20 16:22:09"),
        );

        DB::table('users')->delete();
        DB::table('users')->insert($users);

    }
}
