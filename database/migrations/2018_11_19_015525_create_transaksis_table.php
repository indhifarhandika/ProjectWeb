<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id_transaksi', 255)->primary();
            $table->unsignedBigInteger('id_user');
            $table->string('id_barang', 255);
            $table->bigInteger('total_barang');
            $table->timestamp('tgl');
            $table->string('status', 20);
            $table->timestamps();
            // Membuat Foreign Key
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_barang')->references('id_barang')->on('stoks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
