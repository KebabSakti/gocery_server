<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_payment_details', function (Blueprint $table) {
            $table->text('id');
            $table->text('event');
            $table->decimal('amount', 12, 2);
            $table->text('qr_code_id');
            $table->text('external_id');
            $table->text('qr_string');
            $table->text('type');
            $table->text('status');
            $table->text('receipt_id');
            $table->text('source');
            $table->timestamp('created')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qr_payment_details');
    }
}
