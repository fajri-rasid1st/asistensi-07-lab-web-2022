<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    // $users = user::all();
    $users = User::latest()->paginate(10);
    return view('admin/user/index', ['users' => $users]);
  }
  
  public function destroy($id)
  {
    User::whereId($id)->delete();
    return redirect()->back()->with('success', 'Berhasil Menghapus Data');
  }
}
