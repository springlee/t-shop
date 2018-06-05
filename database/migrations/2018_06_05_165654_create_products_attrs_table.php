<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAttrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('products_attrs', function (Blueprint $table) {
        Schema::create('products_attrs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('goods_id')->index()->comment('goods ID');
            $table->integer('product_id')->index()->default(0)->comment('product ID');
            $table->integer('attr_id')->index()->comment('属性ID');
            $table->integer('attr_val_id')->index()->comment('属性值ID');
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
        Schema::dropIfExists('products_attrs');
    }
}
