<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string ('name')->default ('')->comment ('商品名称');
            $table->decimal('price',8,2)->default (0)->comment ('商品价格');
            $table->unsignedInteger ('product_id')->index ()->default (0)->comment ('所属类目');
            $table->foreign ('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
            $table->string ('picture')->default ('')->comment ('商品图片');
            $table->text('pictures')->comment ('商品图册');
            $table-> string('description')->default ('')->comment ('商品描述');
            $table->text('content')->comment ('商品详情');
            $table->unsignedInteger ('admin_id')->index ()->default (0)->comment ('操作的管理员');
            $table->foreign ('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
            $table->integer ('total')->default (0)->comment ('商品总数');
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
        Schema::dropIfExists('goods');
    }
}
