<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_payment_details', function (Blueprint $table) {
            $table->text('id');
            $table->text('external_id');
            $table->string('prefix');
            $table->text('payment_code');
            $table->text('retail_outlet_name');
            $table->text('name');
            $table->decimal('amount', 12, 2);
            $table->text('payment_id');
            $table->text('fixed_payment_code_payment_id');
            $table->text('fixed_payment_code_id');
            $table->text('owner_id');
            $table->enum('status', ['SETTLING', 'COMPLETED']);
            $table->timestamp('transaction_timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retail_payment_details');
    }
}
