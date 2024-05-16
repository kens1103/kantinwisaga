<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $product->name }}</h1>
        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="img-fluid mb-4">
        <h2>Rp. {{ number_format($product->price, 0, ',', '.') }}</h2>
        <p>Stok: {{ $product->stock }}</p>
        <a href="{{ url('/products') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
