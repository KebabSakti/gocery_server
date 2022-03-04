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
            $table->text('courier_account_uid');
            $table->text('uid');
            $table->enum('shipping', ['LANGSUNG', 'TERJADWAL']);
            $table->enum('type', ['GAS', 'GROCERY', 'OTHER']);
            $table->decimal('distance', 3, 1);
            $table->string('distance_unit');
            $table->decimal('price', 12, 2);
            $table->text('time');
            $table->enum('status', ['Menunggu Pembayaran', 'Menyiapkan Orderan', 'Pengantaran', 'Selesai', 'Batal']);
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
