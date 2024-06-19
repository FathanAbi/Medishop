<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;

class ShopController extends Controller
{
    public function create()
    {
        return view('create-shops');
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

      
        Shop::create([
            'name' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('shops.create')->with('success', 'shops created successfully.');
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id); // Fetches product or throws an exception if not found

        $products = Product::where('toko', $id)->get();

     
        return view('shop', compact('shop', 'products')); // Passes product data to the view
    }
}
