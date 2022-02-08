<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('va_payments', function (Blueprint $table) {
            $table->text('id');
            $table->text('external_id');
            $table->text('owner_id');
            $table->text('bank_code');
            $table->text('merchant_code');
            $table->text('account_number');
            $table->text('name');
            $table->string('currency');
            $table->boolean('is_single_use');
            $table->boolean('is_closed');
            $table->decimal('expected_amount', 12, 2);
            $table->decimal('suggested_amount', 12, 2)->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->text('description');
            $table->enum('status', ['PENDING', 'ACTIVE', 'INACTIVE']);
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
        Schema::dropIfExists('va_payments');
    }
}
