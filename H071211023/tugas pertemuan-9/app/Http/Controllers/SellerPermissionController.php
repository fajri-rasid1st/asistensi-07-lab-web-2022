<?php

namespace App\Http\Controllers;

use App\Models\seller_permission;
use App\Models\seller;
use App\Models\permission;
use Illuminate\Http\Request;

class SellerPermissionController extends Controller
{
    public function index()
    {
        $seler = seller::all();
        $perm = permission::all();
        $selperm = seller_permission::with('seller', 'permission')->get();
        return view('seller_permission', [
            "title" => "Seller Permission",
            "data" => seller_permission::orderBy('updated_at', 'desc')->paginate(2)
        ], compact('seler', 'perm', 'selperm'));
    }

    
    public function store(Request $request)
    {
        seller_permission::create($request->all());
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'seller_id' => ['required'],
            'permission_id' => ['required'],
        ]);

        seller_permission::where('id', $id)->update($validatedData);
        return redirect()->back()->with('success', 'Berhasil Mengupdate Data');
    }

    public function delete($id)
    {
        seller_permission::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
