<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user');
            $table->integer('id_wisata');
            $table->string('email_customer');
            $table->string('nama_wisata');
            $table->timestamps();
            $table->string('payment_date');
            $table->string('payment_status')->default('Unpaid');
            $table->BigInteger('total_price');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('email_customer')->references('email')->on('customers')->onDelete('cascade');
            $table->foreign('nama_wisata')->references('nama')->on('wisatas')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
