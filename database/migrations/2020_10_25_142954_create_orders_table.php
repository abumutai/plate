<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id');
            $table->integer('menu_id')->index('menu_id');
            $table->integer('table_id')->index('table_id')->nullable();
            $table->integer('quantity')->default(1);
            // $table->double("amount")->default(0);
            $table->integer('restaurant_service_id')->index('restaurant_service_id')->comment('order type');
            $table->integer('restaurant_profile_id')->index('restaurant_profile_id');
            $table->integer('status')->default(0);

            $table->text('notes')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
