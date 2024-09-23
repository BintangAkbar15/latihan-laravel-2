<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUAL AYAM</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <!-- 01. Content-->
    <h1 class="text-center mb-4">JUAL AYAM</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('success') }}</li>
                        </ul>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- 02. Form input data -->
                <form onsubmit="return confirm('Apakah Kamu Yakin Ingin Mengedit ini?')"  id="product-form" action="{{ route('product.update',['id' =>  $title ]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $title }}">
                    <div class="form-group mb-1">
                        <label for="name" class="mb-2">Nama Product</label>
                        <input type="text" class="form-control" name="title" value="{{ $posts->title }}" id="name" required>
                    </div>
                    <div class="form-group mb-1">
                        <label for="desc" class="mb-2">Deskripsi</label>
                        <input type="text" class="form-control" name="desc" value="{{ $posts->desc }}" id="desc" required>
                    </div>
                    <div class="form-group mb-1">
                        <label for="price" class="mb-2">Harga</label>
                        <input type="text" class="form-control" name="price" value="{{ $posts->price }}" id="price" required>
                    </div>
                    <div class="form-group mb-1">
                        <label for="stock" class="mb-2">Stok</label>
                        <input type="text" class="form-control" name="stock" value="{{ $posts->stock }}" id="stock" required>
                    </div>
                    <div class="form-group mb-1">
                        <label for="thumb" class="mb-2">Product Name</label>
                        <input type="file" class="form-control" name="thumb" id="thumb" value="{{ $posts->thumb }}">
                    </div>
                    <button class="btn btn-warning mt-3 w-100" type="submit">
                        Edit
                    </button>
                </form>
                </div>
            </div> 
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (popper.js included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>