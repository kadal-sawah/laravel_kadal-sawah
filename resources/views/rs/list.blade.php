<x-content>

<h1>Data RS</h1>

<table class="table table-bordered text-white" id="dataRs">
    <tr>
        <td>Nama RS</td>
        <td>Alamat</td>
        <td>Email</td>
        <td>Telepon</td>
        <td>Aksi</td>
    </tr>
@foreach($rumah_sakit as $rs)
    <tr>
        <td>{{$rs->nama_rs}}</td>
        <td>{{$rs->alamat}}</td>
        <td>{{$rs->email}}</td>
        <td>{{$rs->telepon}}</td>
        <td>
            <a href="/editrs/{{$rs->id}}" class="btn btn-secondary btn-sm edit">edit</a>
            <form action="/deleters/{{$rs->id}}" method="post">
            @csrf
            @method('DELETE')
                <button class="btn btn-secondary btn-sm btn-warning delete">delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>

<a href="/beranda" class="btn btn-primary btn-md">Tambah Data</a>

</x-content>