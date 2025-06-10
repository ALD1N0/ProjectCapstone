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
        <a href="{{ route('user') }}" class="{{ request()->routeIs('user') ? 'active' : '' }}">👤 Toko</a>
        <a href="{{ route('barang') }}" class="{{ request()->routeIs('barang') ? 'active' : '' }}">💼 Barang</a>
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
        <div>Admin</div>
        <div class="dropdown">
          <div id="profileIcon">👤 ▼</div>
          <div class="dropdown-content" id="dropdownMenu">
            <a href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    toggleBtn.addEventListener('click', function () {
      sidebar.classList.toggle('hidden');
      mainContent.classList.toggle('expanded');
    });
  });
  </script>