<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    $users = user::latest()->paginate(10);
    return view('admin/user/user', compact('users'));
  }
}
