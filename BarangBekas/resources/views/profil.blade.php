<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Toko - Sen's Market</title>
    <style>
        :root {
            --primary-color: #190980;
            --primary-gradient: linear-gradient(45deg, #d36811, #3111fd);
            --hover-color: #cf6e4d;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            
        }
        /* Sidebar */
.sidebar {
  position: fixed;
  left: 0;
  top: 0;
  width: 240px;
  height: 100vh;
  background: var(--primary-gradient);
  border-right: 1px solid #ccc;
  padding: 20px;
  box-sizing: border-box;
  color: white;
}

.sidebar h1 {
  font-size: 24px;
  margin-bottom: 30px;
  color: white;
}

.sidebar nav {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.sidebar nav a {
  text-decoration: none;
  color: white;
  font-size: 16px;
  transition: background 0.3s;
}

.sidebar nav a.active {
  background: white;
  padding: 8px;
  border-radius: 5px;
  font-weight: bold;
  color: var(--primary-color);
}

.sidebar nav a:hover {
  background: rgba(255, 255, 255, 0.2);
  border-radius: 5px;
}

        /* Main Content */
        .main-content {
            margin-left: 240px;
            padding: 20px;
            background: #f9f9f9;
            height: 100vh;
            overflow-y: auto;
            box-sizing: border-box;
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .avatar-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #ccc;
        }
        .profile-header .details {
            display: flex;
            flex-direction: column;
        }
        .profile-header .details h2 {
            margin: 0;
        }
        .rating {
            color: #f39c12;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .product-card {
            background: white;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .product-card .name {
            font-weight: bold;
            margin-top: 10px;
        }
        .product-card .price {
            color: var(--primary-color);
        }
        .product-card .location {
            font-size: 12px;
            color: gray;
        }
        .section {
            margin-top: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background: var(--primary-color);
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #ddd;
        }
    </style>
</head>
<body>
<aside class="sidebar">
    <h1>Sen's Market</h1>
    <nav>
        <a href="{{ route('dashboard') }}" >🏠 Dashboard</a>
        <a href="{{route("profil")}}" class="active">👤 Profil</a>
        <a href="{{route("produk")}}">💼 Produk</a>
        <a href="{{route("tersimpan")}}">🔖 Tersimpan</a>
        <a href="{{route("jualproduk")}}">✏️ Jual Produk</a>
        <a href="{{route("pengaturan")}}">⚙️ Pengaturan</a>
        <a href="{{route("bantuan")}}">🎤 Bantuan</a>
    </nav>
</aside>

<div class="main-content">
    <div class="profile-header">
        <img src="{{asset("assets/foto/helm.jpeg")}}" alt="Avatar" class="avatar-large">
        <div class="details">
            <h2>Gemilang Abadi</h2>
            <div>Rating Toko: <span class="rating">⭐⭐⭐⭐☆ (4)</span></div>
            <a href="#" style="color: var(--primary-color); font-weight: bold; text-decoration: none; margin-top: 5px;">Lihat Ulasan</a>
        </div>
    </div>

    <h3 style="margin-top: 30px;">Produk Dijual</h3>
    <div class="products">
        <div class="product-card">
            <img src="{{asset("assets/foto/helm.jpeg")}}" alt="Produk">
            <div class="name">Jual Helm KYT</div>
            <div class="price">Rp. 500</div>
            <div class="location">Teras</div>
        </div>
        <div class="product-card">
            <img src="{{asset("assets/foto/jacket.jpg")}}" alt="Produk">
            <div class="name">Jual Jaket Touring</div>
            <div class="price">Rp. 350</div>
            <div class="location">Boyolali</div>
        </div>
        <div class="product-card">
            <img src="{{asset("assets/foto/stgn.jpg")}}" alt="Produk">
            <div class="name">Jual Sarung Tangan</div>
            <div class="price">Rp. 150</div>
            <div class="location">Solo</div>
        </div>
    </div>

    <div class="section">
        <h3>Riwayat Pembelian</h3>
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Helm KYT</td>
                    <td>01/05/2025</td>
                    <td>1</td>
                    <td>Selesai</td>
                </tr>
                <tr>
                    <td>Jaket Touring</td>
                    <td>28/04/2025</td>
                    <td>1</td>
                    <td>Selesai</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <h3>Riwayat Penjualan</h3>
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sarung Tangan</td>
                    <td>03/05/2025</td>
                    <td>2</td>
                    <td>Selesai</td>
                </tr>
                <tr>
                    <td>Helm KYT</td>
                    <td>02/05/2025</td>
                    <td>1</td>
                    <td>Dalam Proses</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
