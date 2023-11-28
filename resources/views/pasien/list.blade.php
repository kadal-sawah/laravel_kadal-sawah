<x-content>

<h1>Data Pasien</h1>

<table class="table table-bordered text-white" id="dataPs">
    <tr>
        <td>Nama Pasien</td>
        <td>Alamat</td>
        <td>Telepon</td>
        <td>Rumah Sakit</td>
        <td>Aksi</td>
    </tr>
    
@foreach($list_pasien as $ps)
    <tr>
        <td>{{$ps->nama_pasien}}</td>
        <td>{{$ps->alamat}}</td>
        <td>{{$ps->telepon}}</td>
        <td>{{$ps->rs->nama_rs}}</td>
        <td>
            <a href="/pasien/{{$ps->id}}/edit" class="btn btn-secondary btn-sm edit">edit</a>
            <form action="/pasien/{{$ps->id}}/delete" method="post">
            @csrf
            @method('DELETE')
                <button class="btn btn-secondary btn-sm btn-warning delete">delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>

<a href="/pasien/form" class="btn btn-primary btn-md">Tambah Data</a>

</x-content>