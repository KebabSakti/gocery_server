<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_channels', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('channel_code');
            $table->integer('ordering')->default(0);
            $table->text('name');
            $table->text('currency')->default('IDR');
            $table->text('channel_category');
            $table->text('picture');
            $table->boolean('default')->default(false);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('payment_channels');
    }
}
