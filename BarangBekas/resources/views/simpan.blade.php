<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sen's Market</title>
  <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
</head>
<body>
  <aside class="sidebar">
    <h1>Sen's Market</h1>
    <nav>
      <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
      <a href="{{route("profil")}}">👤 Profil</a>
      <a href="{{route("produk")}}" >💼 Produk</a>
      <a href="{{route("tersimpan")}}" class="active">🔖 Tersimpan</a>
      <a href="{{route("jualproduk")}}">✏️ Jual Produk</a>
    <a href="{{route("pengaturan")}}">⚙️ Pengaturan</a>
    <a href="{{route("bantuan")}}">🎤 Bantuan</a>
    </nav>
  </aside>

  <main class="main-content">
    <div class="topbar sticky-top">
      <div class="search">
        <button>☰</button>
        <input type="text" placeholder="Cari Barang Anda">
      </div>
      <div class="icons">
        <div>📍 Boyolali</div>
        <div>✉️</div>
        <div>🔔</div>
        <div>👤 ▼</div>
      </div>
    </div>

    <div style="padding: 20px;">
    </div>
    <div class="products">
      <div class="product-card">
        <img src="{{asset("assets/foto/helm.jpeg")}}" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="trees.png" alt="">
        <div class="name">Little Trees</div>
        <div class="price">Rp.700</div>
        <div class="location">Gentan</div>
      </div>
      <div class="product-card">
        <img src="adibas.jpg" alt="">
        <div class="name">Sepatu Adibas</div>
        <div class="price">Rp.700</div>
        <div class="location">Kertonatan</div>
      </div>
      <div class="product-card">
        <img src="tiger.jpg" alt="">
        <div class="name">Spakbor Tiger Herek</div>
        <div class="price">Rp.500</div>
        <div class="location">Randusari</div>
      </div>
      <div class="product-card">
        <img src="fiber.jpg" alt="">
        <div class="name">Microfiber</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      
      <!-- Tambah produk lain -->
    </div>
  </main>
</body>
</html>
