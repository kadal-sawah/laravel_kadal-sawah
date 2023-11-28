<x-content>
<h1>Rumah Sakit</h1>
<form action="tambahrs" method="post">
@csrf
  <div class="mb-3">
    <label for="namaRs" class="form-label">nama rumah sakit</label>
    <input type="text" class="form-control" name="namaRs">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">alamat</label>
    <textarea class="form-control" name="alamat" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="handphone" class="form-label">handphone</label>
    <input type="text" class="form-control" name="handphone">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</x-content>