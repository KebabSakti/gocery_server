<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_payments', function (Blueprint $table) {
            $table->text('id');
            $table->text('external_id');
            $table->decimal('amount', 12, 2);
            $table->text('qr_string');
            $table->text('callback_url');
            $table->text('type');
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
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
        Schema::dropIfExists('qr_payments');
    }
}
