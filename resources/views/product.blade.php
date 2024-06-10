<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>

    <div class="product-details">
        <img src="{{ $product->url_foto }}" alt="{{ $product->name }}"  width="300" height="300">
        <p>Price: Rp.{{ number_format($product->harga, 2) }}</p>
        @php
             $paragraphs = explode("\n", $product->deskripsi); // Split text by newlines
        @endphp

        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
        </div>

    <a href="/verification/ {{ $product->id }}">Cek Verifikasi</a>

    <form action="{{ route('cart.store') }}" method="post">
        @csrf
        <label for="quantity">Quantity:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" value="1">
        <input type="hidden" name="id_alat" value="{{ $product->id }}">
        <input type="hidden" name="harga" value="{{ $product->harga }}">
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

        

        <button type="submit">Send Request</button>
    </form>
</body>
</html>