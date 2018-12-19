<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table -> engine = 'InnoDB';
            $table->increments('id');
            $table -> unsignedInteger ('good_id') ->default (0) -> comment ('商品的id');
            $table->foreign ('good_id')
                ->references('id')->on('goods')
                ->onDelete('cascade');
            $table->unsignedInteger ('user_id')->default (0)->comment ('用户id');
            $table->foreign ('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string ('picture')->default ('')->comment ('商品图片');
            $table->string ('spec')->default ('')->comment ('商品规格');
            $table->string ('color')->default ('')->comment ('商品颜色');
            $table->unsignedInteger ('num')->default (1)->comment ('商品数量');
            $table->decimal ('price',8,2) ->default (0)->comment ('商品单价');
            $table ->text ('description') -> comment ('商品的描述');
            $table->decimal ('total',8,2)->default ('0')->comment ('小计');
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
        Schema::dropIfExists('carts');
    }
}
