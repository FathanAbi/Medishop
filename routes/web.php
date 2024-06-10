<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alat-kecil', [App\Http\Controllers\AlatKecilController::class, 'index'])->name('alat-kecil');
Route::get('/alat-besar', [App\Http\Controllers\AlatBesarController::class, 'index'])->name('alat-besar');


// routes/web.php




Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show'); // Optional route name
Route::get('/verification/{id}', [App\Http\Controllers\ProductController::class, 'showVerification'])->name('product.showVerification'); // Optional route name
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::post('/payment', [App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment');
Route::get('/payment/{id}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/{id}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payment.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
