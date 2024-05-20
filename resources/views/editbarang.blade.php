<div>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>

<div>
    <form action="{{ route('updatebarang', ['barangID' => $barangID->barangID]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $barangID->name }}" required>
        </div>
        <div>
            <label for="price">Price</label>
            <input id="price" type="number" name="harga" value="{{ $barangID->harga }}" required>
        </div>
        <div>
            <img src="{{ asset('storage/'.$barangID->image) }}" alt="{{ $barangID->name }}" width="200">
            <p>ganti foto</p>
            <input type="file" name="image">
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <textarea id="description" name="deskripsi" required>{{ $barangID->deskripsi }}</textarea>
        </div>
        <div>
            <label for="stok">Stok</label>
            <input id="stok" type="number" name="stok" value="{{ $barangID->stok }}" required>
        </div>
        <div>
            <label for="kategoriID">Kategori</label>
            <select name="kategoriID" id="kategoriID" required>
                @php
                    $kategori = App\Models\Kategori::where('kategoriID', $barangID->kategoriID);
                    $kategori = $kategori->get();
                @endphp
                @foreach ($kategori as $data)
                    <option value="{{ $data->kategoriID }}">{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
    <a href="{{ route('barang') }}">Kembali</a>
</div>
