<x-content>

<main class="px-3">
    <h1>Silahkan daftar</h1>
    <form action="/daftar" method="post">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="masukan username">
        @error('username')
        <p class="alert alert-danger">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="masukan alamat email">
        @error('email')
        <p class="alert alert-danger">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" class="form-control" name="password" placeholder="masukan password">
        @error('password')
        <p class="alert alert-danger">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">konfirmasi password</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="ketik kembali password">
        @error('password_confirmation')
        <p class="alert alert-danger">
            {{$message}}
        </p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-md">daftar</button>
    </form>
</main>

</x-content>