<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Product</h1>

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

        <!-- Product form -->
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
         
            <div class="mb-3">
                <label for="type" class="form-label">Product Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="" disabled selected>Select product type</option>
                    <option value="Alat Besar">Alat Besar</option>
                    <option value="Alat Sedang">Alat Sedang</option>
                    <option value="Alat Kecil">Alat Kecil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="toko" class="form-label">Product toko</label>
                <input type="number" class="form-control" id="toko" name="toko" value="{{ old('toko') }}" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Product harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" required>
            </div>
            <div class="mb-3">
                <label for="kode_alat" class="form-label">Product kode_alat</label>
                <input type="text" class="form-control" id="kode_alat" name="kode_alat" value="{{ old('kode_alat') }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Product Description</label>
                <textarea class="form-control wider-field" id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status_verifikasi" class="form-label">Product Status Verifikasi</label>
                <select class="form-control" id="status_verifikasi" name="status_verifikasi" required>
                    <option value="" disabled selected>Select verification status</option>
                    <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                    <option value="Sudah Terverifikasi">Sudah Terverifikasi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="verifikator" class="form-label">Product verifikator</label>
                <input type="text" class="form-control" id="verifikator" name="verifikator" value="{{ old('verifikator') }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_verifikasi" class="form-label">Product Tanggal Verifikasi</label>
                <input type="date" class="form-control" id="tanggal_verifikasi" name="tanggal_verifikasi" value="{{ old('tanggal_verifikasi') }}" required>
            </div>
            <div class="mb-3">
                <label for="url_foto" class="form-label">Product url_foto</label>
                <input type="text" class="form-control" id="url_foto" name="url_foto" value="{{ old('url_foto') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
