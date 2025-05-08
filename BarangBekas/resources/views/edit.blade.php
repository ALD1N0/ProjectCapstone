<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil</title>
  <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
  <style>
   
    .edit-profile-container {
      max-width: 500px;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .edit-profile-container h2 {
      margin-bottom: 20px;
    }

    .edit-profile-form .form-group {
      margin-bottom: 15px;
    }

    .edit-profile-form label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .edit-profile-form input[type="text"],
    .edit-profile-form input[type="email"],
    .edit-profile-form input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .current-photo {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-top: 10px;
    }

    .edit-profile-form button {
      background-color: #7b2ff7;
      color: white;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .edit-profile-form button:hover {
      background-color: #6922d0;
    }
  </style>
</head>
<body>
<aside class="sidebar">
    <h1>Sen's Market</h1>
    <nav>
      <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
      <a href="{{route("profil")}}">👤 Profil</a>
      <a href="{{route("produk")}}" >💼 Produk</a>
      <a href="{{route("tersimpan")}}">🔖 Tersimpan</a>
      <a href="{{route("jualproduk")}}">✏️ Jual Produk</a>
      <a href="{{route("pengaturan")}}" class="active">⚙️ Pengaturan</a>
    <a href="{{route("bantuan")}}">🎤 Bantuan</a>
    </nav>
  </aside>
  <div class="main-content">
    <div class="edit-profile-container">
      <h2>Edit Profil</h2>
      <form class="edit-profile-form">
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" placeholder="Masukkan nama lengkap">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Masukkan email">
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" placeholder="Masukkan username">
        </div>

        <div class="form-group">
          <label for="foto">Foto Profil</label>
          <input type="file" id="foto">
        </div>

        <div class="form-group">
          <label>Foto Sekarang</label>
          <img src="avatar.png" alt="Foto Profil" class="current-photo">
        </div>

        <button type="submit">💾 Simpan</button>
      </form>
    </div>
  </div>

</body>
</html>
