<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreusersToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string ('username')->default ('')->comment ('用户姓名');
            $table->enum('sex',['男','女','保密'])->default ('男')->comment ('用户性别');
            $table->string ('icon')->default ('')->comment ('用户头像');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string ('username')->default ('')->comment ('用户姓名');
            $table->enum('sex',['男','女','保密'])->default ('男')->comment ('用户性别');
            $table->string ('icon')->default ('')->comment ('用户头像');
        });
    }
}
