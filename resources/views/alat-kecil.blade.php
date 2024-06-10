<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alat Kecil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Alat Kecil</h1>

        <!-- Display a message if no products are found -->
        @if($products->isEmpty())
            <p>No products found.</p>
        @else
            <!-- Display the products -->
            <table class="table table-bordered">
            <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Name</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        
                        <tr>
                            <td><img src="{{ $product->url_foto }}" alt="{{ $product->name }}"  width="200" height="150"></td>
                            <td><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                            <td>{{ $product->harga }}</td>
                        </tr>
                        
                        
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
