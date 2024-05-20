<div>
    <form action="{{ route('daftar') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Daftar</button>
        </div>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('welcome') }}">Kembali</a>
    </form>
</div>
