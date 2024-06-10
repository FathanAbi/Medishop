<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AlatKecilController extends Controller
{
    public function index()
    {
        $products = Product::where('type', 'Alat Kecil')->get();

        // Return the view with the products data
        return view('alat-kecil', compact('products'));
    }
}
