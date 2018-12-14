@extends('layouts.app')

@section('title')
Beli
@endsection

@section('css')
  <style media="screen">
    .gambar {
      box-shadow: 4px 4px #888888;
      border-radius: 15px;
    }
    .garis {
      border: 1px solid #000000;
      box-sizing: border-box;
      border-radius: 15px;
      height: auto;
    }
  </style>
@endsection

@section('content')
<div class="container">
  <div class="row mt-4">
    <div class="col-sm">
      @foreach($result as $row)
      <h6>ID Transaksi: {{ $data['id_transaksi'] }}</h6>
      <img class="gambar" src="{!! asset('storage/'.$row->gambar) !!}"  style="height: 15rem; width: 15rem">
      <h5 class="mt-3">Kode Tas: {{ $data['id_barang'] }}</h5>
      <h6>Jenis Barang: {{ $row->jenis_barang }}</h6>
      <h6>Harga: Rp.{{ $row->harga }}</h6>
      <h6>Stok: {{ ($row->total_barang === 0) ? 'Maaf Stok Habis' : $row->total_barang.' Unit' }}</h6>
      @endforeach
      <form class="" action="{!! route('bayar') !!}" method="post">
        @csrf
        <input type="text" name="id_transaksi" value="{{ $data['id_transaksi'] }}" class="form-control" hidden>
        <input type="number" name="id_user" value="{{ Auth::user()->id }}" class="form-control" hidden>
        <input type="text" name="id_barang" value="{{ $data['id_barang'] }}" class="form-control" hidden>
        <input type="text" name="status" value="Belum Dikonfirmasi" class="form-control" hidden>
        <input type="text" name="harga" value="{{ $row->harga }}" class="form-control" hidden>
        <div class="form-group input-group">
          <div class="input-group-prepend">
           <span class="input-group-text" for="kodeBarang">Jumlah Barang</span>
         </div>
          <input type="number" name="total_barang" value="" class="form-control" id="kodeBarang" {{ ($row->total_barang === 0) ? 'disabled' : ''}} required autocomplete="off">
        </div>
        <input class="btn btn-outline-primary" type="submit" value="Konfirmasi" {{ ($row->total_barang === 0) ? 'disabled' : ''}}>
      </form>
    </div>
    <div class="col-sm-8">
      <div class="garis">
        <h5 class="text-center pt-2">Cara Pembayaran</h5>
        <p class="pl-2">1. Simpan atau Screen capture ID Transaksi<br>
          2. Klik Tombol <strong>Bayar</strong><br>
          3. Transfer uang ke Rekening BRI : <strong>6210939834957</strong> a/n <strong>Irma Dwi Astutik</strong><br>
          4. Kirim bukti transfer dan ID Transaksi ke nomor WhatsApp : 085771232132
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
