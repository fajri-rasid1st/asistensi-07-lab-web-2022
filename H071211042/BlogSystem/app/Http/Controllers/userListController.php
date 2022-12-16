<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userList;


class userListController extends Controller
{
    public function showUserList()
    {
        $data = userList::paginate(10);
        return view('member/userList')->with(compact('data'));
    }
}
