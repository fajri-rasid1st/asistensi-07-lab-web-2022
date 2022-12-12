<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller{
    public function index() {
        $data = Mahasiswa::latest()->paginate(7);
        return view('index', compact('data'));
    }

    public function tambah() {
        return view('tambah');
    }

    public function tambahdata(Request $request) {
        // dd($request->all());
        Mahasiswa::create($request->all()); //
        return redirect()->route('index')->with('toast_success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $data = Mahasiswa::find($id);
        // dd($data);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = Mahasiswa::find($id);
        $validated = $request->validate([
        'nim' => 'unique:mahasiswas,nim',
        'nama' => 'required',
        'alamat' => 'required'
        ],
        [
        'nim.required' => 'NIM tidak boleh kosong!',
        'nim.unique' => 'NIM telah ada!',
        'nama.required' => 'Nama tidak boleh kosong!',
        'alamat.required' => 'Alamat tidak boleh kosong!'
        ]);
        $data->update($request->all());

        return redirect()->route('index')->with('toast_success', 'Data berhasil diupdate');
    }

    public function delete($id) {
        $data = Mahasiswa::find($id);
        $data->delete();

        return redirect()->route('index')->with('toast_success', 'Data berhasil dihapus');
    }
}