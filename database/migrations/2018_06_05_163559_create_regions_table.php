<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->integer('p_id')->default(0)->index()->comment('父级id');
            $table->string('name', 50)->comment('名称');
            $table->string('short', 20)->default('')->comment('简称');
            $table->char('x', 20)->nullable()->commnet('横坐标');
            $table->char('y', 20)->nullable()->comment('纵坐标');
            $table->tinyInteger('depth')->default(0)->comment('层级深度');
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
        Schema::dropIfExists('regions');
    }
}
