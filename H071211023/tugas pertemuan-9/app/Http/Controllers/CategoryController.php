<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category', [
            "title" => "Category",
            "data" => category::orderBy('updated_at', 'desc')->paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        category::create($request->all());
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => ['required', 'max:5'],
            'status' => ['required', 'max:255'],
        ]);

        category::where('id', $id)->update($validatedData);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data');
    }

    public function delete($id)
    {
        category::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
