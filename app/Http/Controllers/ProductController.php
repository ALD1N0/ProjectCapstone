<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Tampilkan semua produk (halaman utama / hasil pencarian default)
    public function index()
    {
        $products = Product::with('user')->get();
        return view('pages.hasilcari', compact('products'));
    }

    // Tampilkan detail produk
    public function show(Product $product)
    {
        return view('pages.detail', compact('product'));
    }

    // Simpan produk ke wishlist (produk tersimpan)
    public function saveProduct(Product $product)
    {
        $user = auth()->user();
        $user->savedProducts()->syncWithoutDetaching([$product->id]);
        return redirect()->back()->with('success', 'Produk berhasil disimpan!');
    }

    // Tampilkan daftar produk yang disimpan user (wishlist)
    public function savedProducts()
    {
        $user = auth()->user();
        $products = $user->savedProducts()->with('user')->get();
        return view('pages.simpan', compact('products'));
    }

    // Fungsi pencarian produk
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('nama_product', 'like', "%$query%")
                    ->orWhere('deskripsi', 'like', "%$query%")
                    ->with('user')
                    ->get();

        return view('pages.hasilcari', compact('products'));
    }

    // Fungsi lain (create, store, edit, update, destroy) kosong karena belum digunakan
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
