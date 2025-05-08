<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Produk - Sen's Market</title>
  <link rel="stylesheet" href="{{asset("assets/css/style.css")}}" />
</head>
<body>
  <aside class="sidebar">
    <h1>Sen's Market</h1>
    <nav>
      <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
      <a href="{{route("profil")}}">👤 Profil</a>
      <a href="{{route("produk")}}" class="active">💼 Produk</a>
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
        <input type="text" placeholder="Cari Barang Anda" />
      </div>
      <div class="icons">
        <div>📍 Boyolali</div>
        <div>✉️</div>
        <div>🔔</div>
        <div>👤 ▼</div>
      </div>
    </div>

    <div class="detail-container">
      <div class="left">
        <div class="seller-info">
          <img src="{{asset("assets/foto/helm.jpeg")}}" alt="user" class="avatar" />
          <div>
            <div class="name">Gemilang Abadi</div>
            <div class="rating">⭐⭐⭐⭐ 4</div>
          </div>
        </div>

        <div class="image-preview">
          <button class="nav-arrow">←</button>
          <img src="{{asset("assets/foto/helm.jpeg")}}" alt="Produk" />
          <button class="nav-arrow">→</button>
        </div>

        <div class="action-buttons">
          <button>simpan</button>
          <button>komentar</button>
          <button>bagikan</button>
        </div>
      </div>

      <div class="right">
        <h2>Jual Helm KYT Cross</h2>
        <h4>Deskripsi</h4>
        <p>Dijual Helm KYT Cross pemakaian 7 bulan, like new</p>
        <h3>Rp. 1.000</h3>
        <h4>Alamat Toko</h4>
        <p>Boyolali</p>
      </div>
    </div>
  </main>
</body>
</html>