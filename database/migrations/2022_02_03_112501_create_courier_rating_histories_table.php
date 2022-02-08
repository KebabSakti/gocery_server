<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierRatingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_rating_histories', function (Blueprint $table) {
            $table->id();
            $table->text('courier_account_uid');
            $table->text('customer_account_uid');
            $table->text('order_uid');
            $table->text('uid');
            $table->enum('rating', [1, 2, 3, 4, 5]);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('courier_rating_histories');
    }
}
