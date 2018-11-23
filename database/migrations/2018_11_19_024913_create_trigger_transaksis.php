<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerTransaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `payment` AFTER UPDATE ON `transaksis`
        FOR EACH ROW UPDATE stoks SET
        total_barang = total_barang - NEW.total_barang
        WHERE
        id_barang = NEW.id_barang
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::unprepared('
      DROP TRIGGER IF EXISTS `payment`
      ');
    }
}
