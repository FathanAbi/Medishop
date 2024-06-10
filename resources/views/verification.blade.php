<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>

    <div class="product-details">
        <p>kode produk: {{ $product->kode_alat }}</p>
        <p>status: {{ $product->status_verifikasi }}</p>
        <p>Verifikator:  {{ $product->verifikator }}</p>
        <p>tanggal_verifikasi:  {{ $product->tanggal_verifikasi }}</p>
        </div>
</body>
</html>