<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_payments', function (Blueprint $table) {
            $table->text('id');
            $table->text('owner_id');
            $table->text('external_id');
            $table->text('retail_outlet_name');
            $table->string('prefix');
            $table->string('name');
            $table->string('payment_code');
            $table->decimal('expected_amount', 12, 2);
            $table->boolean('is_single_use');
            $table->string('type');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'EXPIRED']);
            $table->timestamp('expiration_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retail_payments');
    }
}
