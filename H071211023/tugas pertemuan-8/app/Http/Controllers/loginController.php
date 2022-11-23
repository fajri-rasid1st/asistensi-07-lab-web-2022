<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function autentikasi(Request $request){
        $credentials = $request->validate([
            'email'=>['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/tokobuku');
        }
        return back()->withErrors('gagal login');

    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect('/login');
    }
    
}
