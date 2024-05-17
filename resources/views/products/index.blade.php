<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: left;
            position: relative;
        }
        .cart-button {
            position: absolute;
            right: 20px;
            top: 10px;
            background-color: white;
            color: #007bff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        .product-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }
        .product-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            text align: center
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .btn-detail {
            margin-bottom: 10px;
        }
        .btn-cart {
            display: block;
            margin-top: 10px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
        <div class="header">
            <h1>Kantin Wikrama 1 Garut</h1>
            <button id="cart-button" class="cart-button">Keranjang (0)</button>
        </div>
        <div class="product-cart">
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
                            <button type="submit" class="btn-detail btn-primary mt-auto">Detail</a>
                            <button type="submit" class="btn-card btn-primary mt-auto">Tambah ke Keranjang</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle">Product Title</h2>
            <p id="modalPrice">Price</p>
            <p id="modalStock">Stock</p>
            <p id="modalDescription">Description</p>
        </div>
    </div>
    <script>
        const modal = document.getElementById("productModal");
        const span = document.getElementsByClassName("close")[0];

        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', (event) => {
                const productCard = event.target.closest('.product-card');
                const name = productCard.dataset.name;
                const price = productCard.dataset.price;
                const stock = productCard.dataset.stock;
                const description = productCard.dataset.description;

                document.getElementById('modalTitle').textContent = name;
                document.getElementById('modalPrice').textContent = 'Rp ' + price;
                document.getElementById('modalStock').textContent = 'Stok: ' + stock;
                document.getElementById('modalDescription').textContent = description;

                modal.style.display = "block";
            });
        });
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        let cartCount = 0;

        document.querySelectorAll('.btn-cart').forEach(button => {
            button.addEventListener('click', () => {
                cartCount++;
                document.getElementById('cart-button').textContent = 'Keranjang (${cartCount})';
            });
        });
    </script>
</body>
</html>
