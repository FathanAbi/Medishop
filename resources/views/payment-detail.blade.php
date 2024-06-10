<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="{{ $item->url_foto }}" alt="">
    <p>{{ $item->name }}</p>
    <p>jumlah: {{ $item->jumlah }}</p>
    <p>total Harga: {{ $item->total_harga }}</p>
    <p>status pembayaran: {{ $item->status_pembayaran }}</p>
    
    <form action="/payment/{{ $item->id }}" method="POST">
        @csrf
        <input type="hidden" name="payment_status" value="paid">
        <button type="submit">Mark as Paid</button>
    </form>
</body>
</html>