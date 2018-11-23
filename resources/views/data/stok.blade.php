<h1 class="text-center mb-3 warna-campur" style="font-family: 'Gugi', cursive;">Laporan Stok</h1>
<table class="table table-hover table-dark table-responsive-sm" style="overflow: auto;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Barang</th>
        <th scope="col">Jenis Barang</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Gambar</th>
        <th scope="col">Tanggal Update</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($dataStok as $stok)
      <tr>
        <th>{{ $row++ }}</th>
        <td>{{ $stok->id_barang}}</td>
        <td>{{ $stok->jenis_barang}}</td>
        <td>{{ $stok->harga }}</td>
        <td>{{ $stok->total_barang }}</td>
        <td>{{ $stok->gambar}}</td>
        <td>{{ $stok->tgl_update }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
