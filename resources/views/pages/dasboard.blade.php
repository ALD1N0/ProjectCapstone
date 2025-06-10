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

    <!-- Filter Form -->
    <div class="filter-controls" style="margin-top: 20px; text-align: center;">
        <form action="{{ route('dashboard') }}" method="GET"> 
            <input type="hidden" name="query" value="{{ request('query') }}"> 

            <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                <div class="filter-group">
                    <label for="harga_range">Rentang Harga:</label>
                    <select name="harga_range" id="harga_range" class="filter-input">
                        <option value="">Semua Harga</option>
                        <option value="0-100000" {{ request('harga_range') == '0-100000' ? 'selected' : '' }}>Rp 0 - Rp 100.000</option>
                        <option value="100001-500000" {{ request('harga_range') == '100001-500000' ? 'selected' : '' }}>Rp 100.001 - Rp 500.000</option>
                        <option value="500001-1000000" {{ request('harga_range') == '500001-1000000' ? 'selected' : '' }}>Rp 500.001 - Rp 1.000.000</option>
                        <option value="1000001-2000000" {{ request('harga_range') == '1000001-2000000' ? 'selected' : '' }}>Rp 1.000.001 - Rp 2.000.000</option>
                        <option value="2000001-5000000" {{ request('harga_range') == '2000001-5000000' ? 'selected' : '' }}>Rp 2.000.001 - Rp 5.000.000</option>
                        <option value="5000001-0" {{ request('harga_range') == '5000001-0' ? 'selected' : '' }}>Rp 5.000.001+</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="lokasi">Lokasi:</label>
                    <input type="text" name="lokasi" id="lokasi" placeholder="Lokasi (contoh: Solo)" class="filter-input" value="{{ request('lokasi') }}">
                </div>

                <button type="submit" class="filter-button">Terapkan Filter</button>
                <a href="{{ route('dashboard') }}" class="reset-button">Reset Filter</a>
            </div>
        </form>
    </div>
</div>

<div class="products-container">
    @if($products->count() > 0)
        @foreach($products as $product)
        <a href="{{ route('detail.show', $product->id) }}" class="product-card-link">
            <div class="product-card">
                <div class="product-image">
                   <img src="{{ asset($product->image_url ?? 'assets/foto/images.png') }}" alt="{{ $product->nama_product }}">
                </div>
                <div class="product-details">
                    <div class="product-name">{{ $product->nama_product }}</div>
                    <div class="product-price">Rp. {{ number_format($product->harga, 0, ',', '.') }}</div>
                    <div class="product-location">{{ $product->user->alamat }}</div>
                </div>
            </div>
        </a>
        @endforeach
    @else
        <div class="empty-state">
            <h3 class="empty-title">Produk tidak ditemukan</h3>
            <p class="empty-message">Maaf, kami tidak menemukan produk sesuai kriteria Anda.</p>
            <a href="{{ route('dashboard') }}" class="empty-button">Lihat Semua Produk</a>
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

    /* Filter Styles */
    .filter-controls {
        background-color: #f8f8f8;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }

    .filter-group {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px; /* Only for small screens, will be overridden by flex gap */
    }

    .filter-group label {
        font-weight: bold;
        color: #555;
        min-width: 70px; /* Adjust as needed */
        text-align: right;
    }

    .filter-input {
        flex-grow: 1;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    .filter-button, .reset-button {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.3s ease;
        margin-top: 10px; /* Space between filter inputs and buttons on smaller screens */
    }

    .filter-button {
        background-color: #28a745;
        color: white;
    }

    .filter-button:hover {
        background-color: #218838;
        transform: translateY(-1px);
    }

    .reset-button {
        background-color: #6c757d;
        color: white;
        text-decoration: none; 
        display: inline-block; 
        text-align: center; 
    }

    .reset-button:hover {
        background-color: #5a6268;
        transform: translateY(-1px);
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 768px) {
        .search-input {
            width: 80%;
        }
        .filter-group {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }
        .filter-group label {
            text-align: left;
            margin-bottom: 5px;
        }
        .filter-input {
            width: 100%;
        }
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
        background: white; /* Bagian atas card (gambar) putih */
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
        background-color: #333; /* Latar belakang gelap untuk detail produk */
        color: #fff; /* Teks putih untuk kontras umum */
    }

    .product-name {
        font-size: 14px;
        margin: 0 0 8px 0;
        color: #fff; /* Warna teks nama produk putih */
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
        color: #e74c3c; /* Warna teks harga merah/oranye */
        font-size: 16px;
        margin-bottom: 6px;
    }

    .product-location {
        font-size: 12px;
        color: #ccc; /* Warna teks lokasi putih/abu-abu terang */
    }
</style>
@endsection
