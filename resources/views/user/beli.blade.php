@extends('layouts.app')

@section('title')
Beli
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm">
      <h1>Kode Tas: {{ $data['id_barang'] }}</h1>
    </div>
  </div>
</div>
@endsection
