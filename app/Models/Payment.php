<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cart',
        'status_pembayaran',
        'url_pembayaran',
        'id_user',
        'id_alat',
        'jumlah',
        'total_harga',
    ];
}
