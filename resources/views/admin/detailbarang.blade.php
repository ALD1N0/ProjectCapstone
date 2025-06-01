@extends('mainlayouta')

@section('maincontent')

<div class="detail-container">
    <div class="left">
        <div class="image-preview">
            {{-- Check if image_url exists before displaying --}}
            @if($product->image_url)
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->nama_product }}">
            @else
                <img src="{{ asset('path/to/default/image.jpg') }}" alt="No Image Available"> {{-- Provide a default image --}}
            @endif
        </div>
        <div class="action-buttons">
            {{-- Delete Button Form --}}
            <form action="{{ route('barang.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus Barang</button>
            </form>
            <button class="back-button" onclick="history.back()">Kembali</button>
        </div>
    </div>

    <div class="right">
        <h2>{{ $product->nama_product }}</h2>
        <h3 style="color: red;">Rp. {{ number_format($product->harga, 0, ',', '.') }}</h3>
        <h4>Deskripsi Produk</h4>
        <p>{{ $product->deskripsi }}</p>
        <h4>Kondisi</h4>
        <p>{{ ucfirst($product->kondisi) }}</p>
        <h4>Stok</h4>
        <p>{{ $product->stok }}</p>
        <h4>Alamat Toko</h4>
        <p>{{ $product->user->alamat ?? 'N/A' }}</p>
        <h4>Penjual</h4>
        <p>{{ $product->user->name ?? 'Unknown Seller' }} ⭐⭐⭐⭐ (4.0)</p>
    </div>
</div>

@endsection