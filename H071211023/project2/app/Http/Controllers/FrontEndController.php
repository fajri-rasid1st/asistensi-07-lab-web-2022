<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('FrontEnd.master');
    }

    public function redirects()
    {
        $is_admin= Auth::user()->is_admin;
        if ($is_admin=='1')
        {
            return view('admin.dashboard');
        }
        else
        {
            return view('FrontEnd.include.home');
        }
    }
}
