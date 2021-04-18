<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer("customer_profile_id")->index("customer_profile_id");
            $table->integer("restaurant_profile_id")->index("restaurant_profile_id");
            $table->integer("food_review")->default(0);
            $table->integer("price_review")->default(0);
            $table->integer("punctuality_review")->default(0);
            $table->integer("courtesy_review")->default(0);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
