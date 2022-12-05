<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SellerController extends Controller
{
    public function indexUseQueryBuilder()
    {
        $sellers = DB::table('sellers')->orderByDesc('id')->paginate(20);
        return view('seller.index')->with('sellers', $sellers);
    }

    public function indexUseEloquent()
    {
        $sellers = seller::latest()->paginate(20);
        return view('seller.index')->with('sellers', $sellers);
    }

    public function createUseEloquent(Request $request)
    {
        // try {
            date_default_timezone_set('Asia/Singapore');

            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'no_hp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'status' => 'required',
            ]);

            Seller::create([
                'name' => $request->name,
                'address' => $request->address,
                'gender' => $request->gender,
                'no_hp' => $request->no_hp,
                'status' => $request->status
            ]);
            return redirect('/seller')->with('success', 'New Data Added Successfully');    
        // } catch (\Throwable $th) {
        //     return redirect('/seller')->with('error', 'Failed to Add New Data');
        // }
    }


    public function createUseQueryBuilder(Request $request)
    {
        // try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'no_hp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'status' => 'required',
            ]);

            $seller = new Seller;

            DB::table('sellers')->insertGetId([
                'name' => $request->name,
                'address' => $request->address,
                'gender' => $request->gender,
                'no_hp' => $request->no_hp,
                'status' => $request->status,
                'created_at' => $seller->getCreatedAtAttribute(Carbon::now()),
                'updated_at' => $seller->getUpdatedAtAttribute(Carbon::now())
            ]);
            return redirect('/seller')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/seller')->with('error', 'Failed to Add New Data');
        // }
    }

    public function deleteUseEloquent($id)
    {
        try {
            $seller = Seller::find($id);
            $seller->forceDelete();
            return redirect('/seller')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/seller')->with('error', 'Failed to Delete Data');
        }
  
    }

    public function deleteUseQueryBuilder($id)
    {
        try {
            DB::table('sellers')->where('id', '=', $id)->delete();

            return redirect('/seller')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/seller')->with('error', 'Failed to Delete Data');
        }
    }

    public function updateUseEloquent(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'no_hp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'status' => 'required',
            ]);

            $seller = Seller::find($id);
            $seller->name = $request->name;
            $seller->address = $request->address;
            $seller->gender = $request->gender;
            $seller->no_hp = $request->no_hp;            
            $seller->status = $request->status;
            $seller->updated_at = $seller->getUpdatedAtAttribute(Carbon::now());
            $seller->save();

            return redirect('/seller')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/seller')->with('error', 'Failed to Update Data');
        }
    }

    public function updateUseQueryBuilder(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'no_hp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'status' => 'required',
            ]);
            
            $seller = new Seller;

            DB::table('sellers')->where('id', '=', $id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'gender' => $request->gender,
                'no_hp' => $request->no_hp,
                'status' => $request->status,
                'updated_at' => $seller->getUpdatedAtAttribute(Carbon::now())
            ]);
            return redirect('/seller')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/seller')->with('error', 'Failed to Update Data');
        }
    }
}