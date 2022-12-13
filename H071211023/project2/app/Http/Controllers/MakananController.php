<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanan = makanan::select('nama_makanan', 'slug', 'description', 'price', 'category', 'tag')->latest()->paginate(10);
        return view('admin/makanan/manage', compact('makanan'));
    }
}
