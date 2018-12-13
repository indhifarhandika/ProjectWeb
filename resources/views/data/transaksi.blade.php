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

<form class="d-flex justify-content-center" action="" method="post" id="formTransaksi">
  <div class="input-group mb-3 pl-2" style="width: 20rem;">
    <div class="input-group-append">
      <button style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;" class="btn btn-outline-primary" type="button" id="hapus" data-toggle="modal" data-target="#modalHapus">Hapus</button>
      <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4>Apakah anda yakin ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary" name="iya" form="formTransaksi">Iya</button>
            </div>
          </div>
        </div>
      </div>
    <input type="text" class="form-control" placeholder="Kode Transaksi" name="status" aria-label="Konfirmasi" aria-describedby="konfirmasi" autocomplete="off" required>
    <div class="input-group-append">
      <button class="btn btn-outline-primary" type="button" id="konfirmasi" form="formTransaksi" data-toggle="modal" data-target="#modalKonfirmasi">Konfirmasi</button>
      <div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4>Apakah anda yakin ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary" name="iya2" form="formTransaksi">Iya</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</form>
