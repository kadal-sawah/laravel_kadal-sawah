@foreach($list_pasien as $ps)
<tr id="dataId-{{$ps->id}}">
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