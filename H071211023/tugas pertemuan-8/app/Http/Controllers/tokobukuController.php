<?php

namespace App\Http\Controllers;

use App\Models\tokobuku;
use Illuminate\Http\Request;


class tokobukuController extends Controller
{
    public function index()
    {
        return view('tokobuku', [
            'data' => tokobuku::latest()->paginate(10)
        ]);
    }

    public function store(Request $request)
    {

        $book = $request->validate([
            'judul' => ['required', 'max:255'],
            'penerbit' => ['required', 'max:255'],
            'genre' => ['required', 'max:100'],
            'pengarang' => ['required', 'max:100'],
            'isbnbuku' => ['required', 'unique:tokobukus'],
            'harga' => ['required']
        ]);
        tokobuku::create($book);

        return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }
    public function delete($id)
    {
        $singleData = tokobuku::find($id);
        $singleData->delete();
        return redirect()->back()->with('status', 'Berhasil Menghapus Data');
    }
    public function edit($id)
    {
        $singleData = tokobuku::find($id);
        return view('editbuku', [
            'singleData' => $singleData,
        ]);
    }
    public function update(Request $request, $id)
    {
        $singleData = tokobuku::find($id);

        $validation = [
            'judul' => ['required', 'max:255'],
            'penerbit' => ['required', 'max:255'],
            'genre' => ['required', 'max:100'],
            'pengarang' => ['required', 'max:100'],
            'harga' => ['required']
        ];

        if ($request->isbnbuku != $singleData->isbnbuku) {
            $validation['isbnbuku'] = ['required', 'unique:tokobukus'];
        }

        $validationData = $request -> validate($validation);


        $singleData->update($validationData);
        return redirect('/tokobuku')->with('status', 'Berhasil Mengedit Data');
    }
}
