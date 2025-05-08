<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sen's Market</title>
  <link rel="stylesheet" href="{{asset("assets/css/stylemu.css")}}"/>
  <style>
    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      top: 40px;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      min-width: 140px;
      z-index: 1001;
    }

    .dropdown-content a {
      display: block;
      padding: 10px 15px;
      color: #333;
      text-decoration: none;
      transition: background 0.3s;
    }

    .dropdown-content a:hover {
      background: #0099ff;
      color: white;
    }

    #profileIcon {
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<aside class="sidebar">
  <h1>Sen's Market</h1>
  <nav>
    <div class="menu-links">
      <a href="dasboard.php" class="active">🏠 Dashboard</a>
      <a href="profil.php">👤 Profil</a>
      <a href="hasilcari.php">💼 Produk</a>
      <a href="simpan.php">🔖 Tersimpan</a>
      <a href="jual.php">✏️ Jual Produk</a>
      <a href="pengaturan.php">⚙️ Pengaturan</a>
      <a href="bantuan.php">🎤 Bantuan</a>
    </div>
    <div class="logout-link">
      <a href="logout.php" style="color: red;">🚪 Logout</a>
    </div>
  </nav>
</aside>

<main class="main-content">
  <div class="topbar sticky-top">
    <div class="search">
      <button style="background: none; border: none; font-size: 20px;">☰</button>
      <input type="text" placeholder="Cari Barang Anda" />
    </div>
    <div class="icons">
      <div>📍 Boyolali</div>
      <div>✉️</div>
      <div>🔔</div>
      <div class="dropdown">
        <div id="profileIcon">
          <?php if (isset($_SESSION['username'])): ?>
            <?php echo htmlspecialchars($_SESSION['username']); ?> ▼
          <?php else: ?>
            👤 ▼
          <?php endif; ?>
        </div>
        <div class="dropdown-content" id="dropdownMenu">
          <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php">Logout</a>
          <?php else: ?>
            <a href="login.php">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="carousel">
    <video autoplay loop muted controls>
      <source src="video1.mp4" type="video/mp4" />
    </video>
    <video autoplay loop muted controls>
      <source src="mrbean.mp4" type="video/mp4" />
    </video>
  </div>

  <h2>Terakhir Dilihat</h2>
  <div class="products">
    <!-- Contoh produk -->
    <div class="product-card">
      <img src="helm.jpeg" alt="Helm KYT" />
      <div class="name">Jual Helm KYT</div>
      <div class="price">Rp.500</div>
      <div class="location">Teras</div>
    </div>
    <div class="product-card">
      <img src="trees.png" alt="Little Trees" />
      <div class="name">Little Trees</div>
      <div class="price">Rp.20.000</div>
      <div class="location">Gentan</div>
    </div>
    <!-- Tambahkan produk lainnya di sini -->
  </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const profileIcon = document.getElementById('profileIcon');
  const dropdownMenu = document.getElementById('dropdownMenu');

  profileIcon.addEventListener('click', function () {
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
  });

  document.addEventListener('click', function (event) {
    if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
      dropdownMenu.style.display = 'none';
    }
  });
});
</script>

</body>
</html>
