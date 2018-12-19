<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table -> engine = 'InnoDB';
            $table -> increments ('id');
            $table -> string ('spec', '255') ->default ('') -> comment ('商品规格');
            $table -> string('color') -> comment ('颜色');
            $table -> Integer ('total') ->default (0) -> comment ('库存');
            $table -> unsignedInteger ('good_id') -> index () ->default (0) -> comment ('所属商品id');
            $table -> foreign ('good_id')
                -> references ('id') -> on ('goods')
                -> onDelete ('cascade');
            $table -> timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specifications');
    }
}
