@extends('mainlayoutb')

@section('maincontent')
<style>
    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        background-color: #f4f4f9;
    }

    .edit-profile-container {
        width: 100%;
        max-width: 500px;
        background: #ffffff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .edit-profile-container h2 {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    .edit-profile-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 5px;
        color: #444;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        padding: 10px 12px;
        font-size: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.3s;
        background: #f9f9f9;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #4a90e2;
        background: #ffffff;
    }

    .form-group .error {
        font-size: 14px;
        color: #e74c3c;
        margin-top: 5px;
    }

    .form-group img.current-photo {
        margin-top: 10px;
        border-radius: 8px;
        max-width: 150px;
        border: 2px solid #ddd;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .edit-profile-container button {
        padding: 12px;
        font-size: 16px;
        background: #4a90e2;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .edit-profile-container button:hover {
        background: #357abd;
    }
</style>

<div class="main-content" >
    <div class="edit-profile-container">
        <h2>Edit Profil</h2>
        <form class="edit-profile-form" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" placeholder="Masukkan username">
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" placeholder="Masukkan alamat">
                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon) }}" placeholder="Masukkan no telepon">
                @error('telepon')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto Profil</label>
                <input type="file" id="foto" name="foto">
                @error('foto')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            @if($user->foto)
                <div class="form-group">
                    <label>Foto Saat Ini</label>
                    <img src="{{ asset($user->foto) }}" alt="Foto Profil" class="current-photo">
                </div>
            @endif

            <button type="submit">💾 Simpan</button>
            <a href="{{ route('pengaturan') }}">⬅ Kembali</a>
        </form>
    </div>
</div>
@endsection
