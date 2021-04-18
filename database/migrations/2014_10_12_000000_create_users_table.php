<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();

            $table->integer('role_id')->index('role_id')->default(3)->comment('1=admin, 2=restaurant, 3=customer');
            $table->integer('restaurant_profile_id')->index('restaurant_profile_id')->nullable();

            $table->string('avatar')->nullable();
            $table->string('job_role')->nullable();
            $table->string('phone')->nullable();

            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
