<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_cats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('p_id')->default(0)->comment('父id');
            $table->string('name', 20)->comment('品名');
            $table->integer('goods_num')->default(0)->comment('商品数量');
            $table->integer('child_num')->default(0)->commnet('子分类数量');
            $table->tinyInteger('depth')->default(0)->commnet('层级深度');
            $table->string('cate_path')->default('')->comment('品类关系路(以,隔开)');
            $table->tinyInteger('is_show')->default(1)->comment('是否展示');
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
        Schema::dropIfExists('goods_cats');
    }
}
