<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
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
    <h1>Status Pembayaran</h1>

    @if($items->isEmpty())
      <p class="text-center">No orders found.</p>
    @else
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Order ID</th>
            <th scope='col'>Produk</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>
                @if ($item->status_pembayaran == 'Belum Bayar')
                  <span class="badge bg-warning text-dark">Menunggu Pembayaran</span>
                @elseif ($item->status_pembayaran == 'Sudah bayar')
                  <span class="badge bg-success">Sudah Bayar</span>
                @else
                  {{ $item->status_pembayaran }}
                @endif
              </td>
              <td>
                <form action="/payment/{{ $item->id }}" method="GET" class="d-inline">
                  <button type="submit" class="btn btn-primary btn-sm">View Details</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

</body>
</html>
