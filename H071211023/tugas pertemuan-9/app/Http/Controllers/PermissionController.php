<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permission', [
            "title" => "Permission",
            "data" => permission::orderBy('updated_at', 'desc')->paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        permission::create($request->all());
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'status' => ['required', 'max:255'],
        ]);

        permission::where('id', $id)->update($validatedData);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data');
        
    }

    public function delete($id)
    {
        permission::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
