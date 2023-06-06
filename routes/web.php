<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\TransaksiController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

Route::get('/produk/{nama}', [DetailProdukController::class, 'index'])->name('detail');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');

Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/keranjang/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

Route::get('/keranjang/checkout/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::post('/keranjang/checkout/transaksi', [TransaksiController::class, 'create'])->name('transaksi.create');

require __DIR__ . '/auth.php';
