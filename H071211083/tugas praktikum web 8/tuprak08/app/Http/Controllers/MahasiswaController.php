<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){

        $data = Mahasiswa::latest()->paginate(10);
    
        return view('mahasiswa', ['mahasiswa' => $data]);
    }

    public function insertdata(Request $request) {
        // dd($request->all());
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    // public function tampilkandata($id) {
    //     $data = Mahasiswa::find($id);
    //     // dd($data);
    //     return view ('tampilkan', compact('data'));
    // }

    public function updatedata(Request $request, $id) {
        // $rules = [
        //     'nama' =>['required', 'max:255'],
        //     'alamat' =>['required', 'max:255'],
        //     'fakultas' =>['required'],
        // ];

        $data = Mahasiswa::find($id);

        if ($request->nim != $data->nim) {
            $request->validate([
                'nim' =>  ['required', 'unique:mahasiswas', 'max:8'],
              ]);

            $data->update();
        }   

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id) {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}
