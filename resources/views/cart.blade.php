<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
     <!-- Display success message -->
     @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h1>Cart</h1>

        <!-- Display a message if no products are found -->
        @if($items->isEmpty())
            <p>No Item found.</p>
        @else
            <!-- Display the products -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id_cart</th>
                        <th>id_alat</th>
                        <th>nama produk</th>
                        <th>jumlah</th>
                        <th>total_harga</th>
                        <th>Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->id_alat }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->total_harga }}</td>
                            <td>
                            <form action="{{ route('payment.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_cart" value="{{ $item->id }}">
                                <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                                <input type="hidden" name="id_alat" value="{{ $item->id_alat }}">
                                <input type="hidden" name="jumlah" value="{{ $item->jumlah }}">
                                <input type="hidden" name="total_harga" value="{{ $item->total_harga }}">

                                <button type="submit">Checkout</button>
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