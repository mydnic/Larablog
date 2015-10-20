<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('gender');
            $table->date('birthday');
            $table->string('phone');
            $table->string('street_address');
            $table->string('zip');
            $table->string('city');
            $table->string('country');
            $table->string('lat');
            $table->string('lng');
            $table->boolean('superuser');
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
        Schema::drop('users');
    }
}
