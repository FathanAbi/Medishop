<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class AlatSedangController extends Controller
{
    public function index()
    {
        $products = Product::where('type', 'Alat Sedang')->get();

        // Return the view with the products data
        return view('alat-sedang', compact('products'));
    }
}
