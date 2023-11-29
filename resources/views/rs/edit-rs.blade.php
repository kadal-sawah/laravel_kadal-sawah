<x-content>

<h1>Edit Rumah Sakit</h1>
<h6>
<a href="/rs">&laquo;kembali ke list</a>
</h6>
<form action="/rs/{{$rs->id}}" method="post">
@csrf
@method('PUT')
  <div class="mb-3">
    <label for="namaRs" class="form-label">nama rumah sakit</label>
    <input type="text" class="form-control" name="namaRs" value="{{old('namaRs', $rs->nama_rs)}}">
    @error('namaRs')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">alamat</label>
    <textarea class="form-control" name="alamat" rows="3">{{old('alamat', $rs->alamat)}}</textarea>
    @error('alamat')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" name="email" value="{{old('email', $rs->email)}}">
    @error('email')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="telepon" class="form-label">telepon</label>
    <input type="text" class="form-control" name="telepon" value="{{old('telepon', $rs->telepon)}}">
    @error('telepon')
    <p class="alert alert-danger">
        {{$message}}
    </p>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary btn-md">perbarui</button>
</form>

</x-content>