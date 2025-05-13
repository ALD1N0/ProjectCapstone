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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        // Create user
        User::create($validated);

        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
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
