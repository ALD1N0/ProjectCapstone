@extends('mainlayoutb')

@section('maincontent')
<div class="main-content">
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
        </form>
    </div>
</div>
@endsection
