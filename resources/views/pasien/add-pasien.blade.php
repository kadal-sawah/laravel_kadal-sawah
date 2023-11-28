<x-content>

<h1>Tambah Pasien</h1>
<h6>
<a href="/beranda">&laquo;kembali ke beranda</a>
</h6>
<form action="/pasien" method="post">
@csrf
  <div class="mb-3">
    <label for="nama_pasien" class="form-label">nama pasien</label>
    <input type="text" class="form-control" name="nama_pasien">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">alamat</label>
    <textarea class="form-control" name="alamat" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="telepon" class="form-label">telepon</label>
    <input type="text" class="form-control" name="telepon">
  </div>
  <div class="mb-3">
    <label for="telepon" class="form-label">rumah sakit</label>
    <select class="form-select" name="id_rs">
    @foreach($list_rs as $rs)
    <option value="{{$rs->id}}">{{$rs->nama_rs}}</option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">simpan</button>
</form>

</x-content>