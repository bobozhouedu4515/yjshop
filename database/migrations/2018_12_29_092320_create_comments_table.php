<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->unsignedInteger ('user_id')->comment ('用户id');
            $table->unsignedInteger ('good_id')->comment ('商品id');
            $table->string ('name')->comment ('商品名称');
            $table->text('pics')->nullable ()->comment ('评论图片');
            $table->string ('spes')->comment ('商品规格');
            $table->enum('satisfaction',[1,2,3,4,5])->nullable ()->default ('5')->comment ('商品满意度');
            $table->enum('goods_satisfaction',[1,2,3,4,5])->nullable ()->default ('5')->comment ('商品符合度');
            $table->enum('shop_satisfaction',[1,2,3,4,5])->nullable ()->default ('5')->comment ('店家服务态度');
            $table->enum('shiping_satisfaction',[1,2,3,4,5])->nullable ()->default ('5')->comment ('物流满意度');
            $table->enum('server_satisfaction',[1,2,3,4,5])->nullable ()->default ('5')->comment ('快递满意度');
            $table->string('content',300)->default ('')->comment ('评论内容');
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
        Schema::dropIfExists('comments');
    }
}
