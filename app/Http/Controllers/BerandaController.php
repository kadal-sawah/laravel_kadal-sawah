<?php

namespace App\Http\Controllers;

use App\Models\Rs;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda(){
        return view('user.beranda');
    }
}
