@extends('mainlayout')

@section('maincontent')
<div style="padding: 20px;">
    <div class="products">
        @forelse ($products as $product)
        <div class="product-card">
            <img src="{{ asset($product->image_url) }}" alt="{{ $product->nama_product }}">
            <div class="name">{{ $product->nama_product }}</div>
            <div class="price">Rp.{{ number_format($product->harga, 0, ',', '.') }}</div>
            <div class="location">{{ $product->user->alamat ?? '-' }}</div>
        </div>
        @empty
            <p>Belum ada produk yang disimpan.</p>
        @endforelse
    </div>
</div>
@endsection
