<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('va_payment_details', function (Blueprint $table) {
            $table->text('id');
            $table->text('payment_id');
            $table->text('owner_id');
            $table->text('callback_virtual_account_id');
            $table->text('external_id');
            $table->text('bank_code');
            $table->text('merchant_code');
            $table->text('account_number');
            $table->decimal('amount', 12, 2);
            $table->timestamp('transaction_timestamp');;
            $table->text('sender_name')->nullable();
            $table->timestamp('created')->nullable();
            $table->timestamp('updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('va_payment_details');
    }
}
