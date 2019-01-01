<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table -> engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger ('user_id')->index ()->default (0)->comment ('用户id');
            $table->unsignedInteger ('order_id')->index ()->default (0)->comment ('订单id');
            $table->foreign ('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string ('number')->default ('')->comment ('定单号');
            $table->unsignedInteger ('address_id')->index ()->default (0)->comment ('地址id');
            $table->integer ('total_num')->default (0)->comment ('商品数量');
            $table->decimal('total_price',8,2)->default (0)->comment ('商品单价');

            $table->enum ('status',[1,2,3,4,5,6])->default (1)->comment ('1未支付,2已支付,3,待发货,4已发货,5收货,6已评价');
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
        Schema::dropIfExists('orders');
    }
}
