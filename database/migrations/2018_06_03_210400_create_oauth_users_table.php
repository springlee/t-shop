<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauthUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->string('oauth_name', 20)->comment('认证服务器名称');
            $table->string('uid', 50)->comment('唯一id')->unique();
            $table->string('uname', 50)->comment('昵称');
            $table->string('avatar', 200)->comment('头像url');
            $table->string('access_token', 100)->comment('Access_token');
            $table->integer('expire_time')->comment('access_token过期时间');
            $table->string('refresh_token', 100)->comment('刷新token')->nullable();
            $table->text('extends')->comment('扩展信息json化')->nullable();
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
        Schema::dropIfExists('oauth_users');
    }
}
