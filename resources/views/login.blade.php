<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset("css/styleku.css")}}">
    <title>Modern Login Page | Sen's Market</title>
    {{-- CATATAN: Pastikan Anda memiliki gaya CSS untuk kelas berikut di file styleku.css:
        .alert-danger (untuk kotak notifikasi error umum)
        .input-error-message (untuk pesan error di bawah input)
        Contoh minimal:
        .alert-danger { color: red; margin-bottom: 10px; }
        .input-error-message { color: red; font-size: 0.8em; }
    --}}
</head>
<body>

<div class="container" id="container">
    <div class="form-container sign-in">
        <form method="POST" action="{{ route('masuk') }}">
            @csrf
            <h1>Sign In Barang Second</h1>

            {{-- BAGIAN INI UNTUK MENAMPILKAN SEMUA NOTIFIKASI ERROR --}}
            @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- BAGIAN INI UNTUK MENAMPILKAN PESAN SUKSES DARI SESI (misal setelah registrasi) --}}
            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            {{-- Menampilkan error spesifik untuk field email --}}
            @error('email')
                <div class="input-error-message">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Password" required>
            {{-- Menampilkan error spesifik untuk field password (jika ada, meskipun di controller hanya email yang dikirim) --}}
            @error('password')
                <div class="input-error-message">{{ $message }}</div>
            @enderror
            
            <button type="submit">Sign In</button>
        </form>
    </div>
    
    <div class="toggle-panel toggle-right">
        <a href="{{route("register")}}"> <button class="hidden" id="register">Sign Up</button></a>
    </div>
    <a href="#">Forget Your Password?</a> {{-- Link ini berada di luar toggle-panel dan form, seperti kode asli Anda --}}
</div>
</body>
</html>
