<x-content>

<h1>Data Pasien</h1>

<table class="table table-bordered text-white" id="dataPs">
    <tr>
        <td>Nama Pasien</td>
        <td>Alamat</td>
        <td>Telepon</td>
        <td>Rumah Sakit &nbsp;
        <select name="filter" id="filterrs">
            <option selected="selected" readonly>filter by</option>
            @foreach($list_rs as $rs)
            <option value="{{$rs->id}}">{{$rs->nama_rs}}</option>
            @endforeach
        </select>
        </td>
        <td>Aksi</td>
    </tr>
<tbody id="filterResults">
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
</tbody>
</table>

<a href="/pasien/form" class="btn btn-primary btn-md">Tambah Data</a>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#dataPs #filterrs').change(function(e){
    e.preventDefault();
    let getValRs = $(this).val();
    // alert(getValRs);
    $('#filterResults').children().remove();
    $.ajax({
        url:'/ajax/pasien/filter',
        type:'post',
        dataType:'json',
        context:this,
        data : {value:getValRs},
        success:function(res){
            // console.log(res);
            $('#filterResults').html(res.html);
        },
        error:function(err){
            console.log(err);
        }

    })
})

</script>

</x-content>