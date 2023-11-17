<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <div class="row">
            @foreach ($destinasis as $destinasi)
            <div class="col-3 mx-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $destinasi->foto }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $destinasi->nama }}</h5>
                        <p class="card-text">{{ $destinasi->deskripsi }}</p>
                        <a href="{{ route('destinasi.show', ['id' => $destinasi->id]) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
