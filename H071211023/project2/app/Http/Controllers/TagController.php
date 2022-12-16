<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('admin/tag/index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('admin/tag/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::create([
            'name' => Str::title($request->name),
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }
    public function edit($id)
    {
        $tags = Tag::select('id', 'name')->whereId($id)->first();
        return view('admin/tag/edit', ['tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::whereId($id)->update([
            'name' => Str::title($request->name),
            'slug' => Str::slug($request->name)

        ]);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data');
    }

    public function destroy($id)
    {
        Tag::whereId($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
