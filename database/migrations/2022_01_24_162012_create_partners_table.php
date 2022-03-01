<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->text('uid');
            $table->text('name');
            $table->text('address');
            $table->text('phone');
            $table->enum('shipping', ['LANGSUNG', 'TERJADWAL']);
            $table->enum('type', ['GAS', 'GROCERY', 'OTHER']);
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->boolean('exclusive')->default(false);
            $table->boolean('online')->default(false);
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
        Schema::dropIfExists('partners');
    }
}
