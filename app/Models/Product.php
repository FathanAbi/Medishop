<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'toko',
        'harga',
        'kode_alat',
        'deskripsi',
        'status_verifikasi',
        'verifikator',
        'tanggal_verifikasi',
        'url_foto',
    ];
}
