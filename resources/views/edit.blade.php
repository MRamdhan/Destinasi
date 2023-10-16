
EDIT
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
    <form action="">
        <div class="container mt-2" style="width: 50%">
            <div class="card p-4 border-2 text-black rounded-4">
                <h4 class="mt-5" style="text-align: center"> Edit Destinasi </h4>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" value="img/rawrkrakatau.jpg">
                </div>
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea cols="30" rows="3" class="form-control" style="resize: none"></textarea>
                </div>
                <div class="mb-3">
                    <label for="link">Link</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea cols="30" rows="3" class="form-control" style="resize: none"></textarea>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success fw-bold w-100">Tambah</button>
                </div>
                <div class="mt-3">
                    <a href="/admin" class="btn btn-secondary fw-bold w-50">Back</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
