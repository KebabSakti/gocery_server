<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->text('customer_account_uid');
            $table->text('uid');
            $table->text('invoice');
            $table->integer('qty_total');
            $table->decimal('price_total', 12, 2);
            $table->decimal('shipping_fee', 12, 2);
            $table->decimal('app_fee', 12, 2)->default(0.00);
            $table->decimal('voucher_deduction', 12, 2)->default(0.00);
            $table->decimal('point_deduction', 12, 2)->default(0.00);
            $table->decimal('pay_total', 12, 2);
            $table->text('payment');
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
        Schema::dropIfExists('orders');
    }
}
