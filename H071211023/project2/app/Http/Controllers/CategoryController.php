<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin/category/index', ['categories' => $categories]);
    }
    
    public function create()
    {
        return view('admin/category/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => Str::title($request->name),
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
        
    }
    public function edit($id)
    {
        $categories = Category::select('id', 'name')->whereId($id)->first();
        return view('admin/category/edit', ['categories' => $categories]);
       
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::whereId($id)->update([
            'name' => Str::title($request->name),
            'slug' => Str::slug($request->name)

        ]);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data');
    }

    public function destroy($id)
    {
        Category::whereId($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
        
    }
}
