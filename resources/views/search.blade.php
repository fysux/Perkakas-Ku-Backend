<div>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>
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
    @foreach ($data_barang as $item)
        <div>
            <p>{{ $item->name }}</p>
            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}" width="200">
            <p>{{ $item->deskripsi }}</p>
            <p>{{ $item->stok }}</p>
            <p>{{ $item->harga }}</p>
            <p>{{ $item->kategori->nama }}</p>
            <a href="{{ route('belibarang', $item->barangID) }}">Beli</a>
        </div>
    @endforeach
</div>