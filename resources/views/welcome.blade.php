<x-content>

<main class="px-3">
    <h1>Selamat datang</h1>
    <form action="/masuk" method="post">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" class="form-control" name="username" placeholder="username">
        @error('username')
        <p class="alert alert-danger">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" class="form-control" name="password" placeholder="masukan password">
    </div>
    <button type="submit" class="btn btn-primary">Masuk</button>
    </form>
</main>

</x-content>