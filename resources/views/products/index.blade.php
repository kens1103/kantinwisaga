<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .product-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>Kantin Wikrama 1 Garut</h1>
        </div>
    </header>
    <div class="container mt-5">
        <h2>Selamat Jajan!</h2>
        <h3>Menu</h3>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text">Stok: {{ $product->stock }}</p>
                            <button type="submit" class="btn btn-outline-primary mt-auto">Detail</a>
                            <button type="submit" class="btn btn-outline-primary mt-auto">Tambah ke Keranjang</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
