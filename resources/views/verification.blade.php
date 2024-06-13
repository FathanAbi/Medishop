<!DOCTYPE html>
<html>
<head>
  <title>Product Verification Info</title>
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
    <h1>{{ $product->name }} Verification Info</h1>

    <div class="card mb-3">
      <div class="card-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th scope="row">Product Code</th>
              <td>{{ $product->kode_alat }}</td>
            </tr>
            <tr>
              <th scope="row">Verification Status</th>
              @if ($product->status_verifikasi == 'Sudah Terverifikasi')
                <td><span class="badge bg-success">Verified</span></td>
              @else
                <td><span class="badge bg-warning text-dark">Not Verified</span></td>
              @endif
            </tr>
            @if ($product->verifikator != null)
              <tr>
                <th scope="row">Verifier</th>
                <td>{{ $product->verifikator }}</td>
              </tr>
              <tr>
                <th scope="row">Verification Date</th>
                <td>{{ $product->tanggal_verifikasi }}</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>

  </div>

</body>
</html>
