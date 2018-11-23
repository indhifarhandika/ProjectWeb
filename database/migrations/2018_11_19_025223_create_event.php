<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE DEFINER=`root`@`localhost` EVENT `Menghapus_data_yang_sudah_90_hari` ON SCHEDULE EVERY 1 MONTH STARTS "2018-11-10 19:53:36" ON COMPLETION NOT PRESERVE ENABLE COMMENT "Menghapus data." DO DELETE FROM barang
        WHERE tgl_update < DATE_SUB(NOW(), INTERVAL 90 DAY)
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
        DROP EVENT IF EXISTS `Menghapus_data_yang_sudah_90_hari`
      ');
    }
}
