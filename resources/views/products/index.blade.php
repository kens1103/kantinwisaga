<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Sekul</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>kantinSekul</h1>
        </div>
        <h2>Selamat datang</h2>
        <h3>Makanan</h3>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="#" class="btn btn-outline-primary">Detail</a>
                            <p class="card-text">Stok: {{ $product->stock }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
