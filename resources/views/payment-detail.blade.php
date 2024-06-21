<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
<header class="container-fluid bg-dark text-light p-3">
      <div class="row">
        <div class="col">
          <a href="/" class="text-light text-decoration-none">Medishop</a>
        </div>
        <div class="col d-flex justify-content-end">
          @auth
            <a href="/dashboard" class="text-light text-decoration-none mx-2">Profile</a>
            <a href="/cart" class="text-light text-decoration-none mx-2">Cart</a>
            <a href="/payment" class="text-light text-decoration-none mx-2">Payment</a>
          @endauth
          @guest
            <a href="/login" class="text-light text-decoration-none mx-2">Login</a>
            <a href="/register" class="text-light text-decoration-none mx-2">Register</a>
          @endguest
        </div>
      </div>
  </header>

  <div class="container mt-5">
    <h1>Payment Details</h1>

    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{ $item->url_foto }}" class="img-fluid rounded-start" alt="{{ $item->name }}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">Quantity: {{ $item->jumlah }}</p>
            <p class="card-text">Total Price: Rp. {{ number_format($item->total_harga, 2) }}</p>
            <p class="card-text">Payment Status: 
              @if ($item->status_pembayaran == 'pending')
                <span class="badge bg-warning text-dark">Pending</span>
              @elseif ($item->status_pembayaran == 'paid')
                <span class="badge bg-success">Paid</span>
              @else
                {{ $item->status_pembayaran }}
              @endif
            </p>

            @if ($item->status_pembayaran == 'Belum Bayar')
            <form action="/payment/{{ $item->id }}" method="POST">
                @csrf
                <input type="hidden" name="payment_status" value="paid">
                <button type="submit" class="btn btn-primary">Proceed to Pay</button>
            </form>
            @elseif ($item->status_pembayaran == 'Sudah bayar')
            <p class="text-info">Menunggu konfirmasi toko (Waiting for store confirmation)</p>
            @endif
            
            <a href="/products/{{ $item->product_id }} " class="btn btn-primary">Produk Page</a><br><br>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>
</html>
