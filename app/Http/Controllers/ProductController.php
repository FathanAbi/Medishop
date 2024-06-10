<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'toko' => 'required|integer',
            'harga' => 'required|integer',
            'kode_alat' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:2056',
            'status_verifikasi' => 'required|string|max:255',
            'verifikator' => 'required|string|max:255',
            'tanggal_verifikasi' => 'required|date',
            'url_foto' => 'required|string|max:255',
        ]);

        Product::create([
            'name' => $request->name,
            'type' => $request->type,
            'harga' => $request->harga,
            'toko' => $request->toko,
            'kode_alat' => $request->kode_alat,
            'deskripsi' => $request->deskripsi,
            'status_verifikasi' => $request->status_verifikasi,
            'verifikator' => $request->verifikator,
            'tanggal_verifikasi' => $request->tanggal_verifikasi,
            'url_foto' => $request->url_foto,

        ]);

        return redirect()->route('products.create')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Fetches product or throws an exception if not found

        return view('product', compact('product')); // Passes product data to the view
    }

    public function showVerification($id)
    {
        $product = Product::findOrFail($id); // Fetches product or throws an exception if not found

        return view('verification', compact('product')); // Passes product data to the view
    }
}
