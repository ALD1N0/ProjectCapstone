<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Sen's Market</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .detail-container {
            display: flex;
            gap: 20px;
            padding: 20px;
        }
        .left, .right {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            background: #fff;
        }
        .image-preview img {
            width: 100%;
            border-radius: 10px;
        }
        .action-buttons button {
            margin: 5px 0;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .action-buttons button:hover {
            background: #0056b3;
        }
        .beli-button {
            background: #28a745;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            margin-top: 20px;
            border-radius: 5px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .back-button {
            background: #6c757d;
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .back-button:hover {
            background: #5a6268;
        }
    </style>
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
            <a href="#">⚙️ Pengaturan</a>
            <a href="#">🎤 Bantuan</a>
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

        <div class="detail-container">
            <div class="left">
                <div class="image-preview">
                    <img src="gambar/helm.jpeg" alt="Helm KYT">
                </div>
                <div class="action-buttons">
                    <button>Simpan</button>
                    <button>Komentar</button>
                    <button>Bagikan</button>
                    <button class="back-button" onclick="history.back()">⬅️ Kembali</button>
                </div>
            </div>

            <div class="right">
                <h2>Jual Helm KYT Cross</h2>
                <h3 style="color: red;">Rp. 500.000</h3>
                <h4>Deskripsi Produk</h4>
                <p>Helm KYT Cross, pemakaian 7 bulan, kondisi mulus seperti baru. Cocok untuk motor trail/adventure. Bonus kaca helm.</p>
                <h4>Alamat Toko</h4>
                <p>Boyolali</p>
                <h4>Penjual</h4>
                <p>Gemilang Abadi ⭐⭐⭐⭐ (4.0)</p>
                <button class="beli-button">Beli Sekarang</button>
            </div>
        </div>
    </main>
</body>
</html>
