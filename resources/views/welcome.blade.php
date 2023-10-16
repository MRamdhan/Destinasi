<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <div class="row">
            @foreach ($destinasis as $destinasi)
            <div class="col-3 mx-2"> <!-- Tambahkan kelas mx-2 di sini -->
                <div class="card">
                    <img src="{{ $destinasi->foto }}" alt="Foto">
                    <div class="card-body">
                        <div class="card-title">{{ $destinasi->nama }}</div>
                        <div class="card-text">{{ $destinasi->deskripsi }}  </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
