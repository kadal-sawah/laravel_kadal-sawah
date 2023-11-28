<?php

namespace App\Http\Controllers;

use App\Models\Rs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RsController extends Controller
{
    public function tambahrs(Request $request){
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
        return redirect("/beranda");
    }
}
