<x-content>

<h1>Rumah Sakit</h1>

<form action="/rs" method="post">
@csrf
  <div class="mb-3">
    <label for="namaRs" class="form-label">nama rumah sakit</label>
    <input type="text" class="form-control" name="namaRs" value="{{old('namaRs')}}" placeholder="masukan nama rs">
    @error('namaRs')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">alamat</label>
    <textarea class="form-control" name="alamat" rows="3" placeholder="masukan alamat rs">{{old('alamat')}}</textarea>
    @error('alamat')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="masukan email rs">
    @error('email')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="telepon" class="form-label">telepon</label>
    <input type="text" class="form-control" name="telepon" value="{{old('telepon')}}" placeholder="masukan telepon rs">
    @error('telepon')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

</x-content>