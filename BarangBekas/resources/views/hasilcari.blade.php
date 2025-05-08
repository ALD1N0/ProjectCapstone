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
      <a href="dasboard.php">🏠 Dashboard</a>
      <a href="profil.php">👤 Profil</a>
      <a href="produk.php" class="active">💼 Produk</a>
      <a href="simpan.php">🔖 Tersimpan</a>
      <a href="jual.php">✏️ Jual Produk</a>
      <a href="pengaturan.php">⚙️ Pengaturan</a>
      <a href="bantuan.php">🎤 Bantuan</a>
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

    <div style="padding: 20px;"></div>

    <div class="products">
      <a href="detail.php" class="product-card">
        <img src="helm.jpeg" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="trees.png" alt="">
        <div class="name">Little Trees</div>
        <div class="price">Rp.700</div>
        <div class="location">Gentan</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="adibas.jpg" alt="">
        <div class="name">Sepatu Adibas</div>
        <div class="price">Rp.700</div>
        <div class="location">Kertonatan</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="tiger.jpg" alt="">
        <div class="name">Spakbor Tiger Herek</div>
        <div class="price">Rp.500</div>
        <div class="location">Randusari</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="fiber.jpg" alt="">
        <div class="name">Microfiber</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </a>
      
      <!-- Sisanya produk duplikat yang sama -->
      <!-- Kalau mau pakai yang sama seperti your-image1.png -->
      <!-- Aku kasih beberapa contoh biar kamu tinggal copy paste -->

      <a href="detail.php" class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </a>
      <a href="detail.php" class="product-card">
        <img src="your-image1.png" alt="">
        <div class="name">Jual Helm KYT</div>
        <div class="price">Rp.500</div>
        <div class="location">Teras</div>
      </a>
      <!-- Copy terus sesuai jumlah produk yang kamu mau -->
    </div>
  </main>
  
</body>
</html>
