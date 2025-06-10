<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan ini di-import untuk bisa mengambil data produk
use App\Models\User; // Pastikan ini di-import jika User model digunakan secara langsung, terutama untuk relasi alamat

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource (dashboard) with optional filters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 1. Ambil parameter filter dari request
        $hargaRange = $request->input('harga_range'); // Mengambil nilai dari dropdown harga
        $lokasi = $request->input('lokasi');
        $queryPencarian = $request->input('query'); // Mengambil query pencarian dari form filter

        // 2. Mulai membangun query Product
        // Eager load relasi 'user' karena kita akan mengakses $product->user->alamat di Blade
        $products = Product::with('user');

        // 3. Terapkan filter harga dari dropdown jika ada nilai yang dipilih
        if ($hargaRange) {
            // Memecah string rentang harga menjadi min dan max
            list($minHarga, $maxHarga) = explode('-', $hargaRange);

            // Terapkan filter harga minimum
            if ($minHarga !== null && $minHarga !== '') { // Pastikan minHarga bukan null atau string kosong
                $products->where('harga', '>=', (int)$minHarga); // Cast ke integer
            }
            // Terapkan filter harga maksimum, kecuali jika nilai max adalah '0' (yang berarti tak terbatas)
            if ($maxHarga !== null && $maxHarga !== '' && $maxHarga != '0') {
                $products->where('harga', '<=', (int)$maxHarga); // Cast ke integer
            }
        }

        // 4. Terapkan filter lokasi jika ada nilai yang diberikan
        // Menggunakan whereHas untuk memfilter berdasarkan kolom 'alamat' di tabel 'users'
        // melalui relasi 'user' pada model Product
        if ($lokasi) {
            $products->whereHas('user', function ($q) use ($lokasi) {
                $q->where('alamat', 'like', '%' . $lokasi . '%');
            });
        }

        // 5. Terapkan filter pencarian jika ada nilai yang diberikan
        // Ini akan memfilter berdasarkan nama_product ATAU deskripsi
        if ($queryPencarian) {
            $products->where(function ($q) use ($queryPencarian) {
                $q->where('nama_product', 'like', "%$queryPencarian%")
                  ->orWhere('deskripsi', 'like', "%$queryPencarian%");
            });
        }

        // 6. Dapatkan hasil produk setelah semua filter diterapkan
        $products = $products->get();

        // 7. Mengirim variabel $products ke view 'pages.dasboard'
        return view("pages.dasboard", compact('products'));
    }

    // Metode-metode lain (create, store, show, edit, update, destroy) tetap sama
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
