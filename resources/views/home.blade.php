<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .btn-custom {
      color: #fff;
      background-size: cover;
      background-position: center;
      border: none;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
    }
    .btn-custom:hover {
      opacity: 0.8;
    }
    .carousel-item img {
      height: 400px;
      width: 100%;
      object-fit: cover;
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

    <div class="row">
      <div class="col-12">
        @auth
          <h1>Welcome back, {{ Auth::user()->name }}!</h1>
          <p>You can now access your user-specific features.</p>
        @endauth

        @guest
          <h1>Welcome to our website!</h1>
          <p>Please log in or register to access exclusive features.</p>
        @endguest
      </div>
    </div>

    
    
    <div class="row mt-3">
      <div class="col-12 d-flex flex-column flex-md-row justify-content-around">
        <a href="/alat-besar" class="btn btn-primary mb-2 mb-md-0">Alat besar</a>
        <a href="/alat-sedang" class="btn btn-primary mb-2 mb-md-0">Alat sedang</a>
        <a href="/alat-kecil" class="btn btn-primary mb-2 mb-md-0">Alat kecil</a>
      </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://www.simonmed.com/wp-content/uploads/2022/08/MRI-machine-1024x793.jpg" class="d-block w-100" alt="Slide 1">
          <div class="carousel-caption d-none d-md-block">
            <h5>Mesin MRI </h5>
            <p>Mesin MRI import dari Jerman.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://agmmedica.com/wp-content/uploads/2023/01/pexels-etatics-inc-13105351-1.jpg" class="d-block w-100" alt="Slide 2">
          <div class="carousel-caption d-none d-md-block">
            <h5>Stetoskop</h5>
            <p>Stetoskop Murah buatan dalam negeri.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/1/19/0d78c7c2-67c1-4868-8415-7198598cdc63.jpg" class="d-block w-100" alt="Slide 3">
          <div class="carousel-caption d-none d-md-block">
            <h5>Kursi Roda</h5>
            <p>Kursi roda bekas namun masih berkualitas.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    
  </main>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
