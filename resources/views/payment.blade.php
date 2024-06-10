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
        <h1>Payment</h1>

        <!-- Display a message if no products are found -->
        @if($items->isEmpty())
            <p>No Item found.</p>
        @else
            <!-- Display the products -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>payment</th>
                        <th>id_cart</th>
                        <th>status</th>
                        <th>Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->id_cart }}</td>
                            <td>{{ $item->status_pembayaran }}</td>
                            <td>
                            <form action="/payment/{{ $item->id }}" method="GET">
                                <button type="submit">View Payment</button>
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