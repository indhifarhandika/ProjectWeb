<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
    	'id_barang', 'jenis_barang', 'harga', 'total_barang', 'gambar', 'tgl_update',
    ];
}
