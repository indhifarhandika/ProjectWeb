<?php

use Illuminate\Database\Seeder;
use App\Barang;
use Carbon\Carbon;

class isi_tabel_barang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Isi tabel Barangs
    	Barang::create([
    		'id_barang' => 'TAS100',
    		'jenis_barang' => 'Import',
    		'harga' => 150000,
    		'total_barang' => 4,
    		'gambar' => 'TAS100.png',
    		'tgl_update' => Carbon::now()->toDateTimeString()
    	]);
    }
}
