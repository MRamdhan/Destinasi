<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ $destinasi->foto }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $destinasi->nama }}</h5>
                <p class="card-text">{{ $destinasi->deskripsi }}</p>
                <iframe src="{{ $destinasi->link }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</body>
</html>
