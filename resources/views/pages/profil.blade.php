@extends('mainlayoutb')

@section('maincontent')

<div class="main-content">
    <div class="profile-header">
       <img src="{{ asset($user->foto && $user->foto !== '' ? $user->foto : 'assets/foto/images.png') }}" alt="Avatar" class="avatar-large">
        <div class="details">
            <h2>{{$user->username}}</h2>
            <div>Rating Toko: <span class="rating">⭐⭐⭐⭐☆ (4)</span></div>
            <a href="#" style="color: var(--primary-color); font-weight: bold; text-decoration: none; margin-top: 5px;">Lihat Ulasan</a>
        </div>
    </div>

    <h3 style="margin-top: 30px;">Produk Dijual</h3>
    <div class="products">
        @foreach ($products as $p)
             <div class="product-card">
            <img src="{{ asset($p->image_url ?: 'assets/foto/images.png') }}" alt="Produk">
            <div class="name">Jual {{$p->nama_product}}</div>
            <div class="price">Rp.{{$p->harga}}</div>
            <div class="location">{{$p->user->alamat}}</div>
        </div>
        @endforeach
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
@endsection