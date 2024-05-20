<div>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<div>
    <form method="POST" action="{{ route('masuk') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>

        <a href="{{ route('daftar') }}">Daftar</a>
        <a href="{{ route('welcome') }}">Kembali</a>
    </form>
</div>
