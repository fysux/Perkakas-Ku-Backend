<div>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>
<div>
    @php
        $user = Auth::user();
        $data = \App\Models\Order::where('userID', $user->userID)->get();

    @endphp

    @foreach ($data as $order)
        <div>
            <p>{{ $order->created_at }}</p>
            <img src="{{ asset('storage/'.$order->barang->image) }}" alt="{{ $order->barang->name }}" width="200">
            <p>{{ $order->user->name }}</p>
            <p>{{ $order->barang->name }}</p>
            <p>{{ $order->barang->kategori->nama }}</p>
            <p>{{ $order->barang->harga }}</p>
        </div>
    @endforeach
</div>
<div>
    <a href="{{ route('home') }}">Kembali</a>
</div>
