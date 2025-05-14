@extends('mainlayoutb')

@section('maincontent')
<style>
    .edit-profil-container {
        max-width: 600px;
        margin: 0 auto;
        background: #f9f9f9;
        padding: 20px 30px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .edit-profil-container h2 {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    .edit-profil-form {
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
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #4a90e2;
    }

    .form-group .error {
        font-size: 14px;
        color: #e74c3c;
        margin-top: 5px;
    }

    .form-group img {
        margin-top: 10px;
        border-radius: 8px;
        max-width: 150px;
        border: 2px solid #ddd;
    }

    .edit-profil-container button {
        padding: 12px;
        font-size: 16px;
        background: #4a90e2;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .edit-profil-container button:hover {
        background: #357abd;
    }

    .edit-profil-container a {
        display: inline-block;
        text-decoration: none;
        color: #4a90e2;
        margin-top: 10px;
        text-align: center;
        font-weight: 500;
        transition: color 0.3s;
    }

    .edit-profil-container a:hover {
        color: #357abd;
    }
</style>

<div class="main-content">
    <div class="edit-profil-container">
        <h2>Edit Produk</h2>
        <form class="edit-profil-form" method="POST" action="{{ route('jual.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_product">Nama Produk</label>
                <input type="text" id="nama_product" name="nama_product" value="{{ old('nama_product', $product->nama_product) }}" placeholder="Masukkan nama produk">
                @error('nama_product')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi produk">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga', $product->harga) }}" placeholder="Masukkan harga">
                @error('harga')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ old('stok', $product->stok) }}" placeholder="Masukkan jumlah stok">
                @error('stok')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kondisi">Kondisi</label>
                <select id="kondisi" name="kondisi">
                    <option value="baru" {{ old('kondisi', $product->kondisi) == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="bekas" {{ old('kondisi', $product->kondisi) == 'bekas' ? 'selected' : '' }}>Bekas</option>
                </select>
                @error('kondisi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Foto Produk</label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            @if($product->image_url)
                <div class="form-group">
                    <label>Foto Saat Ini</label><br>
                    <img src="{{ asset($product->image_url) }}" alt="Foto Produk">
                </div>
            @endif

            <button type="submit">💾 Simpan</button>
            <a href="{{ route('jual.index') }}">⬅ Kembali</a>
        </form>
    </div>
</div>
@endsection
