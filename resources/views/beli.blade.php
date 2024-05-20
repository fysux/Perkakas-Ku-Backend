<div>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>

{{-- Tampilan barang yang dipilih --}}
@php
    $data = request()->route()->barangID;
    $data = \App\Models\Barang::findorFail($data);
@endphp
<div>
    <form action="{{ route('belibarang') }}" method="POST">
        @csrf
        <div>
            <p>{{ $data->name }}</p>
            <img src="{{ asset('storage/'.$data->image) }}" alt="{{ $data->name }}" width="200" height="200">
            <p>{{ $data->deskripsi }}</p>
            <p>{{ $data->stok }}</p>
            <p>{{ $data->harga }}</p>
            <input type="hidden" name="barangID" id="barangID" value="{{ $data->barangID }}">
            <input type="hidden" name="userID" id="barangID" value="{{ Auth::user()->userID }}">
            <button type="submit">Beli</button>
        </div>
    </form>
</div>

<div>
    <a href="{{ route('home') }}">Kembali</a>
</div>
