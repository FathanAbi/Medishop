<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;


class PaymentController extends Controller
{
    public function index()
    {
       

        $items = DB::table('payments')
            ->where('id_user', Auth::id())
            ->join('products', 'payments.id_alat', '=', 'products.id')
            ->select('payments.id', 'payments.id_alat', 'products.name', "products.url_foto", 'payments.status_pembayaran', 'payments.jumlah', 'payments.total_harga')
            ->orderBy('status_pembayaran', 'DESC')
            ->get();

        // Return the view with the products data
        // dd($items);
        return view('payment', compact('items'));
    }

    public function show($id)
    {
      
        $item = DB::table('payments')
        ->join('products', 'payments.id_alat', '=', 'products.id')
        ->where('payments.id', $id)
        ->select('payments.id', 'payments.id_alat', 'products.name', "products.url_foto", 'payments.status_pembayaran', 'payments.jumlah', 'payments.total_harga')
        ->first(); // Fetches product or throws an exception if not found
   
        return view('payment-detail', compact('item')); // Passes product data to the view
    }

    public function update($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status_pembayaran' => 'Sudah bayar']);
        // dd($payment);
        return redirect()->back()->with('success', 'Payment marked as paid successfully!');
    }

    
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_cart' => 'required|integer',
        ]);

    

        
        // dd($request);
        
          

        Payment::create([
            'id_cart' => $request->id_cart,
            'status_pembayaran' => 'Belum Bayar',
            'url_pembayaran' => 'www.google.com',
            'id_user' => $request->id_user,
            'id_alat' => $request->id_alat,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga, 
            
        ]);

        $cart = Cart::find($request->id_cart);
        $cart->delete();

        return redirect()->route('payment')->with('success', 'success menambahkan ke cart.');
    }
}
