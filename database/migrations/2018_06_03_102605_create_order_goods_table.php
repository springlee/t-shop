<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->comment('订单id');
            $table->integer('product_id')->comment('货品id');
            $table->string('sku', 30)->comment('SKU');
            $table->decimal('price', 10, 2)->comment('单价');
            $table->smallInteger('num')->default(0)->comment('数量');
            $table->smallInteger('send_num')->default(0)->comment('已发货数量');
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
        Schema::dropIfExists('order_goods');
    }
}
