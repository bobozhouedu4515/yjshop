<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table -> engine = 'InnoDB';
            $table->increments('id');
            $table->string ('name')->default ('')->comment ('用户姓名');
            $table->unsignedInteger ('user_id')->default (0)->comment ('用户id');
            $table->foreign ('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger ('tel_num')->default (0)->comment ('手机号');
            $table->string ('province')->comment ('用户地址');
            $table->string ('city')->comment ('用户地址');
            $table->string ('district')->comment ('用户地址');
            $table->string ('detail',500)->comment ('用户地址');
            $table->integer ('select')->default ('0')->comment ('是否默认');
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
        Schema::dropIfExists('addresses');
    }
}
