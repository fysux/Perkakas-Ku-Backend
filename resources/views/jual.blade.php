<div>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>
<div>
    {{-- Periksa apakah user memiliki UserMaster --}}
    @if ($usermasterID)
        {{-- Form jual barang --}}
        <form action="{{ route('jualbarang') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Nama</label><br>
                <input id="name" type="text" name="name">
            </div>
            <div>
                <label for="price">Harga</label><br>
                <input id="price" type="number" name="harga">
            </div>
            <div>
                <label for="image">Gambar</label><br>
                <input id="image" type="file" name="image">
            </div>
            <div>
                <label for="description">Deskripsi</label><br>
                <textarea id="description" name="deskripsi"></textarea>
            </div>
            <div>
                <label for="stok">Stok</label>
                <input id="stok" type="number" name="stok">
            </div>
            <input type="hidden" name="usermasterID" id="usermasterID" value="{{ $usermasterID }}">

            <div>
                <select name="kategoriID" id="">
                    @foreach ($data_kategori as $kategori)
                        <option value="{{ $kategori->kategoriID }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Jual</button>
            </div>
        </form>
        <div>
            <a href="{{ route('home') }}">Kembali</a>
        </div>
    @else
        <script>
            alert('anda harus tingkatkan akun terlebih dahulu');
            window.location = "{{ route('upgrade') }}";
        </script>
    @endif
</div>
