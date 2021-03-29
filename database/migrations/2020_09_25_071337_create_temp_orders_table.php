<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_orders', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->index('user_id');
            $table->integer('menu_id')->index('menu_id');
            $table->integer('menu_size_id')->index('menu_size_id')->nullable();
            $table->integer('restaurant_profile_id')->index('restaurant_profile_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_orders');
    }
}
