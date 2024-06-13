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
            position: sticky;
            width: 100%;
            z-index: 1000;
            top: 0;
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
            text-align: left;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .btn-primary-custom {
            margin-bottom: 10px;
            border-radius: 10px;
            width: 100%;
        }
        .btn-detail {
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .btn-card {
            display: block;
            margin-top: 10px;
            border-radius: 10px;
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
            margin: 8% auto;
            padding: 30px;
            border: 1px solid #888;
            max-width: 30%;
            width: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            align-self: flex-end;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        #modalImage {
            width: 80%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .container {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Kantin Wikrama 1 Garut</h1>
        <button id="cart-button" class="cart-button" onclick="window.location.href='{{ route('cart.index') }}'">Keranjang ({{ session('cart') ? count(session('cart')) : 0 }})</button>
    </div>
    <div class="container mt-5">
        <h2>Selamat Jajan!</h2>
        <h3>Menu</h3>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card product-card" data-name="{{ $product->name }}" data-price="{{ number_format($product->price, 0, ',', '.') }}" data-stock="{{ $product->stock }}" data-description="{{ $product->description }}">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text">Stok: {{ $product->stock }}</p>
                            <button type="button" class="btn-detail btn-primary btn-primary-custom mt-auto btn-detail">Detail</button>
                            <form id="add-to-cart-form-{{ $product->id }}" action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity-{{ $product->id }}">Jumlah</label>
                                    <input type="number" name="quantity" id="quantity-{{ $product->id }}" class="form-control" value="1" min="1" max="{{ $product->stock }}">
                                </div>
                                <button type="submit" class="btn-card btn-primary btn-primary-custom add-to-cart" data-id="{{ $product->id }}">Tambah ke Keranjang</button>
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
            <img id="modalImage" src="" alt="Product Image">
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
                const imageUrl = productCard.querySelector('img').src;

                document.getElementById('modalTitle').textContent = name;
                document.getElementById('modalPrice').textContent = 'Harga  : Rp ' + price;
                document.getElementById('modalStock').textContent = 'Stok   : ' + stock;
                document.getElementById('modalDescription').textContent = description;
                document.getElementById('modalImage').src = imageUrl;

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
        let cartCount = {{ session('cart') ? count(session('cart')) : 0 }};

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const form = event.target.closest('form');
                const productId = event.target.getAttribute('data-id');

                fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        cartCount++;
                        document.getElementById('cart-button').textContent = `Keranjang (${cartCount})`;
                        document.getElementById('total-price').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(data.totalPrice);
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>
