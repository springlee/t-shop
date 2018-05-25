<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('parent_id')->comment('父级id');
            $table->string('name', 20)->unique()->comment('菜单名');
            $table->string('icon', 30)->nullable()->comment('图标');
            $table->string('uri', 100)->nullable()->comment('URI, 对应route');
            $table->enum('position', ['left', 'header'])->default('left')->comment('菜单位置');
            $table->tinyInteger('is_valid')->default(1)->comment('是否有效');
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
        Schema::dropIfExists('admin_menus');
    }
}
