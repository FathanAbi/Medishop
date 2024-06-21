<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<header class="container-fluid bg-dark text-light p-3">
    <div class="row align-items-center">
        <div class="col-6 col-md-8">
            <a href="/" class="text-light text-decoration-none">Medishop</a>
        </div>
        <div class="col-6 col-md-4 d-flex justify-content-end">
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

<main class="container mt-5">
    <form action="{{ route('products.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Search products" value="{{ request()->input('query') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h1>Alat Besar</h1>
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
</main>

<footer class="bg-dark text-light p-3 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>Medishop is your go-to place for medical equipment of all sizes. We provide high-quality products for all your needs.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/about" class="text-light text-decoration-none">About</a></li>
                    <li><a href="/contact" class="text-light text-decoration-none">Contact</a></li>
                    <li><a href="/privacy" class="text-light text-decoration-none">Privacy Policy</a></li>
                    <li><a href="/terms" class="text-light text-decoration-none">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>Email: support@medishop.com</p>
                <p>Phone: +123 456 7890</p>
                <p>Address: 123 Medical Street, MedCity, MC 12345</p>
            </div>
        </div>
        <div class="text-center mt-3">
            <p>&copy; 2024 Medishop. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
