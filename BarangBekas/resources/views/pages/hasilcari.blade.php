@extends('mainlayout')

@section('maincontent')


    <div style="padding: 20px;"></div>

    <div class="products">
        @foreach($products as $product)
           <a href="{{ route('detail') }}" class="product-card">
        <img src="{{asset($product->image_url)}}" alt="">
        <div class="name">{{$product->nama_product}}</div>
        <div class="price">Rp. {{$product->harga}}</div>
        <div class="location">{{$product->user->alamat}}</div>
      </a>
        @endforeach
      </div>
  </main>
  
</body>
</html>
@endsection