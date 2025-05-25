@extends('mainlayout')

@section('maincontent')

<style>
    .detail-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
    }

    .left, .right {
        flex: 1;
        min-width: 300px;
    }

    .image-preview img {
        width: 100%;
        border-radius: 10px;
        object-fit: cover;
    }

    .action-buttons {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .btn-standard {
        display: inline-block;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-standard:hover {
        background-color: #0056b3;
    }

    .whatsapp-link {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #007bff;
        color: white;
        font-weight: bold;
        padding: 10px;
        border-radius: 10px;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .whatsapp-link:hover {
        background-color: #1ebe5d;
    }

    .whatsapp-link img {
        width: 24px;
        height: 24px;
        margin-right: 10px;
    }
</style>

<div class="detail-container">
    <div class="left">
        <div class="image-preview">
            <img src="{{ asset($product->image_url) }}" alt="{{ $product->nama_product }}">
        </div>
        <div class="action-buttons">
            <button class="btn-standard">Simpan</button>

            @if($product->user && $product->user->telepon)
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $product->user->telepon) }}" target="_blank" class="whatsapp-link">
                    <img src="{{ asset('foto/wa.png') }}" alt="WhatsApp"> WhatsApp
                </a>
            @else
                <div class="btn-standard" style="background-color: grey; cursor: not-allowed;">
                    Nomor tidak tersedia
                </div>
            @endif

            <button class="btn-standard" onclick="history.back()">Kembali</button>
        </div>
    </div>

    <div class="right">
        <h2>Jual {{ $product->nama_product }}</h2>
        <h3 style="color: red;">Rp. {{ number_format($product->harga, 0, ',', '.') }}</h3>
        <h4>Deskripsi Produk</h4>
        <p>{{ $product->deskripsi }}</p>
        <h4>Alamat Penjual</h4>
        <p>{{ $product->user->alamat ?? 'Tidak diketahui' }}</p>
        <h4>Penjual</h4>
        <p>{{ $product->user->name ?? '-' }} </p>
    </div>
</div>

@endsection