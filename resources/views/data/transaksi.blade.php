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

<form class="d-flex justify-content-center mb-4" action="{!! route('htr') !!}" method="post" id="formHapus">
  @csrf
  <div class="row">
    <div class="col-sm-6">
      <input type="text" class="form-control" placeholder="Kode Transaksi" name="status" aria-label="Konfirmasi" aria-describedby="konfirmasi" autocomplete="off" required>
    </div>
    <div class="col-sm-5">
      <div class="input-group">
        <select name="pilih" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
          <option selected>Pilih aksi...</option>
          <option value="1">Konfirmasi Pesanan</option>
          <option value="2">Hapus</option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Oke</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</form>
