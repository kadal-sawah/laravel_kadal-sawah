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
            'namaRs' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);

        $inFields['nama_rs'] = strip_tags($inFields['namaRs']);
        $inFields['alamat'] = strip_tags($inFields['alamat']);
        $inFields['email'] = strip_tags($inFields['email']);
        $inFields['telepon'] = strip_tags($inFields['telepon']);
        $inFields['user_id'] = auth()->id();

        $rsBaru = Rs::create($inFields);
        return redirect("/rs");
    }

    public function edit(Rs $rs){
        return view('rs.edit-rs',['rs' => $rs]);
    }

    public function doupdate(Rs $rs, Request $request){
        $inFields = $request->validate([
            'namaRs' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);

        $inFields['nama_rs'] = $inFields['namaRs'];
        $inFields['alamat'] = $inFields['alamat'];
        $inFields['email'] = $inFields['email'];
        $inFields['telepon'] = $inFields['telepon'];

        $rs->update($inFields);
        return redirect("/rs");
    }

    public function delete(Rs $rs){
        $rs->delete();
        return redirect('/rs');
    }
}
