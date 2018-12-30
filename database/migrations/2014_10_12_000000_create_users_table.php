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
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string ('mobile')->unique()->nullable()->comment ('手机号注册');
            $table->string('email')->unique()->nullable ();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string ('username')->nullable()->default ('')->comment ('用户姓名');
            $table->enum('sex',['男','女','保密'])->nullable()->default ('男')->comment ('用户性别');
            $table->string ('icon')->nullable()->default ('')->comment ('用户头像');
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
