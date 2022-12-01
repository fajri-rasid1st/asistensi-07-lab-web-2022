<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('index', [
            'members' => Members::latest()->paginate(20),
        ]);
    }

    public function create(Request $request)
    {
        try {
            $member = new Members;
            $member->nama = $request->input("nama");
            $member->akun_fb = $request->input("akun_fb");
            $member->email = $request->input("email");
            $member->regional = $request->input("regional");
            $member->tahun = $request->input("tahun");
            $member->save();
            return redirect('/')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function delete($id)
    {
        try {
            $members = Members::find($id);
            $members->delete();

            return redirect('/')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Data gagal dihapus');
        }
  
    }

    public function update(Request $request, $id)
    {
        try {
            $member = Members::find($id);
            $input = $request->all();
            $member->fill($input)->save();
     
            return redirect('/')->with('success', 'Data berhasil diperbarui');

        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Data gagal diperbarui');
        }
    }
}
