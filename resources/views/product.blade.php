<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
<header class="container-fluid bg-dark text-light p-3">
    <div class="row">
        <div class="col-6">
            <a href="/" class="text-light text-decoration-none">Medishop</a>
        </div>
        <div class="col-6 d-flex justify-content-end">
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
    <div class="row">
        <div class="col-md-12">
            <img src="{{ $product->url_foto }}" alt="{{ $product->name }}" class="img-fluid rounded" width="300" height="300">
        </div>
        <div class="col-md-12">
            <h1>{{ $product->name }}</h1>
            <p>Price: Rp.{{ number_format($product->harga, 2) }}</p>
            @php
                $paragraphs = explode("\n", $product->deskripsi);
            @endphp

            @foreach ($paragraphs as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
            <br>
            
            <h2>{{ $item->name }}</h2>
            <a href="/shops/{{ $product->toko }}" class="btn btn-primary">Toko</a><br><br>
            <a href="/verification/{{ $product->id }}" class="btn btn-primary">Cek Verifikasi</a>

            @auth
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1">
                </div>
                <input type="hidden" name="id_alat" value="{{ $product->id }}">
                <input type="hidden" name="harga" value="{{ $product->harga }}">
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
            @endauth
        </div>
    </div>
</div>

<footer class="bg-dark text-light p-3 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h5>About Us</h5>
          <p>Medishop is your go-to place for medical equipment of all sizes. We provide high-quality products for all your needs.</p>
        </div>
        
        <div class="col-md-6">
          <h5>Contact Us</h5>
          <p>Email: support@medishop.com</p>
          <p>Phone: +62 822 5704 3650</p>
          <p>Address: Jl. Teknik Kimia, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60111</p>
        </div>
      </div>
      <div class="text-center mt-3">
        <p>&copy; 2024 Medishop. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

</body>
</html>
