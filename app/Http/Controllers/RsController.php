<?php

namespace App\Http\Controllers;

use App\Models\Rs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RsController extends Controller
{

    public function view(){
        $data['rumah_sakit'] = Rs::orderBy('id','desc')->paginate(10);
        return view ('rs.list', $data);
    }

    public function store(Request $request){
        // return dd($request);
        $inFields = $request->validate([
            'namaRs' => ['required', 'min:6', 'max:50', Rule::unique('rs','nama_rs')],
            'alamat' => ['required', 'min:10', 'max:50'],
            'email' => ['required', 'email', Rule::unique('rs','email')],
            'telepon' => ['required', 'min:10', 'max:13']
        ]);

        $inFields['nama_rs'] = strip_tags($inFields['namaRs']);
        $inFields['alamat'] = strip_tags($inFields['alamat']);
        $inFields['email'] = strip_tags($inFields['email']);
        $inFields['telepon'] = strip_tags($inFields['telepon']);
        $inFields['user_id'] = auth()->id();

        $rsBaru = Rs::create($inFields);
        return redirect("/beranda")->with('sukses','berhasil menambahkan data');
    }

    public function edit(Rs $rs){
        return view('rs.edit-rs',['rs' => $rs]);
    }

    public function doupdate(Rs $rs, Request $request){
        $inFields = $request->validate([
            'namaRs' => ['required', 'min:6', 'max:50', Rule::unique('rs','nama_rs')->ignore($rs->id)],
            'alamat' => ['required', 'min:10', 'max:50'],
            'email' => ['required', 'email', Rule::unique('rs','email')->ignore($rs->id)],
            'telepon' => ['required', 'min:10', 'max:13']
        ]);

        $inFields['nama_rs'] = strip_tags($inFields['namaRs']);
        $inFields['alamat'] = strip_tags($inFields['alamat']);
        $inFields['email'] = strip_tags($inFields['email']);
        $inFields['telepon'] = strip_tags($inFields['telepon']);

        $rs->update($inFields);
        return redirect("/rs")->with('sukses','data '.$inFields['nama_rs'].' telah diperbarui');
    }

    public function delete(Rs $rs){
        $rs->delete();
        return redirect('/rs');
    }
}
