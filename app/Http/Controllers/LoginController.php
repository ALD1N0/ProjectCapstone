<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    /**
     * Display the login and register form.
     */
    public function index()
    {
        return view("login");
    }

    /**
     * Show the user registration form.
     */
    public function showRegisterForm()
    {
        return view('register'); // Pastikan kamu memiliki file view register.blade.php
    }

    /**
     * Store a newly created user (handle registration).
     */
    public function store(Request $request)
    {
        // Validasi input dari form registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
            'alamat' => 'nullable|string|max:500',
            'telepon' => 'nullable|numeric|digits_between:8,15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file foto
        ]);

        $fotoPath = null;
        // Jika ada file foto yang diupload, simpan ke storage
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/foto_user');
        }

        // Buat user baru di database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            // Simpan path foto. Gunakan str_replace untuk mengubah 'public/' menjadi 'storage/'
            // agar bisa diakses via URL /storage/
            'foto' => $fotoPath ? str_replace('public/', 'storage/', $fotoPath) : null,
            'password' => Hash::make($request->password), // Enkripsi password sebelum menyimpan
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Handle user login attempt.
     */
    public function login(Request $request)
    {
        // Validasi input email dan password dari form login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Coba autentikasi pengguna dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            // Regenerate session untuk mencegah session fixation attacks
            $request->session()->regenerate();

            // Dapatkan objek user yang sedang login
            $user = Auth::user();

            // Periksa peran user dan arahkan ke dashboard yang sesuai
            if ($user->role === 'admin') {
                // Jika user adalah admin, arahkan ke route 'barang'
                return redirect()->route('user')->with('success', 'Selamat datang, Admin!');
            } else {
                // Jika user bukan admin, arahkan ke route 'dashboard'
                return redirect()->route('dashboard')->with('success', 'Selamat datang kembali!');
            }
        }

        // Jika autentikasi gagal, kembali ke form login dengan pesan error
        // Pesan error ini akan tersedia di view melalui variabel $errors
        return back()->withErrors([
            'email' => 'Email atau password salah.', // Pesan error untuk input email
        ])->onlyInput('email'); // Hanya menyimpan input email yang sebelumnya
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        // Lakukan logout pengguna
        Auth::logout();

        // Invalidate (hapus) sesi pengguna saat ini
        $request->session()->invalidate();

        // Regenerate token CSRF untuk sesi baru
        $request->session()->regenerateToken();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
