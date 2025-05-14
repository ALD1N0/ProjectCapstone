<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
class JualProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AuthorizesRequests;
     public function index()
    {
        //
        $products = Product::where('user_id', Auth::id())->latest()->paginate(10);
        return view('pages.jual', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('pages.jual');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $validated = $request->validate([
            'nama_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'nullable|integer|min:0',
            'kondisi' => 'required|in:baru,bekas',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product($validated);
        $product->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/foto_produk');
            $product->image_url = str_replace('public/', 'storage/', $path);
        }

        $product->save();

        return redirect()->route('jual.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
          $this->authorize('view', $product);
        return view('pages.jual', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
      
        return view('pages.editjualproduk', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
{
    // Validasi input yang diterima dari form
    $validated = $request->validate([
        'nama_product' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|integer',
        'stok' => 'nullable|integer|min:0',
        'kondisi' => 'required|in:baru,bekas',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Cek jika ada file gambar baru yang diupload
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image_url && Storage::exists(str_replace('storage/', 'public/', $product->image_url))) {
            Storage::delete(str_replace('storage/', 'public/', $product->image_url));
        }

        // Simpan gambar baru
        $path = $request->file('image')->store('public/foto_produk');
        $validated['image_url'] = str_replace('public/', 'storage/', $path); // Simpan URL gambar baru
    }

    // Update produk dengan data yang telah divalidasi
    $product->update($validated);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('jual.index')->with('success', 'Produk berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
    $product->delete();

    return redirect()->route('jual.index')->with('success', 'Produk berhasil dihapus.');
    }
}