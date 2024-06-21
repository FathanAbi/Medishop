<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alat Sedang</title>
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
      <div class="col-md-12">
        <h1>Alat Sedang</h1>
      </div>
    </div>
    
    @if($products->isEmpty())
      <p class="alert alert-warning">No products found.</p>
    @else
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
          <div class="col">
            <div class="card h-100">
              <img src="{{ $product->url_foto }}" class="card-img-top" alt="{{ $product->name }}" width="200" height="150">
              <div class="card-body">
                <h5 class="card-title"><a href="/products/{{ $product->id }}" class="text-decoration-none">{{ $product->name }}</a></h5>
                <p class="card-text">{{ substr($product->deskripsi, 0, 50) . (strlen($product->deskripsi) > 50 ? "..." : "") }}</p>
                <p class="card-text">Rp. {{ number_format($product->harga) }}</p>
                <a href="/products/{{ $product->id }}" class="btn btn-primary">Add to Cart</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>

</body>
</html>
