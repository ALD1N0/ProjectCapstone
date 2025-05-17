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
use Illuminate\Support\Facades\Route;

// Route untuk halaman yang tidak membutuhkan login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'store'])->name('loginstore');
Route::post('/login', [LoginController::class, 'login'])->name('masuk');

// Middleware untuk halaman yang membutuhkan login
Route::middleware(['auth'])->group(function () {
    // Dashboard dan halaman utama
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/hasilcari', [HasilCariController::class, 'index']);
    Route::get('/profil', [ProfilController::class, 'index'])->name("profil");
    Route::get('/produk', [ProductController::class, 'index'])->name("produk");
    Route::get('/tersimpan', [TersimpanController::class, 'index'])->name("tersimpan");
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name("pengaturan");
    Route::get('/bantuan', [BantuanController::class, 'index'])->name("bantuan");
    Route::get('/detail', [DetailController::class, 'index'])->name("detail");
    Route::get('/edit', [EditController::class, 'index'])->name("edit");

    // Edit dan update profil pengguna
    Route::get('/user/{user}/edit', [PengaturanController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [PengaturanController::class, 'update'])->name('user.update');

    // CRUD untuk JualProductController secara manual
    Route::get('/jual', [JualProductController::class, 'index'])->name('jual.index');
    Route::get('/jual/create', [JualProductController::class, 'create'])->name('jual.create');
    Route::post('/jual', [JualProductController::class, 'store'])->name('jual.store');
    Route::get('/jual/{product}', [JualProductController::class, 'show'])->name('jual.show');
    Route::get('/jual/{product}/edit', [JualProductController::class, 'edit'])->name('jual.edit');
    Route::put('/jual/{product}', [JualProductController::class, 'update'])->name('jual.update');
    Route::delete('/jual/{product}', [JualProductController::class, 'destroy'])->name('jual.destroy');


    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
