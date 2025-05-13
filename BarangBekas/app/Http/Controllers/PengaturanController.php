<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $user = Auth::user(); // Mengambil user yang sedang login

        if (!$user) {
            abort(403, 'Anda belum login');
        }
        // dd(Auth::user());
        return view('pages.pengaturan')->with('user', $user);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Pastikan Anda mengimpor model User

public function edit(User $user)
{
    return view('pages.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'password' => 'nullable|string|min:4',
        'alamat' => 'nullable|string|max:500',
        'telepon' => 'nullable|numeric|digits_between:8,15',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Perbarui data pengguna
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->username = $validated['username'];
    $user->alamat = $validated['alamat'] ?? null;
    $user->telepon = $validated['telepon'] ?? null;

    // Perbarui password jika diisi
    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    // Perbarui foto profil jika diunggah
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($user->foto && Storage::exists(str_replace('storage/', 'public/', $user->foto))) {
            Storage::delete(str_replace('storage/', 'public/', $user->foto));
        }

        // Simpan foto baru
        $fotoPath = $request->file('foto')->store('public/foto_user');
        $user->foto = str_replace('public/', 'storage/', $fotoPath);
    }

    $user->save();

    return redirect()->route('pengaturan')->with('success', 'Profil berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}