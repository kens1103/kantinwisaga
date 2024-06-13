<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>Kantin Wikrama 1 Garut</h1>
            <a href="{{ route('products.index') }}" class="btn btn-light">Kembali ke Menu</a>
        </div>
    </header>
    @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <h2>Keranjang Belanja</h2>
        @if(session('cart'))
        <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPrice = 0 @endphp
                    @foreach(session('cart') as $id => $details)
                    @php $totalPrice += $details['price'] * $details['quantity'] @endphp
                        <tr>
                            <td><img src="{{ asset('storage/' . $details['photo']) }}" width="100" alt="{{ $details['name'] }}"></td>
                            <td>{{ $details['name'] }}</td>
                            <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total Harga</strong></td>
                        <td><strong>Rp {{ number_format($totalPrice, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button id="submit" class="btn btn-primary">Beli</button>
                </form>
        @else
            <p>Keranjang kosong.</p>
        @endif

        @if(session('pembayaran berhasil!'))
        <div class="modal" tabindex="-1" role="dialog" id="successModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Berhasil</h5>
                    </div>
                    <div class="modal-body">
                        <p>Pembayaran Berhasil!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="okButton">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#successModal').modal('show');
            });

            document.getElementById('okButton').addEventListener('click', function() {
                window.location.href = "{{ route('products.index') }}";
            });
        </script>
        @endif
    </div>
    @endsection
</body>
</html>
