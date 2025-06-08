@extends('mainlayout')

@section('maincontent')


    <div style="padding: 100px 20px 40px 20px;">
      <h2>Produk</h2>
      <button class="add-product-form button" onclick="openModal()">TAMBAH PRODUK</button>

       <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background: var(--primary-color); color: white;">
            <tr>
                <th style="padding: 10px;">No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
            <tr style="background: #fafafa; text-align: center;">
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->nama_product }}</td>
                <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>{{ $product->stok }}</td>
                <td>{{ $product->kondisi }}</td>
                <td>
                  @if ($product->image_url)
                      <img src="{{ asset( $product->image_url) }}" alt="Foto Produk" style="width: 80px; height: auto; border-radius: 4px;">
                  @else
                      Tidak ada gambar
                  @endif
              </td>
                <td>
                    <a href="{{ route('jual.edit', $product->id) }}" class="add-product-form button" style="padding: 5px 10px; margin: 2px;">UBAH</a>
                    <form action="{{ route('jual.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="add-product-form button" style="background: #dc3545; padding: 5px 10px; margin: 2px;">HAPUS</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <!-- MODAL -->
    <div class="modal" id="produkModal" style="display: none; position: fixed; z-index: 1001; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
      <div class="modal-content" style="background: white; margin: 10% auto; padding: 20px; border-radius: 8px; width: 400px; position: relative;">
        <span class="close" onclick="closeModal()" style="position: absolute; top: 10px; right: 20px; font-size: 24px; cursor: pointer;">&times;</span>
        <h3>Tambah Produk</h3>
        <form action="{{route("jual.store")}}" method="POST" enctype="multipart/form-data" class="add-product-form">
    @csrf

    <label for="nama_product">Nama Produk</label>
    <input type="text" name="nama_product" id="nama_product" value="{{ old('nama_product') }}" required>

    <label for="deskripsi">Deskripsi Produk</label>
    <textarea name="deskripsi" id="deskripsi" required>{{ old('deskripsi') }}</textarea>

    <label for="harga">Harga Produk</label>
    <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required>

    <label for="stok">Stok</label>
    <input type="number" name="stok" id="stok" value="{{ old('stok', 1) }}" min="1" required>

    <label for="kondisi">Kondisi</label>
    <select name="kondisi" id="kondisi" required>
        <option value="baru" {{ old('kondisi') == 'baru' ? 'selected' : '' }}>Baru</option>
        <option value="bekas" {{ old('kondisi') == 'bekas' ? 'selected' : '' }}>Bekas</option>
    </select>

    <label for="image">Foto Produk</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <button type="submit">Tambah Produk</button>
</form>

      </div>
    </div>
  </main>

  <script>
    function openModal() {
      document.getElementById('produkModal').style.display = 'block';
    }
    function closeModal() {
      document.getElementById('produkModal').style.display = 'none';
    }
    window.onclick = function(event) {
      if (event.target == document.getElementById('produkModal')) {
        closeModal();
      }
    }
  </script>
</body>
</html>
@endsection