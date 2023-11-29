<x-content>

<h1>Edit pasien</h1>
<h6>
<a href="/pasien">&laquo;kembali ke list</a>
</h6>
<form action="/pasien/{{$pasien->id}}" method="post">
@csrf
@method('PUT')
<div class="mb-3">
    <label for="nama_pasien" class="form-label">nama pasien</label>
    <input type="text" class="form-control" name="nama_pasien" value="{{old('nama_pasien', $pasien->nama_pasien)}}">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">alamat</label>
    <textarea class="form-control" name="alamat" rows="3">{{old('alamat', $pasien->alamat)}}</textarea>
  </div>
  <div class="mb-3">
    <label for="telepon" class="form-label">telepon</label>
    <input type="text" class="form-control" name="telepon" value="{{old('telepon', $pasien->telepon)}}">
  </div>
  <div class="mb-3">
    <label for="telepon" class="form-label">rumah sakit</label>
    <select class="form-select" name="id_rs">
    @foreach($list_rs as $rs)
    <option value="{{$rs->id}}" selected="@selected(old('id_rs') == $rs->id)">
    {{$rs->nama_rs}}
    </option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">perbarui</button>
</form>

</x-content>