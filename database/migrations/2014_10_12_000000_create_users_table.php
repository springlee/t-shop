<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username')->unique()->comment('用户名');
            $table->string('email')->nullable()->comment('邮箱');
            $table->char('tel', 15)->nullable()->comment('手机号');
            $table->string('password')->nullable()->comment('密码');
            $table->rememberToken();
            $table->time('last_login')->nullable()->comment('最后登陆时间');
            $table->ipAddress('last_ip')->nullable()->comment('最后登陆IP');
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
        Schema::dropIfExists('users');
    }
}
