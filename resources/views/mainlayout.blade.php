<?php
// Catatan: session_start() biasanya tidak diperlukan di Laravel karena framework mengelola sesi secara otomatis.
// Jika tidak ada alasan khusus, Anda bisa menghapusnya untuk menghindari potensi konflik.
// session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sen's Market</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    {{-- CSS minimal untuk memastikan elemen header terlihat dan tertata dengan flexbox --}}
    <style>
        /* Pastikan elemen di dalam sticky-top menggunakan flexbox untuk penataan kiri-kanan */
        .sticky-top {
            display: flex; /* Mengaktifkan Flexbox */
            justify-content: space-between; /* Menjaga jarak antara elemen di kiri (search) dan kanan (icons) */
            align-items: center; /* Menyusun elemen secara vertikal di tengah */
            /* Properti lain seperti warna latar belakang, padding, posisi (fixed), z-index
               tetap diharapkan diatur di file 'css/style.css' Anda */
        }

        /* Pastikan ikon toggle sidebar berwarna hitam */
        #toggleSidebar {
            color: black; /* Diubah menjadi hitam */
            /* Properti lain seperti background, border, font-size, cursor, padding, border-radius, transition
               diasumsikan diatur di file 'css/style.css' Anda */
        }

        /* Mengatur tata letak bagian ikon di sisi kanan header (profil/dropdown) */
        .icons {
            display: flex; /* Menggunakan Flexbox untuk ikon */
            align-items: center; /* Menyusun ikon secara vertikal di tengah */
        }

        /* Gaya untuk ikon profil agar terlihat, bisa diklik, dan dropdown berfungsi */
        #profileIcon {
            color: black; /* Diubah menjadi hitam */
            display: flex; /* Menggunakan Flexbox untuk menata ikon dan panah kecil */
            align-items: center; /* Menyusun secara vertikal di tengah */
            gap: 5px; /* Memberi sedikit jarak antara ikon 👤 dan panah ▼ */
            cursor: pointer; /* Menandakan elemen ini bisa diklik */
            /* Properti lain seperti padding, border-radius, transition
               diasumsikan diatur di file 'css/style.css' Anda */
        }

        /* Gaya dasar untuk dropdown content */
        .dropdown {
            position: relative; /* Penting agar dropdown-content bisa diposisikan secara 'absolute' relatif terhadapnya */
            display: inline-block; /* Agar elemen ini bisa diatur lebar sesuai kontennya */
        }

        .dropdown-content {
            display: none; /* Default tersembunyi */
            position: absolute; /* Penting agar dropdown melayang di atas konten lain */
            right: 0; /* Menempatkan dropdown di sisi kanan ikon profil */
            z-index: 1000; /* Memastikan dropdown muncul di atas elemen lain */
            background-color: #333; /* Diubah menjadi hitam/dark gray */
            /* Properti lain seperti min-width, box-shadow, border-radius, overflow, padding
               diasumsikan diatur di file 'css/style.css' Anda */
        }

        .dropdown-content.show {
            display: block; /* Tampilkan ketika class 'show' ditambahkan oleh JS */
        }

        /* Gaya untuk tombol logout di dalam dropdown */
        .dropdown-content button {
            color: white; /* Diubah menjadi putih agar terlihat di latar belakang hitam dropdown */
            background: none; /* Menghilangkan background bawaan tombol */
            border: none; /* Menghilangkan border bawaan tombol */
            width: 100%; /* Tombol memenuhi lebar dropdown */
            text-align: left; /* Teks rata kiri */
            cursor: pointer; /* Menandakan bisa diklik */
            /* Properti lain seperti padding, font-size, transition
               diasumsikan diatur di file 'css/style.css' Anda */
        }
        .dropdown-content button:hover {
            background-color: #555; /* Warna hover yang lebih gelap untuk latar belakang hitam */
        }

        /* CSS untuk transisi sidebar dan main-content (jika belum ada di style.css) */
        .sidebar {
            transition: width 0.3s ease;
        }
        .sidebar.hidden {
            width: 0;
            overflow: hidden;
        }
        .main-content {
            transition: margin-left 0.3s ease;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        .sticky-top {
            transition: width 0.3s ease, margin-left 0.3s ease;
        }
        .main-content.expanded .sticky-top {
            width: 100%;
            margin-left: 0;
        }

        /* Margin atas untuk main-content agar tidak tertutup header */
        .main-content {
            margin-top: 60px; /* Sesuaikan dengan tinggi sticky-top Anda */
        }
    </style>
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
            <div class="search"> {{-- Div ini mungkin bisa dihapus jika tidak ada konten pencarian di sini --}}
                <!-- Tombol Toggle di bagian header -->
                <button id="toggleSidebar">
                    ☰
                </button>
            </div>
            <div class="icons">
                <div class="dropdown">
                    {{-- Ubah ikon profil menjadi clickable untuk toggle dropdown --}}
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

        @yield('maincontent') {{-- Pastikan konten utama dari view lain di-render di sini --}}

    </main>

    {{-- Script JavaScript dipindahkan ke akhir body untuk performa yang lebih baik --}}
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

            // Mencegah klik di dalam dropdown_content menyebar ke window
            dropdownMenu.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>
</body>
</html>
