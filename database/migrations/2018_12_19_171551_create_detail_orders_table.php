<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('order_id')->index()->default(0)->comment('订单 id');
            $table->string('title')->default('')->comment('商品名称');
            $table->string('pic')->default('')->comment('商品图片');
            $table->string('spec')->default('')->comment('商品规格');
            $table->string('color')->default('')->comment('颜色');
            $table->unsignedInteger('num')->default(0)->comment('购买数量');
            $table->decimal('price')->default(0)->comment('商品单价');
            $table->unsignedInteger('good_id')->default(0)->comment('商品 id');
            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');
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
        Schema::dropIfExists('detail_orders');
    }
}
