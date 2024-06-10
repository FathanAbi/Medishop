<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>

  <header>
    <a href="/">Home</a>
    @auth
      <a href="/dashboard">Profile</a>
      <a href="/cart">Cart</a>
      <a href="/payment">Payment</a>
    @endauth
    @guest
      <a href="/login">Login</a>
      <a href="/register">Register</a>
    @endguest
  </header>

  <main>
    @auth
      <h1>Welcome back, {{ Auth::user()->name }}!</h1>
      <p>You can now access your user-specific features.</p>
    @endauth

    @guest
      <h1>Welcome to our website!</h1>
      <p>Please log in or register to access exclusive features.</p>
    @endguest

    <a href="/alat-kecil">Alat kecil</a><br>
    <a href="/alat-besar">Alat besar</a>
  </main>

</body>
</html>
