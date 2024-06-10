<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function index()
    {
        $items = Cart::where('id_user', Auth::id())->get();

        $items = DB::table('carts')
            ->join('products', 'carts.id_alat', '=', 'products.id')
            ->select('carts.id', 'id_alat', 'jumlah', 'total_harga', 'name', 'id_user')
            ->where('id_user', Auth::id())
            ->get();

        // Return the view with the products data

        return view('cart', compact('items'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_user' => 'required|integer',
            'id_alat' => 'required|integer',
            'jumlah' => 'required|integer',
           
        ]);

        // dd($request);

        $harga = $request->harga;
        $jumlah = $request->jumlah;
        $total_harga = $jumlah * $harga;

        $data = [
            "harga" => $harga,
            "jumlah" => $jumlah,
            "total harga" => $total_harga,
           
        ];
        // dd($data);
          

        Cart::create([
            'id_user' => $request->id_user,
            'id_alat' => $request->id_alat,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('cart')->with('success', 'success menambahkan ke cart.');
    }
}
