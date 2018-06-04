<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('order_sn')->unique()->comment('订单编号');
            $table->integer('p_id')->default(0)->comment('父订单id');
            $table->integer('user_id')->comment('用户ID');
            $table->tinyInteger('pay_status')->default(0)->comment('支付状态');
            $table->tinyInteger('order_status')->default(0)->comment('订单状态');
            $table->tintInteger('ship_status')->default(0)->comment('发货状态');

            $table->tinyInteger('pay_id')->default(0)->comment('支付方式');
            $table->string('pay_no')->nullable()->commnet('支付流水号');

            $table->string('consignee', 50)->comment('收件人');
            $table->char('telephone', 15)->comment('手机号');
            $table->string('country', 20)->comment('国家');
            $table->integer('country_id')->comment('国家id');
            $table->string('province', 20)->comment('省份');
            $table->integer('province_id')->comment('省份id');
            $table->string('city', 20)->comment('城市');
            $table->integer('city_id')->comment('城市id');
            $table->string('district', 20)->comment('县/区');
            $table->integer('district_id')->comment('县/区id');
            $table->string('street', 20)->comment('乡镇/街道');
            $table->integer('street_id')->comment('乡镇/街道id');
            $table->string('address')->comment('详细地址');
            $table->char('zipcode', 8)->nullable()->comment('邮政编码');
            $table->string('user_note')->default('')->comment('用户留言');
            $table->string('admin_note')->default('')->commnet('管理员留言');

            $table->decimal('total_amount', 10, 2)->comment('订单总金额');
            $table->decimal('goods_amount', 10, 2)->comment('物品总金额');
            $table->decimal('ship_amount', 10, 2)->default(0)->comment('运费');
            $table->tinyInteger('used_point')->default(0)->comment('是否使用积分');
            $table->decimal('point_amount', 10, 2)->default(0)->comment('积分抵扣金额');
            $table->tinyInteger('used_balance')->default(0)->comment('是否使用余额');
            $table->decimal('balance_amount', 10, 2)->default(0)->comment('余额抵扣');

            $table->timestamps();
			$table->timestamp('paid_at')->nullable()->comment('支付时间');
			$table->timestamp('checked_at')->nullable()->comment('审核时间');
            $table->timestamp('sent_at')->nullable()->comment('发货时间');
            $table->timestamp('received_at')->nullable()->comment('收货时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
