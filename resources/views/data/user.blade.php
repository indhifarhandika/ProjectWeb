<h1 class="text-center mb-3 warna-campur" style="font-family: 'Gugi', cursive;">User yang terdaftar</h1>
<table class="table table-hover table-dark table-responsive-sm" style="overflow: auto;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Alamat</th>
        <th scope="col">Status</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($dataUser as $user)
      <tr>
        <th>{{ $row++ }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->alamat }}</td>
        <td>{{ $user->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>