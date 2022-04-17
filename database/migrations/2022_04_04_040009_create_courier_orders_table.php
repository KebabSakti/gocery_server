<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_orders', function (Blueprint $table) {
            $table->id();
            $table->text('order_uid');
            $table->text('courier_account_uid');
            $table->enum('status', ['PROGRESS', 'CANCEL', 'REJECT', 'COMPLETE']);
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
        Schema::dropIfExists('courier_orders');
    }
}
