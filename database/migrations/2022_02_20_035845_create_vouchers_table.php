<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->text('uid');
            $table->string('title');
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('max');
            $table->decimal('amount', 12, 2);
            $table->decimal('min_order', 12, 2)->default(0.00);
            $table->dateTime('start_at');
            $table->dateTime('expired_at');
            $table->boolean('hidden')->default(true);
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
        Schema::dropIfExists('vouchers');
    }
}
