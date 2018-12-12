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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img style="height: 500px; width: 100%; object-fit: cover;" class="d-block w-100" src="{{ url('img/imgTas/TAS100.jpg') }}" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Tas Import</h5>
            <p>Bahan Kulit macan afrika</p>
          </div>
        </div>
        <div class="carousel-item">
          <img style="height: 500px; width: 100%; object-fit: cover;" class="d-block w-100" src="{{ url('img/imgTas/TAS100.jpg') }}" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Tas Import</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img style="height: 500px; width: 100%; object-fit: cover;" class="w-100" src="{{ url('img/imgTas/TAS100.jpg') }}" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Tas Import</h5>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="container-fuild">
    @for ($u=0; $u < 2; $u++)
      <div class="row mt-4">
        @for ($i=0; $i < 6; $i++)
          @foreach ($dataStok as $stok)
            <div class="col-sm">
              <div class="card produk" style="width: 15rem;">
                <img class="card-img-top" src="{{ url('img/imgTas/TAS100.jpg') }}" alt="Card image cap">
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
