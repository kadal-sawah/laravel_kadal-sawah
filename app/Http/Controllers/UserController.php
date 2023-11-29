<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function daftar(){
        return view('daftar');
    }

    public function daftarbaru(Request $request){
        // return dd($request);
        $inFields = $request->validate([
            'username' => ['required', 'min:3', Rule::unique('users','username')],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $inFields['password'] = bcrypt($inFields['password']);
        $user = User::create($inFields);
        return redirect('/');
    }

    public function login(Request $request){
        $inFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(auth()->attempt([
            'username' => $inFields['username'], 'password' => $inFields['password']])){
                $request->session()->regenerate();
                return redirect('/beranda');
            }else{
                return redirect('/');
            }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}
