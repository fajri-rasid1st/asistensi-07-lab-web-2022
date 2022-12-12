<?php

namespace App\Http\Controllers;

use App\Models\seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return view('seller', [
            "title" => "Seller",
            "data" => seller::orderBy('updated_at', 'desc')->paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'gender' => ['required'],
            'no_hp' => ['required', 'integer', 'numeric', 'digits_between:8,12'],
            'status' => ['required', 'max:255'],
        ]);

        seller::create($validatedData);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'gender' => ['required'],
            'no_hp' => ['required', 'integer', 'numeric', 'digits_between:8,12'],
            'status' => ['required', 'max:255'],
        ]);

        seller::where('id', $id)->update($validatedData);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data');
    }

    public function delete($id)
    {
        seller::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
