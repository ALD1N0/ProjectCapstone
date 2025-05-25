@extends('mainlayout')

@section('maincontent')
<div style="padding-top: 80px;">
    <!-- Search Form -->
    <div class="search-container" style="margin-top: 30px;">
        <form action="{{ route('product.search') }}" method="GET">
            <input type="text" name="query" placeholder="Cari Barang" class="search-input" value="{{ request('query') }}">
            <button type="submit" class="search-button">Cari</button>
        </form>
    </div>
</div>

<div class="products-container">
    @if($products->count() > 0)
        @foreach($products as $product)
        <a href="{{ route('detail.show', $product->id) }}" class="product-card-link">
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->nama_product }}">
                </div>
                <div class="product-details">
                    <h3 class="product-name">{{ $product->nama_product }}</h3>
                    <div class="product-price">Rp. {{ number_format($product->harga, 0, ',', '.') }}</div>
                    <div class="product-location">{{ $product->user->alamat }}</div>
                </div>
            </div>
        </a>
        @endforeach
    @else
        <div class="empty-state">
            <h3 class="empty-title">Produk tidak ditemukan</h3>
            <p class="empty-message">Maaf, kami tidak menemukan produk dengan kata kunci "{{ request('query') }}"</p>
            <a href="{{ route('product.search') }}" class="empty-button">Lihat Semua Produk</a>
        </div>
    @endif
</div>

<style>
    /* Search Styles */
    .search-container {
        margin-bottom: 20px;
        text-align: center;
    }
    
    .search-input {
        width: 60%;
        padding: 12px 20px;
        border: 2px solid #3498db;
        border-radius: 10px;
        font-size: 16px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #2980b9;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    
    .search-button {
        padding: 12px 25px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 16px;
        margin-left: 10px;
        transition: all 0.3s ease;
    }
    
    .search-button:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
    }

    /* Product Styles */
    .products-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
        padding: 20px 16px;
        min-height: 50vh;
    }

    /* Empty State Styles */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 40px 20px;
    }
    
    .empty-image {
        width: 200px;
        height: auto;
        margin-bottom: 20px;
        opacity: 0.7;
    }
    
    .empty-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }
    
    .empty-message {
        color: #666;
        margin-bottom: 20px;
    }
    
    .empty-button {
        display: inline-block;
        padding: 12px 24px;
        background-color: #3498db;
        color: white;
        border-radius: 25px;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .empty-button:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    /* Product Card Styles */
    .product-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .product-card {
        border-radius: 8px;
        overflow: hidden;
        background: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        cursor: pointer;
    }

    .product-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #f0f0f0;
    }

    .product-details {
        padding: 12px;
    }

    .product-name {
        font-size: 14px;
        margin: 0 0 8px 0;
        color: #333;
        font-weight: normal;
        line-height: 1.4;
        height: 40px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-price {
        font-weight: bold;
        color: #e74c3c;
        font-size: 16px;
        margin-bottom: 6px;
    }

    .product-location {
        font-size: 12px;
        color: #666;
    }
</style>
@endsection