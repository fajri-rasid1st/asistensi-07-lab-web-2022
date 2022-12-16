<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class memberDetailController extends Controller
{
    public function showMemberDetail($id)
    {
        $data = memberDetail::where('author_id', $id)->get();
        return view ('memberDetail');
    }
}
