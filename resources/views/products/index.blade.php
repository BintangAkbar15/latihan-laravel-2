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
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <a href="/add">Add Product</a>
                        <form id="product-form" action="{{ route('product') }}" method="get">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="search" value="{{ old('search') }}" 
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>
                        <table class="table text-center">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img width="100" height="100"  src="{{ url('storage/' . $item->thumb) }}" alt="{{ $item->title }}"></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <a href="/edit/{{ $item->title }}" class="btn btn-success btn-sm">Edit</a>
                                        <form onsubmit="return confirm('Apakah Kamu Yakin Ingin Menghapus ini?')" class="d-inline" action="{{ route('product.delete', ['id'=>$item->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')    
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center"> No Data Found</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
                {{ $data->links() }}
            </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>