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
// app/Http/Controllers/LoginController.php

public function showRegisterForm()
{
    return view('register'); // Buat file view register.blade.php
}

    /**
     * Store a newly created user (register).
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
            'alamat' => 'nullable|string|max:500',
            'telepon' => 'nullable|numeric|digits_between:8,15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/foto_user');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto' => $fotoPath ? str_replace('public/', 'storage/', $fotoPath) : null,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Handle user login.
     */
        public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Welcome back!');
            }

            return back()->withErrors(['loginError' => 'Email atau password salah.'])->withInput();
        }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
