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
        <th scope="col">Pengaturan</th>
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
        <td><img src="{!! asset('storage/'.$stok->gambar) !!}" style="height: 30px; width: 30px;"></td>
        <td>{{ $stok->tgl_update }}</td>
        <td><a href="/home/admin?id={{ $stok->id_barang}}" data-toggle="modal" data-target="#{{ $stok->id_barang}}">Edit</a> | <a href="" data-toggle="modal" data-target="#exampleModal">Hapus</a></td>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus {{ $stok->id_barang }}?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="{{ '/hapus/'.$stok->id_barang }}" type="submit" class="btn btn-primary">Hapus</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Form Insert Data -->
        <div class="modal fade" id="{{ $stok->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="FormInsert" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="FormInsertLabel">Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="{!! route('update') !!}" method="post" enctype="multipart/form-data" id="formEdit{{ $row }}">
                  @csrf
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text" for="kodeBarang">Kode Barang</span>
                   </div>
                    <input type="text" name="kd" value="{{ $stok->id_barang}}" class="form-control" id="kd" placeholder="" disabled>
                    <input type="text" name="kodeBarang" value="{{ $stok->id_barang}}" class="form-control" id="kodeBarang" placeholder="" hidden>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="jenisBarang">Jenis Barang</label>
                    </div>
                    <select class="custom-select" id="jenisBarang" name="jenisBarang">
                      @if ($stok->jenis_barang === 'Import')
                        <option value="Import" selected>Barang Import</option>
                        <option value="Eksport">Barang Eksport</option>
                      @else
                        <option value="Eksport" selected>Barang Eksport</option>
                        <option value="Import">Barang Import</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text" for="harga">Harga</span>
                   </div>
                    <input type="number" name="harga" value="{{ $stok->harga }}" class="form-control" id="harga" placeholder="100000">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                     <span class="input-group-text" for="totalBarang">Total Barang</span>
                    </div>
                    <input type="number" name="totalBarang" value="{{ $stok->total_barang }}" class="form-control" id="totalBarang" placeholder="10">
                  </div>
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="gambar">Gambar</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGambar" name="gambar" aria-describedby="gambar">
                      <label class="custom-file-label" for="inputGambar">Klik</label>
                    </div>
                  </div>
                  <div class="form-group text-center pt-4" style="border-top: 1px solid #e9ecef;">
                    <button type="submit" name="update" class="btn btn-outline-primary btn-block" form="formEdit{{ $row }}">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End -->

      </tr>
    @endforeach
  </tbody>
</table>
