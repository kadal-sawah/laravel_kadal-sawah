<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Rs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    public function view(){
        // $data['list_pasien'] = Pasien::orderBy('id','desc')->paginate(10);
        // $data['list_pasien'] = Pasien::with('rs')->get();
        return view ('pasien.list', [
            'list_pasien' => Pasien::with('rs')->get(),
            'list_rs' => Rs::orderBy('id','desc')->get()
            ]);
    }

    public function showform()
    {
        $data['list_rs'] = Rs::orderBy('id','desc')->get();
        return view('pasien.add-pasien', $data);
        // return dd($data);
    }

    public function store(Request $request){
        // return dd($request);
        $inFields = $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'id_rs'=> 'required'
        ]);

        $inFields['nama_pasien'] = strip_tags($inFields['nama_pasien']);
        $inFields['alamat'] = strip_tags($inFields['alamat']);
        $inFields['telepon'] = strip_tags($inFields['telepon']);
        $inFields['id_rs'] = strip_tags($inFields['id_rs']);
        $inFields['user_id'] = auth()->id();

        $rsBaru = Pasien::create($inFields);
        return redirect("/pasien");
    }

    public function edit(Pasien $pasien){
        // $data['list_rs'] = Rs::orderBy('id','desc')->get();
        return view('pasien.edit-pasien',[
            'pasien' => $pasien, 
            'list_rs' => Rs::orderBy('id','desc')->get()
            ]);
    }

    public function doupdate(Pasien $pasien, Request $request){
        $inFields = $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'id_rs' => 'required',
        ]);

        $inFields['nama_pasien'] = $inFields['nama_pasien'];
        $inFields['alamat'] = $inFields['alamat'];
        $inFields['telepon'] = $inFields['telepon'];
        $inFields['id_rs'] = $inFields['id_rs'];

        $pasien->update($inFields);
        return redirect("/pasien");
    }

    public function delete(Pasien $pasien){
        $pasien->delete();
        return redirect('/pasien');
    }

    public function ajaxfilter(Request $request){
        // return $request['value'];
        $val = $request['value'];
        $list_pasien = Pasien::where('id_rs',$val)->get();
        // return $list_pasien;
        $html = view('pasien\filter-ajax',compact('list_pasien'))->render();

        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'ok'
        ]);
    }
}
