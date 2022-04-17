<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_uid');
            $table->string('uid');
            $table->string('channel_code');
            $table->text('name');
            $table->text('currency')->default('IDR');
            $table->text('channel_category');
            $table->text('picture');
            $table->decimal('fee', 12, 2)->default(0.00);
            $table->enum('fee_type', ['fix', 'percentage'])->default('fix');
            $table->integer('min')->default(0);
            $table->integer('max')->default(0);
            $table->integer('expire')->default(0);
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
        Schema::dropIfExists('payments');
    }
}
