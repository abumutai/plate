<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //       'user_id', 'rest_id', 'name', 'table_no', 'number_of_people', 'phone', 'email', 
             //'order_list', 'address', 'status', 'comment',

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('table_no')->unique();
            $table->timestamp('number_of_people')->nullable();
            $table->integer('user_id')->index('user_id');
            $table->integer('restaurant_id')->index('restaurant_profile_id');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('order_list')->nullable();
            $table->string('paybill')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->nullable();


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
        Schema::dropIfExists('reservations');
    }
}
