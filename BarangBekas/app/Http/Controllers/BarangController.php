<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    // Make sure this import is correct
use App\Models\Product; // Make sure this import is correct

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all products, eager load the user (seller) relationship
        $products = Product::with('user')->get();
        // dd($products); // Uncomment for debugging if needed
        return view('admin.barang', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // This method is for displaying a form to create a new product.
        // You would typically return a view with the form here.
        // return view('admin.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // This method handles saving a new product to the database.
        // You would typically validate the request and then create a new Product instance.
        /*
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|string',
            'image_url' => 'nullable|string', // Or 'image|mimes:jpeg,png,jpg,gif|max:2048' if uploading files
            // 'user_id' => 'required|exists:users,id', // If you're associating with a logged-in user, get it from auth()
        ]);

        Product::create([
            'user_id' => auth()->id(), // Assuming the product is created by the logged-in user
            'nama_product' => $request->nama_product,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'image_url' => $request->image_url, // Or handle file upload here
        ]);

        return redirect()->route('admin.barang')->with('success', 'Produk berhasil ditambahkan!');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // This method is for displaying a single product's details.
        // Laravel's route model binding (Product $product) automatically fetches the product by ID.
        // We just need to eager load the user relationship if it's not already loaded.
        $product->load('user'); // Ensure user relationship is loaded for the detail view

        return view('admin.detailbarang', compact('product')); // Assuming 'product_detail' is your detail blade file
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // This method is for displaying a form to edit an existing product.
        // return view('admin.barang.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // This method handles updating an existing product in the database.
        /*
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|string',
            'image_url' => 'nullable|string',
        ]);

        $product->update([
            'nama_product' => $request->nama_product,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'image_url' => $request->image_url,
        ]);

        return redirect()->route('admin.barang')->with('success', 'Produk berhasil diperbarui!');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Implement authorization check here (e.g., only the owner or admin can delete)
        // if (auth()->id() !== $product->user_id && !auth()->user()->isAdmin()) {
        //     abort(403, 'Unauthorized action.');
        // }

        // To permanently delete the record from the database:
        $product->forceDelete(); // Change from $product->delete() to $product->forceDelete()

        // Optionally, if you also want to delete the associated image file from storage:
        // You would need to make sure the 'image_url' points to a file in storage/app/public
        // if ($product->image_url) {
        //     // Assumes image_url is stored relative to public/storage/ (after symlink)
        //     // or relative to storage/app/public/ if you use Storage::disk('public')->delete()
        //     Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('storage/', '', $product->image_url));
        // }


        return redirect()->route('barang')->with('success', 'Produk berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Eager load the 'user' relationship here as well, so seller info is available
        $products = Product::with('user')
                            ->where('nama_product', 'like', "%$query%")
                            ->orWhere('deskripsi', 'like', "%$query%")
                            ->get();

        return view('admin.barang', compact('products'));
    }
}