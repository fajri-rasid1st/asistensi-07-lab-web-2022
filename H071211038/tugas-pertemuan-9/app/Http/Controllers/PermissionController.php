<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class PermissionController extends Controller
{
    public function indexUseEloquent()
    {
        $permissions = Permission::latest()->paginate(20);
        return view('permission.index')->with('permissions', $permissions);
    }

    public function indexUseQueryBuilder()
    {
        $permissions = DB::table('permissions')->orderByDesc('id')->paginate(20);
        return view('permission.index')->with('permissions', $permissions);
    }

    public function createUseEloquent(Request $request)
    {
        // try {
            date_default_timezone_set('Asia/Singapore');

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'status' => 'required'
            ]);

            Permission::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status
            ]);
            
            return redirect('/permission')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/permission')->with('error', 'Failed to Add New Data');
        // }
    }

    public function createUseQueryBuilder(Request $request)
    {
        // try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);

            $permission = new Permission;

            DB::table('permissions')->insertGetId([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'created_at' => $permission->getUpdatedAtAttribute(Carbon::now()),
                'updated_at' => $permission->getUpdatedAtAttribute(Carbon::now())
            ]);
            return redirect('/permission')->with('success', 'New Data Added Successfully');
        // } catch (\Throwable $th) {
        //     return redirect('/permission')->with('error', 'Failed to Add New Data');
        // }
    }

    public function deleteUseEloquent($id)
    {
        try {
            $permissions = Permission::find($id);
            $permissions->forceDelete();
            return redirect('/permission')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/permission')->with('error', 'Failed to Delete Data');
        }
    }

    public function deleteUseQueryBuilder($id)
    {
        try {
            DB::table('permissions')->where('id', '=', $id)->delete();

            return redirect('/permission')->with('success', 'Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect('/permission')->with('error', 'Failed to Delete Data');
        }
    }

    public function updateUseEloquent(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);

            $permission = Permission::find($id);
            $permission->name = $request->name;
            $permission->description = $request->description;
            $permission->status = $request->status;
            $permission->updated_at = $permission->getUpdatedAtAttribute(Carbon::now());
            $permission->save();
            return redirect('/permission')->with('success', 'Your Data is Updated');

        } catch (\Throwable $th) {
            return redirect('/permission')->with('error', 'Failed to Update Data');
        }
    }

    public function updateUseQueryBuilder(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);

            $permission = new Permission;
    
            DB::table('permissions')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'updated_at' => $permission->getUpdatedAtAttribute(Carbon::now())
            ]);
            return redirect('/permission')->with('success', 'Your Data is Updated');
        } catch (\Throwable $th) {
            return redirect('/permission')->with('error', 'Failed to Update Data');
        }
    }
}
