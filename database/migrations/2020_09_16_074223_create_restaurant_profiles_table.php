<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_profiles', function (Blueprint $table) {
            $table->id();


            $table->string('title')->nullable();
            $table->string('headline')->nullable();

            $table->integer('category_id')->index(('category_id'));
            $table->string('location')->nullable();
            $table->integer('city_id')->index('city_id')->nullable();
            $table->integer('country_id')->index('country_id')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('postal_address')->nullable();

            $table->string('opening_hours')->nullable();

            $table->string('banner')->nullable();
            $table->string('logo')->nullable();

            $table->text('about')->nullable();
            $table->string('website')->nullable();
            $table->double('kula_points_ratio')->nullable();;

            $table->string('coordinates')->nullable();
            $table->string('status')->nullable();;

            $table->timestamps();
        });
    }

    /**
     *     * Reverse the migrations.

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_profiles');
    }
}
