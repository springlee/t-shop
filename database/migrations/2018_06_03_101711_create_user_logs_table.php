<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logs', function (Blueprint $table) {
            $table->engine='MyISAM';
            $table->increments('id');
            $table->integer('user_id')->comment('用户的ID');
            $table->ipAdress('ip')->nullable()->comment('登陆IP');
            $table->string('app_type')->nullable()->comment('终端类型：iOS, Andriod, Web, H5');
            $table->string('browser')->nullable()->comment('浏览器');
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
        Schema::dropIfExists('user_logs');
    }
}
