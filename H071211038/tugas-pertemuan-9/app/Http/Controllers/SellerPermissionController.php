<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellerPermission;
use App\Models\Seller;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class SellerPermissionController extends Controller
{
    public function indexUseEloquent()
    {
        $sellerPermissions = SellerPermission::paginate(20);
        $sellers = Seller::pluck('name', 'id');
        $permissions = Permission::pluck('name', 'id');

        return view('seller-permission.index')
        ->with('sellerPermissions', $sellerPermissions)
        ->with('sellers', $sellers)
        ->with('permissions', $permissions);
    }

    public function indexUseQueryBuilder()
    {
        $sellerPermissions = DB::table('seller_permissions')->orderByDesc('id')->paginate(20);
        $sellers = Seller::pluck('name', 'id');
        $permissions = Permission::pluck('name', 'id');
        return view('seller-permission.index')
        ->with('sellerPermissions', $sellerPermissions)
        ->with('sellers', $sellers)
        ->with('permissions', $permissions);
    }

    public function createUseEloquent(Request $request)
    {
        // try {
            $request->validate([
                'seller' => 'required',
                'permission' => 'required',
            ]);

            $seller = Seller::findOrFail($request->seller);
            
            SellerPermission::create([
                'seller_id' => $request->seller,
                'permission_id' => $request->permission
            ]);
            
            $seller->permission();
            return redirect('/seller-permission')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/seller-permission')->with('error', 'Failed to Add New Data');
        // }
    }

    public function createUseQueryBuilder(Request $request)
    {
        // try {
            $request->validate([
                'seller' => 'required',
                'permission' => 'required'
            ]);

            DB::table('seller_permissions')->insertGetId([
                'seller_id' => $request->seller,
                'permission_id' => $request->permission
            ]);
            return redirect('/seller-permission')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/seller-permission')->with('error', 'Failed to Add New Data');
        // }
    }

    public function deleteUseEloquent($id)
    {
        try {
            $sellerPermissions = SellerPermission::find($id);
            $sellerPermissions->forceDelete();
            return redirect('/seller-permission')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/seller-permission')->with('error', 'Failed to Delete Data');
        }
  
    }

    public function deleteUseQueryBuilder($id)
    {
        try {
            DB::table('sellerpermissions')->where('id', '=', $id)->delete();
            return redirect('/seller-permission')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/seller-permission')->with('error', 'Failed to Delete Data');
        }
  
    }

    public function updateUseEloquent(Request $request, $id)
    {
        try {
            $request->validate([
                'seller_id' => 'required',
                'permission_id' => 'required'
            ]);

            $sellerPermission = SellerPermission::find($id);
            $sellerPermission->seller_id = $request->seller_id;
            $sellerPermission->permission_id = $request->permission_id;
            $sellerPermission->save();
            return redirect('/seller-permission')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/seller-permission')->with('error', 'Failed to Update Data');
        }
    }

    public function updateUseQueryBuilder(Request $request, $id)
    {
        try {
            $request->validate([
                'seller_id' => 'required',
                'permission_id' => 'required'
            ]);

            DB::table('sellerpermissions')->where('id', '=', $id)->update([
                'seller_id' => $request->seller_id,
                'permission_id' => $request->permission_id
            ]);
     
            return redirect('/seller-permission')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/seller-permission')->with('error', 'Failed to Update Data');
        }
    }
}
