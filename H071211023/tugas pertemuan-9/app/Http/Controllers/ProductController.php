<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\seller;
use App\Models\category;

class ProductController extends Controller
{
    public function index()
    {
        $seler = seller::all();
        $kategori = category::all();
        $produk = product::with('seller', 'category')->get();
        return view('product', [
            "data" => product::orderBy('updated_at', 'desc')->paginate(10),
            "title" => 'Product',
        ], compact('seler', 'kategori', 'produk'));
    }

    public function store(Request $request)
    {
        product::create($request->all());
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'seller_id' => ['required'],
            'category_id' => ['required'],
            'price' => ['required', 'integer', 'numeric'],
            'status' => ['required', 'max:255'],
        ]);

        product::where('id', $id)->update($validatedData);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data');
    }

    public function delete($id)
    {
        product::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
