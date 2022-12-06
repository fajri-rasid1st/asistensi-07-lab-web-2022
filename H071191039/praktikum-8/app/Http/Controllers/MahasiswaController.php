<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        // $test = DB::table('mahasiswas');
        // $mahasiswas = Mahasiswa::orderBy('id')->paginate(10);
        // dd($mahasiswas);
        // dump($mahasiswas); 
        // dd(DB::table('mahasiswas')->select('fakkultas')->get());
        return view('index', [
            'mahasiswa' => /* $mahasiswas */ DB::table('mahasiswas')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        // dd(Mahasiswa::find($id));
        return view('add', [
            'mahasiswas' => Mahasiswa::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Mahasiswa::find($id)->update($request->all());

        return redirect('/');
    }


    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'nama' => 'required|max:255',
            'nim' => 'required|max:255',
            'alamat' => 'required|max:255',
            'fakultas' => 'required|max:255',
        ]);

        Mahasiswa::create($validated_data);

        return redirect('/');
    }

    public function destroy($id)
    {
        $data = Mahasiswa::destroy($id);

        return redirect('/');
    }
}
