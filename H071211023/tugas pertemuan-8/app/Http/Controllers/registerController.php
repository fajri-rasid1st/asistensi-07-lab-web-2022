<?php

namespace App\Http\Controllers;
use App\Models\User;



use Illuminate\Http\Request;

class registerController extends Controller
{
    public function register(){
        return view('register');
    }
    public function validasi(Request $request){
        $validatedData = $request->validate([
            'name'=>['required', 'min:3', 'unique:users', 'max:25'],
            'email'=>['required', 'email:dns', 'unique:users'],
            'password'=>['required', 'min:8']
        ]);
    User::create($validatedData);
    return view('login');
    }
}
