<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEwalletPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ewallet_payment_details', function (Blueprint $table) {
            $table->text('id');
            $table->text('business_id');
            $table->text('reference_id');
            $table->text('event');
            $table->enum('status', ['SUCCEEDED', 'FAILED', 'VOIDED', 'REFUNDED', 'PENDING']);
            $table->string('currency');
            $table->decimal('charge_amount', 12, 2);
            $table->decimal('capture_amount', 12, 2)->nullable();
            $table->decimal('refunded_amount', 12, 2)->nullable();
            $table->text('checkout_method');
            $table->text('channel_code');
            $table->text('mobile_number')->nullable();
            $table->text('success_redirect_url')->nullable();
            $table->boolean('is_redirect_required');
            $table->text('callback_url');
            $table->timestamp('created')->nullable();
            $table->timestamp('updated')->nullable();
            $table->enum('void_status', ['SUCCEEDED', 'FAILED', 'PENDING'])->nullable();
            $table->timestamp('voided_at')->nullable();
            $table->boolean('capture_now');
            $table->text('customer_id')->nullable();
            $table->text('payment_method_id')->nullable();
            $table->text('failure_code')->nullable();
            $table->text('qr_checkout_string')->nullable();
            $table->text('mobile_web_checkout_url')->nullable();
            $table->text('desktop_web_checkout_url')->nullable();
            $table->text('mobile_deeplink_checkout_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ewallet_payment_details');
    }
}
