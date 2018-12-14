<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Stok;
use App\User;
use App\Transaksi;
use Carbon\Carbon;
use Auth;
use Illuminate\Routing\Redirector;
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
      // $user = User::where('name', Auth::user())->get();
      $result = Stok::where('id_barang', $id)->get();
      $code = rand();
      $data['id_barang'] = $id;
      $data['id_transaksi'] = 'TR' . $code;
      return view('user.beli', compact('data', 'result'));
    }

    //Admin Panel
    public function admin(Request $request){
      if (Auth::user()->status === 'admin') {
        // code...
        $dataStok = $this->showStok(); //Memanggil function showStok
        $dataUser = $this->showUser(); //Memanggil function showUser
        $dataTransaksi = $this->showTransaksi(); //Memanggil function showTransaksi
        $data = $request->data;
        $row = 1;
        //compact untuk mengirim data ke view
        return view('admin', compact('dataStok', 'dataTransaksi', 'dataUser', 'row', 'data'));
      }else {
        return redirect()->route('/');
      }
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
      if (!$masuk) {
        $data['data'] = ['gagal', 'Ditambahkan'];
      }else{
        $data['data'] = ['sukses', 'Ditambahkan'];
      }
      return redirect()->route('admin', $data);
    }

    public function update(Request $request){
      // dd($request->file('gambar'));
      if ($request->file('gambar') === null) {
        $query = Stok::where('id_barang', $request->kodeBarang)->update([
          'jenis_barang'=>$request->jenisBarang,
          'harga'=>$request->harga,
          'total_barang'=>$request->totalBarang
        ]);
      }else {
        $imga = $request->file('gambar')->store('public\gambar');
        $query = Stok::where('id_barang', $request->kodeBarang)->update([
          'jenis_barang'=>$request->jenisBarang,
          'harga'=>$request->harga,
          'total_barang'=>$request->totalBarang,
          'gambar'=>$imga
        ]);
      }

      if (!$query) {
        $data['data'] = ['gagal', 'Diupdate'];
      }else{
        $data['data'] = ['sukses', 'Diupdate'];
      }
      return redirect()->route('admin', $data);
    }

    public function hapus($id){
        //Code kamu
        $query = Stok::where('id_barang', $id)->delete();
        if (!$query) {
          $data['data'] = ['gagal', 'Dihapus'];
        }else{
          $data['data'] = ['sukses', 'Dihapus'];
        }
        return redirect()->route('admin', $data);
    }

    public function hapusTr(Request $request){
        //Code kamu
        // dd($request);
        if ($request->pilih === "1") {
          // Konfirmasi Pesanan
          Transaksi::where('id_transaksi', $request->status)->update(['status' => 'Terkirim']);
          // dd($query);
          $data = ['transaksi', 'sukses'];
        }else {
          // Hapus data transaksi
          Transaksi::where('id_transaksi', $request->status)->delete();
          $data = ['transaksi', 'sukses'];
        }
        return redirect()->route('admin', $data);
    }

    public function bayar(Request $request){
        //Code kamu
        $data['transaksi'] = [
          $request->id_transaksi,
          $request->id_user,
          $request->id_barang,
          $request->harga,
          $total_harga = $request->harga * $request->total_barang,
          $request->total_barang,
          $request->status,
        ];
        return view('user.bayar', compact('data'));
    }

    public function insertTr(Request $request){
        //Code kamu
        $query = Transaksi::insert([
          'id_transaksi'=>$request->id_transaksi,
          'id_user'=>$request->id_user,
          'id_barang'=>$request->id_barang,
          'total_barang'=>$request->total_barang,
          'total_harga'=>$request->total_harga,
          'status'=>$request->status
        ]);
      return redirect()->route('/');
    }

}
