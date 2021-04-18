<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
         $this->call(RestaurantProfileSeeder::class);
         $this->call(RestaurantServiceSeeder::class);
         $this->call(ServiceSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(UserSeeder::class);
         $this->call(SizeSeeder::class);
         $this->call(CountrySeeder::class);
         $this->call(CitySeeder::class);
    }
}
