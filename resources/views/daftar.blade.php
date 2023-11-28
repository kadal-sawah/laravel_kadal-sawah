<x-content>

<main class="px-3">
    <h1>Silahkan daftar</h1>
    <form action="/daftar" method="post">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">konfirmasi password</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">daftar</button>
    </form>
</main>

</x-content>