<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

  <main class="container mt-5">
    @auth
      <h1>Welcome back, {{ Auth::user()->name }}!</h1>
      <p>You can now access your user-specific features.</p>
    @endauth

    @guest
      <h1>Welcome to our website!</h1>
      <p>Please log in or register to access exclusive features.</p>
    @endguest

    <div class="d-flex justify-content-around mt-3">
      <a href="/alat-kecil" class="btn btn-primary">Alat kecil</a>
      <a href="/alat-besar" class="btn btn-primary">Alat besar</a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
