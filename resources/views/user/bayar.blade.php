@extends('layouts.app')

@section('title')
Transaksi Pembayaran
@endsection

@section('css')
  <style media="screen">
  .garis {
    border: 1px solid #000000;
    box-sizing: border-box;
    border-radius: 15px;
    width: 20rem;
    height: auto;
  }
  h6 {
    padding-left: 2rem;
  }
  </style>
@endsection

@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="offset-sm-3 col-sm">
        <div class="garis">
          @foreach($data as $row)
            <h6 class="pt-2">ID Transaksi: {{ $row[0] }}</h6>
            <h6>ID Barang: {{ $row[2] }}</h6>
            <h6>Harga Satuan: Rp. {{ $row[3] }}</h6>
            <h6>Jumlah: {{ $row[5] }}</h6>
            <h6>Total Harga: Rp. {{ $row[4] }}</h6>

            <form class="" action="{!! route('insertTr') !!}" class="pl-3" method="post">
              @csrf
              <input type="text" name="id_transaksi" value=" {{ $row[0] }}" class="form-control" hidden>
              <input type="text" name="id_user" value=" {{ $row[1] }}" class="form-control" hidden>
              <input type="text" name="id_barang" value=" {{ $row[2] }}" class="form-control" hidden>
              <input type="text" name="total_barang" value=" {{ $row[5] }}" class="form-control" hidden>
              <input type="text" name="total_harga" value=" {{ $row[4] }}" class="form-control" hidden>
              <input type="text" name="status" value=" {{ $row[6] }}" class="form-control" hidden>

              <button type="submit" class="btn btn-outline-primary ml-4 mb-1">Bayar</button>
            </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
