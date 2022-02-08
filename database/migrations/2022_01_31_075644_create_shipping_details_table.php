<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->text('order_uid');
            $table->text('partner_uid');
            $table->text('uid');
            $table->enum('shipping', ['LANGSUNG', 'TERJADWAL']);
            $table->decimal('distance', 3, 1);
            $table->string('distance_unit');
            $table->decimal('price', 12, 2);
            $table->text('time');
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
        Schema::dropIfExists('shipping_details');
    }
}
