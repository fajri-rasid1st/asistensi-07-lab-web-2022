<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class ProductController extends Controller
{
    public function indexUseEloquent()
    {
        $products = Product::latest()->paginate(20);
        $categories = Category::pluck('name', 'id');
        $sellers = Seller::pluck('name', 'id');
        return view('product.index')
        ->with('products', $products)
        ->with('categories', $categories)
        ->with('sellers', $sellers);
    }

    public function indexUseQueryBuilder()
    {
        $products = DB::table('products')->orderByDesc('id')->paginate(20);
        $categories = Category::pluck('name', 'id');
        $sellers = Seller::pluck('name', 'id');
        return view('product.index')
        ->with('products', $products)
        ->with('categories', $categories)
        ->with('sellers', $sellers);
    }
    
    public function createUseEloquent(Request $request)
    {
        // try {
            date_default_timezone_set('Asia/Singapore');
            
            $request->validate([
                'name' => 'required',
                'seller' => 'required',
                'category' => 'required',
                'price' => 'required',
                'status' => 'required'
            ]);

            $seller = Seller::findOrFail($request->seller);
            $product = New Product;
            $product->setNameAttribute($request->name);
            
            Product::create([
                'name' => $request->name,
                'seller_id' => $request->seller,
                'category_id' => $request->category,
                'price' => $request->price,
                'status' => $request->status,
            ]);

            $seller->product();

            return redirect('/product')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/product')->with('error', 'Failed to Add New Data');
        // }
    }

    public function createUseQueryBuilder(Request $request)
    {
        // try {
            $request->validate([
                'name' => 'required',
                'seller' => 'required',
                'category' => 'required',
                'price' => 'required',
                'status' => 'required'
            ]);

            $seller = Seller::findOrFail($request->seller);

            $product = New Product;
            $product->setNameAttribute($request->name);

            DB::table('products')->insertGetId([
                'name' => $request->name,
                'seller_id' => $request->seller,
                'category_id' => $request->category,
                'price' => $request->price,
                'status' => $request->status,
                'created_at' => $product->getCreatedAtAttribute(Carbon::now()),
                'updated_at' => $product->getUpdatedAtAttribute(Carbon::now())
            ]);

            $seller->product();
            return redirect('/product')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/product')->with('error', 'Failed to Add New Data');
        // }
    }

    public function deleteUseEloquent($id)
    {
        try {
            $products = Product::find($id);
            $products->forceDelete();
            return redirect('/product')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/product')->with('error', 'Failed to Delete Data');
        }  
    }

    public function deleteUseQueryBuilder($id)
    {
        try {
            DB::table('products')->where('id', '=', $id)->delete();

            return redirect('/product')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/product')->with('error', 'Failed to Delete Data');
        }  
    }

    public function updateUseEloquent(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'seller_id' => 'required',
                'category_id' => 'required',
                'price' => 'required',
                'status' => 'required'
            ]);
            
            $product = Product::find($id);
            $product->setNameAttribute($request->name);
            $product->name = $request->name;
            $product->seller_id = $request->seller_id;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->updated_at = $product->getUpdatedAtAttribute(Carbon::now());

            $product->save();

            return redirect('/product')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/product')->with('error', 'Failed to Update Data');
        }
    }

    public function updateUseQueryBuilder(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'seller_id' => 'required',
                'category_id' => 'required',
                'price' => 'required',
                'status' => 'required'
            ]);

            DB::table('products')->where('id', $id)->update([
                'name' => $request->name,
                'seller_id' => $request->seller_id,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);

            return redirect('/product')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/product')->with('error', 'Failed to Update Data');
        }
    }
}
