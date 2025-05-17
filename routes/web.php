<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FrondEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

// Route::get('/cart', [FrondEndController::class, 'cart'])->name('fe.cart');

// Route::post('/cart', [FrondEndController::class, 'addCart'])->name('fe.add-cart');

// Route::get('/pesanan', [FrondEndController::class, 'pesanan'])->name('fe.pesanan');

// Route::get('/login', [LoginController::class, 'login'])->name('login');

// Route::get('/profil', [FrondEndController::class, 'profile'])->name('fe.profil');

// Route::get('/pesanan/invoice/{pesanan}', [FrondEndController::class, 'invoice'])->name('fe.pesanan.invoice');

// Route::post('/pesanan/invoice/', [FrondEndController::class, 'payment'])->name('fe.pesanan.payment');

// Route::match(['put', 'patch'], 'profil/{user}', [FrondEndController::class, 'updateProfil'])->name('fe.profil.update');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profile', ProfileController::class);

Route::post('/profile/reset-password', [ProfileController::class, 'reset'])->name('profile.reset');

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {

    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::resource('barang', BarangController::class);

    Route::resource('kategori', KategoriController::class);

    Route::resource('supplier', SupplierController::class);

    Route::resource('stock', StockController::class);

    Route::resource('konsumen', KonsumenController::class);

    Route::resource('pesanan', PesananController::class);

    Route::resource('pembayaran', PembayaranController::class);

    Route::post('pesanan/cart', [PesananController::class, 'addCart'])->name('admin.pesanan.cart');

    Route::get('riwayat-pesanan', [PesananController::class, 'history'])->name('admin.pesanan.history');

    Route::get('invoice/{pesanan}', [PesananController::class, 'invoice'])->name('admin.pesanan.invoice');

    Route::match(['put', 'patch'], 'pesanan/selesaikan/{pesanan}', [PesananController::class, 'finishOrder'])->name('admin.pesanan.finishOrder');


    /* LAPORAN */
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:owner'])->prefix('owner')->group(function () {

    Route::get('/home', [HomeController::class, 'ownerHome'])->name('owner.home');

    Route::get('laporan/stock', [LaporanController::class, 'laporanStock'])->name('owner.pesanan.laporan_stock');

    Route::post('laporan/stock', [LaporanController::class, 'cetakLaporanStock'])->name('owner.pesanan.cetak_laporan_stock');

    Route::get('laporan/transaksi', [LaporanController::class, 'laporanTransaksi'])->name('owner.pesanan.laporan_transaksi');

    Route::post('laporan/transaksi', [LaporanController::class, 'cetakLaporanTransaksi'])->name('owner.pesanan.cetak_laporan_transaksi');

    Route::get('laporan/jurnal-umum', [LaporanController::class, 'jurnalUmum'])->name('owner.pesanan.jurnal-umum');

    Route::post('laporan/jurnal-umum', [LaporanController::class, 'cetakjurnalUmum'])->name('owner.pesanan.cetak_jurnal_umum');

    Route::get('laporan/laba-rugi', [LaporanController::class, 'labaRugi'])->name('owner.pesanan.laba-rugi');

    Route::post('laporan/laba-rugi', [LaporanController::class, 'cetaklabaRugi'])->name('owner.pesanan.cetak_laba_rugi');

    Route::get('laporan/buku-besar', [LaporanController::class, 'bukuBesar'])->name('owner.pesanan.buku-besar');

    Route::post('laporan/buku-besar', [LaporanController::class, 'cetakBukuBesar'])->name('owner.pesanan.cetak_buku_besar');
});
