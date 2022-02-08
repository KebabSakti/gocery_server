<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_statistics', function (Blueprint $table) {
            $table->id();
            $table->text('product_uid');
            $table->text('uid');
            $table->integer('favourite')->default(0);
            $table->integer('view')->default(0);
            $table->integer('sold')->default(0);
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
        Schema::dropIfExists('product_statistics');
    }
}
