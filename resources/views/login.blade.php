<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf 
            <div class="card p-4 border-2 text-black rounded-4">
                <h4> Login </h4>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label> 
                    <input type="email" class="form-control" name="email"> 
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label> 
                    <input type="password" class="form-control" name="password">
                <div class="mt-3">
                    <button type="submit" class="btn btn-success rounded-4 fw-bold w-100">Login</button> 
                </div>
                <div class="mt-3">
                    <a href="/" class="btn btn-secondary fw-bold w-30"> Back</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>