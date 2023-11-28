<?php

namespace App\Http\Controllers;

use App\Models\Rs;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda(){
        return view('user.beranda');
    }

    public function viewrs(){
        $data['rumah_sakit'] = Rs::orderBy('id','desc')->paginate(10);
        return view ('rs.list', $data);
    }
}
