<div>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>
<div>
    <a href="{{ route('home') }}">Kembali</a>
    <table>
        <tr>
            <th>Barang</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td><img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}" width="200"></td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->harga }}</td>
                <td>
                    <a href="{{ route('editbarang', ['barangID' => $item->barangID]) }}">Edit</a>
                    <a href="{{ route('deletebarang', ['barangID' => $item->barangID]) }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
