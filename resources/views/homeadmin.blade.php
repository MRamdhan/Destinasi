<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Dashboard Admin</h3>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf <!-- Tambahkan @csrf untuk perlindungan CSRF -->
            <a href="/tambah" class="btn btn-success">Tambah</a>
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="col">No</th>
                    <th class="col">Foto</th>
                    <th class="col">Nama</th>
                    <th class="col">Alamat</th>
                    <th class="col">Link</th>
                    <th class="col">Deskripsi</th>
                    <th class="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinasis as $destinasi) <!-- Ganti $destinasis menjadi $destinasi -->
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><img src="{{ $destinasi->foto }}" alt="Foto" style="width: 100px;"></td>
                    <td>{{ $destinasi->nama }}</td>
                    <td>{{ $destinasi->alamat }}</td>
                    <td><a href="{{ $destinasi->link }}">{{ $destinasi->link }}</a></td> <!-- Ganti $item->link menjadi $destinasi->link -->
                    <td>{{ $destinasi->deskripsi }}</td>
                    <td><a href="/edit" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger">Hapus</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>