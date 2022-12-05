<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class CategoryController extends Controller
{

    public function indexUseQueryBuilder()
    {
        $categories = DB::table('categories')->orderByDesc('id')->paginate(20);
        return view("category.index")->with("categories", $categories);
    }

    public function indexUseEloquent()
    {
        $categories = Category::latest()->paginate(20);

        return view("category.index")->with("categories", $categories);
    }

    public function createUseEloquent(Request $request)
    {
        // try {
            date_default_timezone_set('Asia/Singapore');

            $request->validate([
                'name' => 'required',
                'status' => 'required'
            ]);
            
            Category::create([
                'name' => $request->name,
                'status' => $request->status
            ]);
            return redirect('/category')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/category')->with('error', 'Failed to Add New Data');
        // }
    }

    public function createUseQueryBuilder(Request $request)
    {
        // try {
            $request->validate([
                'name' => 'required',
                'status' => 'required'
            ]);
            
            $category = new Category;

            DB::table('categories')->insertGetId([
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => $category->getCreatedAtAttribute(Carbon::now()),
                'created_at' => $category->getUpdatedAtAttribute(Carbon::now())
            ]);
            return redirect('/category')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/category')->with('error', 'Failed to Add New Data');
        // }
    }

    public function deleteUseEloquent($id)
    {
        try {
            $categories = Category::find($id);
            $categories->forceDelete();
            return redirect('/category')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/category')->with('error', 'Failed to Delete Data');
        }
    }

    public function deleteUseQueryBuilder($id)
    {
        try {
            DB::table('categories')->where('id', '=', $id)->delete();

            return redirect('/category')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/category')->with('error', 'Failed to Delete Data');
        }
    }

    public function updateUseEloquent(Request $request, $id)
    {
        try {
            date_default_timezone_set('Asia/Singapore');

            $request->validate([
                'name' => 'required',
                'status' => 'required',
            ]);
    
            $category = Category::find($id);
            $category->name = $request->name;
            $category->status = $request->status;
            $category->updated_at = $category->getUpdatedAtAttribute(Carbon::now());
            $category->save();
     
            return redirect('/category')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/category')->with('error', 'Failed to Update Data');
        }
    }

    public function updateUseQueryBuilder(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'status' => 'required',
            ]);
            
            $category = new Category;

            DB::table('categories')->where('id', $id)->update([
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => $category->getUpdatedAtAttribute(Carbon::now())
            ]);
     
            return redirect('/category')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/category')->with('error', 'Failed to Update Data');
        }
    }
}
