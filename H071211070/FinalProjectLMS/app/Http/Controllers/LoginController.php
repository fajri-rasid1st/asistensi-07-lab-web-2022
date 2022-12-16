<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
        if ($user = Auth::user()) {
            if ($user->level == '1') {
                return view('admin/home');
            } else {
                if ($user->level == '2') {
                    return view('dosen/');
                } elseif ($user->level == '3') {
                    return view('mahasiswa/');
                }
            }
        }
    }
    public function proses(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username tidak boleh kosong'
            ]

        );

        $kredensial = $request->only('username', 'password');

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == '1') {
                return view('admin/home');
            } else {
                if ($user->level == '2') {
                    return redirect()->intended('Dosen');
                } else {
                    if ($user->level == '2') {
                        return view('dosen/');
                    } elseif ($user->level == '3') {
                        return view('mahasiswa/');
                    }
                }
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Maaf Username atau Password Salah'
        ])->onlyInput('username');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
