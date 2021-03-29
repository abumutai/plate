<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_profile_id');
            $table->string('username');
            $table->string('item');
            $table->integer('quantity');
            $table->string('metric');
            $table->string('price');
            $table->string('category');
            $table->string('subcategory');
            $table->string('supplier');
            $table->string('status')->default('pending');
            $table->date('expiry')->nullable();
            $table->boolean('moved')->default(False);
            $table->timestamps();

            //$table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
