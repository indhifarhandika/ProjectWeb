<h1 class="text-center mb-3 warna-campur" style="font-family: 'Gugi', cursive;">Transaksi User</h1>
<table class="table table-hover table-dark table-responsive-sm" style="overflow: auto;">
    <thead>
      <tr>
        <th scope="col">ID Transaksi</th>
        <th scope="col">Nama Pembeli</th>
        <th scope="col">ID Barang</th>
        <th scope="col">Total Barang</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($dataTransaksi as $transaksi)
      <tr>
        <th>{{ $transaksi->id_transaksi }}</th>
        <td>{{ $transaksi->name }}</td>
        <td>{{ $transaksi->id_barang }}</td>
        <td>{{ $transaksi->total_barang }}</td>
        <td>{{ $transaksi->tgl }}</td>
        <td>{{ $transaksi->status}}</td>
      </tr>
    @endforeach
  </tbody>
</table>