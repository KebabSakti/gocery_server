<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('category_uid');
            $table->text('uid');
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->decimal('price', 12, 2)->default(0.00);
            $table->decimal('discount', 4, 2)->default(0.00);
            $table->decimal('final_price', 12, 2)->default(0.00);
            $table->text('unit');
            $table->integer('unit_count')->default(0);
            $table->integer('min_order')->default(1);
            $table->integer('max_order');
            $table->integer('stok')->default(0);
            $table->integer('point')->default(0);
            $table->enum('shipping', ['LANGSUNG', 'TERJADWAL']);
            $table->enum('type', ['GAS', 'GROCERY', 'OTHER']);
            $table->text('deeplink')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('products');
    }
}
