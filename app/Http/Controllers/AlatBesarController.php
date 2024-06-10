<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AlatBesarController extends Controller
{
    public function index()
    {
        
        $products = Product::where('type', 'Alat Besar')->get();

        // Return the view with the products data
        return view('alat-besar', compact('products'));
    }
}
