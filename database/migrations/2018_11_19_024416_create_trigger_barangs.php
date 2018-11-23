<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerBarangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `barang_baru` AFTER INSERT ON `barangs`
          FOR EACH ROW INSERT INTO stoks SET
          id_barang = NEW.id_barang, jenis_barang = NEW.jenis_barang, total_barang = NEW.total_barang, harga = NEW.harga,gambar = NEW.gambar, tgl_update = NEW.tgl_update
          ON duplicate KEY UPDATE total_barang = total_barang + NEW.total_barang, harga = (harga*0)+NEW.harga, tgl_update = NEW.tgl_update, jenis_barang = NEW.jenis_barang, gambar = NEW.gambar
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
      DROP TRIGGER IF EXISTS `barang_baru` ');
    }
}
