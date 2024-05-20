@if (Auth::check() == false)
    <script>
        alert('anda harus login terlebih dahulu');
        window.location = "{{ route('login') }}";
    </script>
@elseif (Auth::check() == true)
<div>
    <div>
        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>
    <p>Selamat datang, {{ Auth::user()->name }}</p>
    <div>
        <a href="{{ route('home') }}">Home</a>
    </div>
    <div>
        <a href="{{ route('upgrade') }}">Tingkatkan Akun</a>
    </div>
    <div>
        <a href="{{ route('barang') }}">Barang Saya</a>
    </div>
    <div>
        <a href="{{ route('jual') }}" id="jual" >Jual Barang</a>
    </div>
    <div>
        <a href="{{ route('pesanan') }}">Pesanan Saya</a>
    </div>
    <div>
        <a href="{{ route('logout') }}" id="logout">Keluar</a>
    </div>
    <div>
        <form action="{{ route('search')}}" method="GET">
            @csrf
            <label for="kategori">Pilih Sesuai Kategori</label>
            <select name="kategoriID" id="kategori">
                @php
                    $kategori = \App\Models\Kategori::all();
                @endphp
                @foreach ($kategori as $k)
                    <option value="{{ $k->kategoriID }}">{{ $k->nama }}</option>
                @endforeach
            </select>
            <button type="submit">Cari</button>
        </form>
    </div>
</div>

<div>
    @php
        $data = \App\Models\Barang::all();
    @endphp
    
    @foreach ($data as $barang)
        <div>
            <p>{{ $barang->name }}</p>
            <img src="{{ asset('storage/'.$barang->image) }}" alt="{{ $barang->name }}" width="200" height="200">
            <p>{{ $barang->deskripsi }}</p>
            <p>{{ $barang->stok }}</p>
            <p>{{ $barang->harga }}</p>
            <a href="{{ route('beli', ['barangID' => $barang->barangID]) }}">Beli</a>
        </div>
    @endforeach
</div>
@endif
