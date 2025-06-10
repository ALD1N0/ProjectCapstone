<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sen's Market</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

</head>
<body>

  <aside class="sidebar">
    <h1>Sen's Market</h1>
    <nav>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('tersimpan') }}" class="{{ request()->routeIs('tersimpan') ? 'active' : '' }}">🔖 Tersimpan</a>
        <a href="{{ route('jual.index') }}" class="{{ request()->routeIs('jual.index') ? 'active' : '' }}">✏️ Jual Produk</a>
        <a href="{{ route('pengaturan') }}" class="{{ request()->routeIs('pengaturan') ? 'active' : '' }}">⚙️ Pengaturan</a>
        <a href="{{ route('bantuan') }}" class="{{ request()->routeIs('bantuan') ? 'active' : '' }}">🎤 Bantuan</a>
    </nav>

</aside>


  <main class="main-content">
    <div class="sticky-top">
      <div class="search">
       <!-- Tombol Toggle di bagian header -->
<button id="toggleSidebar" style="background:none;border:none;font-size:24px;cursor:pointer;">
  ☰
</button>

      </div>
      <div class="icons">
       <div class="dropdown">
          <div id="profileIcon">👤 ▼</div>
          <div class="dropdown-content" id="dropdownMenu">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">Logout</button>
            </form>
<script>
  document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const profileIcon = document.getElementById('profileIcon');
            const dropdownMenu = document.getElementById('dropdownMenu');

            // Toggle Sidebar
            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('hidden');
                mainContent.classList.toggle('expanded');
            });

            // Toggle Profile Dropdown
            profileIcon.addEventListener('click', function (event) {
                event.stopPropagation(); // Mencegah event click menyebar ke window untuk menutup dropdown
                dropdownMenu.classList.toggle('show');
            });

            // Tutup dropdown jika user mengklik di luar ikon profil atau menu dropdown
            window.addEventListener('click', function (event) {
                if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    if (dropdownMenu.classList.contains('show')) {
                        dropdownMenu.classList.remove('show');
                    }
                }
            });
        });
</script>

          </div>
        </div>
      </div>
    </div>