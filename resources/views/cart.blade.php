<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
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

  @if (session('success'))
    <div class="container mt-3">
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    </div>
  @endif

  @if ($errors->any())
    <div class="container mt-3">
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif

  <div class="container mt-5">
    <h1>Cart</h1>

    @if($items->isEmpty())
      <p class="text-center">Your cart is empty.</p>
    @else
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td>
                <a href="/products/{{ $item->id_alat }}">{{ $item->name }}</a>
              </td>
              <td>{{ $item->jumlah }}</td>
              <td>Rp. {{ number_format($item->total_harga, 2) }}</td>
              <td>
                <form action="{{ route('payment.store') }}" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="id_cart" value="{{ $item->id }}">
                  <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                  <input type="hidden" name="id_alat" value="{{ $item->id_alat }}">
                  <input type="hidden" name="jumlah" value="{{ $item->jumlah }}">
                  <input type="hidden" name="total_harga" value="{{ $item->total_harga }}">
                  <button type="submit" class="btn btn-primary btn-sm">Checkout</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="text-end mt-3">
        <a href="/" class="btn btn-outline-primary">Continue Shopping</a>
      </div>
    @endif
  </div>

</body>
</html>
