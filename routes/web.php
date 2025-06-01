<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HasilCariController;
use App\Http\Controllers\JualProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TersimpanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ServerManageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes untuk halaman yang tidak perlu login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'store'])->name('loginstore');
Route::post('/login', [LoginController::class, 'login'])->name('masuk');

// Group route yang membutuhkan autentikasi (login)
Route::middleware(['auth'])->group(function () {
    // Dashboard dan halaman utama
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Produk dan pencarian
    Route::get('/produk', [ProductController::class, 'index'])->name('produk');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    Route::post('/products/{product}/save', [ProductController::class, 'saveProduct'])->name('products.save'); // method sudah di ProductController: saveProduct

    // Halaman produk tersimpan (wishlist)
    Route::get('/tersimpan', [ProductController::class, 'savedProducts'])->name('tersimpan');

    // Detail produk
    Route::get('/detail/{id}', [DetailController::class, 'show'])->name('detail.show');
    Route::get('/detail', [DetailController::class, 'index'])->name('detail');

    // Profil dan pengaturan pengguna
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::get('/user/{user}/edit', [PengaturanController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [PengaturanController::class, 'update'])->name('user.update');

    // Halaman bantuan dan edit
    Route::get('/bantuan', [BantuanController::class, 'index'])->name('bantuan');
    Route::get('/edit', [EditController::class, 'index'])->name('edit');

    // CRUD JualProductController
    Route::get('/jual', [JualProductController::class, 'index'])->name('jual.index');
    Route::get('/jual/create', [JualProductController::class, 'create'])->name('jual.create');
    Route::post('/jual', [JualProductController::class, 'store'])->name('jual.store');
    Route::get('/jual/{product}', [JualProductController::class, 'show'])->name('jual.show');
    Route::get('/jual/{product}/edit', [JualProductController::class, 'edit'])->name('jual.edit');
    Route::put('/jual/{product}', [JualProductController::class, 'update'])->name('jual.update');
    Route::delete('/jual/{product}', [JualProductController::class, 'destroy'])->name('jual.destroy');

    // Server management dan user management
    Route::get('/servermanage', [ServerManageController::class, 'index'])->name('servermanage');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');

    // Barang management
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/detailbarang/{product}', [BarangController::class, 'show'])->name('detailbarang');
    Route::delete('/barang/{product}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/admin/search', [BarangController::class, 'search'])->name('barang.search');

    // Toko user
    Route::get('/toko/{id}', [UserController::class, 'show'])->name('toko');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
