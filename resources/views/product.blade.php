<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
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
    <div class="row">
      <div class="col-md-6">
        <img src="{{ $product->url_foto }}" alt="{{ $product->name }}" class="img-fluid rounded" width="300" height="300">
      </div>
      <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p>Price: Rp.{{ number_format($product->harga, 2) }}</p>
        @php
             $paragraphs = explode("\n", $product->deskripsi); // Split text by newlines
        @endphp

        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
        <br>

        <a href="/verification/ {{ $product->id }}" class="btn btn-primary">Cek Verifikasi</a>

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
      </div>
    </div>
  </div>

</body>
</html>
