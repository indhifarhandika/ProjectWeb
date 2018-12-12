@extends('layouts.app')

@section('title')
Admin
@endsection

@section('content')
  <div class="jumbotron jumbotron-fuild" style="border-radius: 0;top: 0;margin-bottom: 0;background-image: url({{ url('/img/background.jpg') }}); background-size: cover; height: 25rem;">
    <div class="container text-center">
      <h1 class="text-white" style="font-family: 'Gugi', cursive; font-size: 13vmin; padding-top: 4.5rem;">Admin Panel</h1>
    </div>
  </div>
  <div class="container-fuild">
    <div class="alert bg-dark row text-center" style="margin-right: 0;">
      <div class="col-sm pt-1">
        <a href="" class="nav-item nav-link text-white font-weight-bold" data-toggle="modal" data-target="#FormInsert">Tambah Data</a>
        <!-- Form Insert Data -->
        <div class="modal fade" id="FormInsert" tabindex="-1" role="dialog" aria-labelledby="FormInsert" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="FormInsertLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
<<<<<<< HEAD
                <form class="" action="{!! route('insert') !!}" method="post" enctype="multipart/form-data" id="form1">
=======
                <form class="" action="{!! route('tambah') !!}" method="post" id="form1">
>>>>>>> 29df1b6dd2195e481fa03f824a42ead14b8d2c3c
                  @csrf
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text" for="kodeBarang">Kode Barang</span>
                   </div>
                    <input type="text" name="kodeBarang" value="" class="form-control" id="kodeBarang" placeholder="TAS100" required>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="jenisBarang">Jenis Barang</label>
                    </div>
                    <select class="custom-select" id="jenisBarang" name="jenisBarang">
                      <option selected>Pilih</option>
                      <option value="Import">Barang Import</option>
                      <option value="Eksport">Barang Eksport</option>
                    </select>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text" for="harga">Harga</span>
                   </div>
                    <input type="number" name="harga" value="" class="form-control" id="harga" placeholder="100000" required>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text" for="totalBarang">Total Barang</span>
                    </div>
                    <input type="number" name="totalBarang" value="" class="form-control" id="totalBarang" placeholder="10" required>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="gambar">Gambar</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGambar" name="gambar" aria-describedby="gambar" required>
                      <label class="custom-file-label" for="inputGambar">Klik</label>
                    </div>
                  </div>
                  <div class="form-group text-center pt-4" style="border-top: 1px solid #e9ecef;">
                    <button type="submit" name="insert" class="btn btn-outline-primary" form="form1">Tambah</button>
                    <button type="submit" name="update" class="btn btn-outline-primary mr-4 ml-4" form="form1">Update</button>
                    <button type="submit" name="delete" class="btn btn-outline-primary" form="form1">Hapus</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End -->
      </div>
      <div class="col-sm pt-1">
        <a href="{!! route('admin', 'user') !!}" class="nav-item nav-link text-white font-weight-bold">User</a>
      </div>
      <div class="col-sm pt-1">
        <a href="{!! route('admin', 'transaksi') !!}" class="nav-item nav-link text-white font-weight-bold">Transaksi</a>
      </div>
      <div class="col-sm pt-1">
        <a href="{!! route('admin', 'stok') !!}" style="cursor: pointer;" id="stok" class="nav-item nav-link text-white font-weight-bold">Laporan Stok</a>
      </div>
    </div>
    @if ($data==='sukses')
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
      <h4>Data Berhasil Ditambahkan</h4>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @elseif ($data==='gagal')
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
      <h4>Data Gagal Ditambahkan</h4>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @else
    @endif
    <div>
      {{-- Menampilkan Stok, User, Transaksi --}}
      @if (isset($_GET['user']))
        @include('data.user')
      @elseif (isset($_GET['transaksi']))
        @include('data.transaksi')
      @else
        @include('data.stok')
      @endif
    </div>
  </div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
