<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Stok;
use App\User;
use Illuminate\Routing\Redirector;
use App\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dataStok = $this->showStok();
      return view('welcome', compact('dataStok'));
    }

    public function produk($id){
      //Code kamu
      $data['id_barang'] = $id;
      return view('user.beli', compact('data'));
    }

    //Admin Panel
    public function admin(){
        $dataStok = $this->showStok(); //Memanggil function showStok
        $dataUser = $this->showUser(); //Memanggil function showUser
        $dataTransaksi = $this->showTransaksi(); //Memanggil function showTransaksi
        $row = 1;
        //compact untuk mengirim data ke view
        return view('admin', compact('dataStok', 'dataTransaksi', 'dataUser', 'row'));
    }

    //Mengontrol Tabel
    public function showBarang(){
        //Mengambil data dari tabel Barangs
        return Barang::get();
    }

    public function showStok(){
        //Mengambil data dari tabel Stoks
        return Stok::get();
    }

    public function showUser()
    {
        //mengambil data dari tabel Users
        return User::get();
    }

    public function showTransaksi()
    {
        //mengambil data dari tabel Transaksis dan tabel Users
        return DB::select('SELECT transaksis.id_transaksi, users.name, transaksis.id_barang, transaksis.total_barang, transaksis.tgl, transaksis.status FROM transaksis, users WHERE users.id = transaksis.id_user');
    }


    public function insert(Request $request) {
      $imga = $request->file('gambar')->store('public\gambar');
      $masuk = Barang::insert([
        'id_barang'=>$request->kodeBarang,
        'jenis_barang'=>$request->jenisBarang,
        'harga'=>$request->harga,
        'total_barang'=>$request->totalBarang,
        'gambar'=>$imga
      ]);
        return redirect()->route('admin');
    }
}
