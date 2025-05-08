<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akun Saya</title>
  <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
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

  <main class="main-content">
  <div class="account-card">
  <div class="profile-header">
    <img src="{{asset("assets/foto/trees.png")}}" alt="Avatar" class="avatar-large">
    <div>
      <h2 class="username">reidarafd</h2>
      <a href="{{route("edit")}}" class="edit-profile">✏️ Ubah Profil</a>
    </div>
  </div>

  <ul class="account-menu">
    <li><a href="#"><span class="icon">👤</span> Profil</a></li>
    <li><a href="#"><span class="icon">🏦</span> Bank & Kartu</a></li>
    <li><a href="#"><span class="icon">🏠</span> Alamat</a></li>
    <li><a href="#"><span class="icon">🔒</span> Ubah Password</a></li>
    <li><a href="#"><span class="icon">🔔</span> Notifikasi</a></li>
    <li><a href="#"><span class="icon">🔏</span> Privasi</a></li>
  </ul>
</div>

  </main>
</body>
</html>
