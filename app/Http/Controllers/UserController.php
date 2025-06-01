<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // tambahkan ini di bagian atas file
use App\Models\Product; // tambahkan ini di bagian atas file

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
    $users = User::all(); // Ambil semua data user dari tabel 'users'
    return view("admin.user", compact('users')); // Kirim data ke view
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $user = User::findOrFail($id); // cari user berdasarkan ID
    $products = Product::where('user_id', $id)->get(); // ambil produk dari user ini

    return view('admin.toko', compact('user', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $user = User::findOrFail($id);

    // Hapus semua produk milik user tersebut
    $user->products()->delete(); // pastikan kolom foreign key adalah 'user_id'

    // Hapus user itu sendiri
    $user->delete();

    return redirect()->route('user')->with('success', 'User dan semua produknya berhasil dihapus.');
    }

        public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query

        // Filter users based on username or name
        $users = User::where('username', 'like', '%' . $query . '%')
                     ->orWhere('name', 'like', '%' . $query . '%')
                     ->get();

        return view('admin.user', compact('users')); // Return the filtered users to the same view
                                               // If your blade is 'admin.user.blade.php', use 'admin.user'
    }

}