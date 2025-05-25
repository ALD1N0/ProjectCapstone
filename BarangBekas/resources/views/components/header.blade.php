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
        <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">💼 Produk</a>
        <a href="{{ route('tersimpan') }}" class="{{ request()->routeIs('tersimpan') ? 'active' : '' }}">🔖 Tersimpan</a>
        <a href="{{ route('jual.index') }}" class="{{ request()->routeIs('jual.index') ? 'active' : '' }}">✏️ Jual Produk</a>
        <a href="{{ route('pengaturan') }}" class="{{ request()->routeIs('pengaturan') ? 'active' : '' }}">⚙️ Pengaturan</a>
        <a href="{{ route('bantuan') }}" class="{{ request()->routeIs('bantuan') ? 'active' : '' }}">🎤 Bantuan</a>
    </nav>

</aside>


  <main class="main-content">
    <div class="sticky-top">
      <div class="search">
        <button style="background: none; border: none; font-size: 20px; cursor: pointer;">☰</button>
      </div>
      <div class="icons">
        <div style="font-weight: bold;">📍 {{$user?$user->alamat:"radue omah"}}</div>
        <div>✉️</div>
        <div>🔔</div>

       <div class="dropdown">
          <div id="profileIcon">👤 ▼</div>
          <div class="dropdown-content" id="dropdownMenu">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>