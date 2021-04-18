<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestroyedStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destroyed_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_profile_id');
            $table->string('username');
            $table->string('category');
            $table->string('item');
            $table->string('subcategory');
            $table->integer('quantity');
            $table->string('metric');
            $table->string('purpose');
            $table->string('status')->default('pending');
            $table->integer('price');
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
        Schema::dropIfExists('destroyed_stocks');
    }
}
