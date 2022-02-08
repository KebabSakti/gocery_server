<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_accounts', function (Blueprint $table) {
            $table->id();
            $table->text('partner_uid');
            $table->text('uid');
            $table->text('username');
            $table->text('password');
            $table->boolean('active')->default(false);
            $table->timestamp('owner')->nullable();
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
        Schema::dropIfExists('courier_accounts');
    }
}
