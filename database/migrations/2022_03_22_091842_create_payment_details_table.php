<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->text('order_id');
            $table->text('channel_code');
            $table->text('reference_id')->nullable();
            $table->text('external_id')->nullable();
            $table->text('extra')->nullable();
            $table->enum('status', ['PENDING', 'COMPLETED', 'CANCELED', 'FAILED']);
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
        Schema::dropIfExists('payment_details');
    }
}
