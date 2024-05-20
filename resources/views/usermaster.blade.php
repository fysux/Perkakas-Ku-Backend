<div>
    @php
        // ambil data user yang sedang login
        $user = Auth::user();
    @endphp
    <form action="{{ route('upgradeakun') }}" method="POST">
        @csrf
        <input type="hidden" name="userID" id="userID">
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $user->name }}" readonly>
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ $user->email }}" readonly>
        </div>
        <div>
            <button type="submit">Daftar</button>
        </div>
    </form>
</div>