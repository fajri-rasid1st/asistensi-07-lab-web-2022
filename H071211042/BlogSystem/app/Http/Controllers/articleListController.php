<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articleList;

class articleListController extends Controller
{
    public function showArticleList()
    {
        $data = articleList::paginate(10);
        return view('articleList')
            -> with(compact('data'));
    }
}
