<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('username', 50)->unique()->comment('用户名');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('truename', 20)->nullable()->comment('姓名');
            $table->string('password')->comment('密码');
            $table->rememberToken();
            $table->char('tel', 15)->nullable()->comment('手机');
            $table->string('email', 50)->nullable()->comment('邮箱');
            $table->string('role_ids')->comment('角色id');
            $table->tinyInteger('is_valid')->default(1)->comment('是否有效');
            $table->tinyInteger('is_super')->default(0)->comment('超级管理员');
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
        Schema::dropIfExists('admin_users');
    }
}
