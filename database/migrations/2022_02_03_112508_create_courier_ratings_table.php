<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_ratings', function (Blueprint $table) {
            $table->id();
            $table->text('courier_account_uid');
            $table->text('uid');
            $table->integer('one')->default(0);
            $table->integer('two')->default(0);
            $table->integer('three')->default(0);
            $table->integer('four')->default(0);
            $table->integer('five')->default(0);
            $table->integer('rating_count')->default(0);
            $table->decimal('rating_value', 8, 2)->default(0.00);
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
        Schema::dropIfExists('courier_ratings');
    }
}
