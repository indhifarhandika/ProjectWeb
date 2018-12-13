@extends('layouts.app')
@section('title')
Home
@endsection

@section('css')
<style media="screen">
* {
  margin: 0;
}

.container-fuild {
  margin-right: 1rem;
}

.produk {
  margin-left: 3rem;
  margin-bottom: 1rem;
}

/* Unutk layar ukuran 530px kebawah */
@media screen and (max-width: 530px) {
  .produk {
    margin: 17%;
  }
}

/* Untuk layar ukuran 400px kebawah */
@media screen and (max-width: 400px) {
  .produk {
    margin-left: 10%;
  }
}

/* Untuk layar ukuran 360px */
@media screen and (max-width: 360px) {
  .produk {
    margin-left: 6%;
  }
}
</style>
@endsection

@section('content')
  <div class="container-fuild">
    @for ($u=0; $u < 3; $u++)
      <div class="row mt-4">
        @for ($u=0; $u < 3; $u++)
          @foreach ($dataStok as $stok)
            <div class="col-sm">
              <div class="card produk" style="width: 15rem;">
                <img class="card-img-top" src="{!! asset('storage/'.$stok->gambar) !!}"  style="height: 15rem; width: 100%" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Tas {{ $stok->jenis_barang }}</h5>
                  <p class="card-text">Kode Tas: {{ $stok->id_barang }}<br><small class="card-text">Harga: Rp.{{ $stok->harga }}</small></p>
                  <a href="{{(Auth::user()) ? '/produk/'.$stok->id_barang : '/'}}" class="btn btn-outline-primary">{{ __('Beli') }}</a>
                  <a href="#" class="btn btn-outline-success">{{ __('Lihat') }}</a>
                </div>
              </div>
            </div>
          @endforeach
        @endfor
      </div>
    @endfor
  </div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
