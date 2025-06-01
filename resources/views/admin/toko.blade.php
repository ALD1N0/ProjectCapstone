    @extends('mainlayouta')

    @section('maincontent')

    <div class="main-content">
        <div class="profile-header">
            <img src="{{asset($user->foto)}}" alt="Avatar" class="avatar-large">
            <div class="details">
                <h2>{{$user->username}}</h2>
                <a href="#" style="color: var(--primary-color); font-weight: bold; text-decoration: none; margin-top: 5px;">Lihat Ulasan</a>
            </div>
        </div>

        <h3 style="margin-top: 30px;">Produk Dijual</h3>
        <div class="products">
            @foreach ($products as $p)
                <div class="product-card">
                <img src="{{asset($p->image_url)}}" alt="Produk">
                <div class="name">Jual {{$p->nama_product}}</div>
                <div class="price">Rp.{{$p->harga}}</div>
                <div class="location">{{$p->user->alamat}}</div>
            </div>
            @endforeach
        </div>
    </div>
    </body>
    </html>
    @endsection