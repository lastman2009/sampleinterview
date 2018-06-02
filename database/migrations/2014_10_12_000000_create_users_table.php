<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('facebook_id')->default(0);
            $table->integer('google_id')->default(0);
            $table->integer('role_id')->default(2);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_image')->nullable();
            $table->string('email')->unique();
            $table->boolean('status')->default(1);
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