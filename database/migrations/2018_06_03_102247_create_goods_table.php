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
            $table->increments('id');
            $table->string('spu', 100)->unique()->comment('SPU');
            $table->integer('brand_id')->default(0)->comment('品牌ID');
            $table->integer('cate_id')->default(0)->comment('主品类ID');
            $table->integer('type_id')->default(0)->comment('类型ID');
            $table->string('name')->comment('名称');
            $table->integer('stock')->default(0)->comment('库存');
            $table->integer('warn_stock')->default(0)->comment('警告库存');
            $table->string('description')->nullable()->comment('描述');

            $table->timestamps();
            $table->softDeletes();
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
