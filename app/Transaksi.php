<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable = [
    	'id_transaksi', 'id_user' , 'id_barang', 'total_barang', 'total_harga', 'tgl', 'status',
    ];
}
