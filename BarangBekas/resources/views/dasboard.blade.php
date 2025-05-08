<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sen's Market</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <aside class="sidebar">
    <h1>Sen's Market</h1>
    <nav>
      <a href="{{ route('dashboard') }}" class="active">🏠 Dashboard</a>
      <a href="{{route("profil")}}">👤 Profil</a>
      <a href="{{route("produk")}}" >💼 Produk</a>
      <a href="{{route("tersimpan")}}">🔖 Tersimpan</a>
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
        <div class="dropdown">
          <div id="profileIcon">👤 ▼</div>
          <div class="dropdown-content" id="dropdownMenu">
            <a href="#">Login</a>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel">
      <video autoplay loop muted controls>
        <source src="{{asset("assets/video/video1.mp4")}}" type="video/mp4">
      </video>
      
      <video autoplay loop muted controls>
        <source src="{{asset("assets/video/mrbean.mp4")}}" type="video/mp4">
      </video>
    </div>

    <h2>Terakhir Dilihat</h2>
    <div class="products">
      <!-- Daftar produk -->
      <div class="product-card">
        <img src="{{ asset('assets/foto/helm.jpeg') }}" alt="Helm">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </div>
      <div class="product-card">
        <img src="{{ asset('assets/foto/trees.png') }}" alt="Little Trees">
        <div class="name">Little Trees</div>
        <div class="price">Rp.20.000</div>
        <div class="location">Gentan</div>
      </div>
      <!-- Tambahkan produk lainnya -->
    </div>
  </main>

  <script>
    const profileIcon = document.getElementById('profileIcon');
    const dropdownMenu = document.getElementById('dropdownMenu');

    profileIcon.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    window.addEventListener('click', () => {
      dropdownMenu.style.display = 'none';
    });
  </script>
</body>
</html>
