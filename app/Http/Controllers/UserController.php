<?php

namespace App\Http\Controllers;

use App\Events\UserEvent;
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
        auth()->login($user);
        return redirect('/beranda')->with('sukses','selamat datang...');
    }

    public function loginApi(Request $request){
        $inFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($inFields)){
            $user = User::where('username', $inFields['username'])->first();
            $token = $user->createToken('myToken')->plainTextToken;
            return $token;
        }
        return 'maaf terjadi kesalahan';
    }

    public function login(Request $request){
        $inFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(auth()->attempt([
            'username' => $inFields['username'], 'password' => $inFields['password']])){
                $request->session()->regenerate();
                event(new UserEvent([
                    'username' => auth()->user()->username, 'action' => 'login'
                ]));
                return redirect('/beranda')->with('sukses', 'anda berhasil masuk');
            }else{
                return redirect('/')->with('gagal', 'terjadi kesalahan');
            }
    }

    public function logout(){
        event(new UserEvent([
            'username' => auth()->user()->username, 'action' => 'logout'
        ]));
        auth()->logout();
        return redirect('/')->with('sukses','anda telah keluar.');
    }

}
