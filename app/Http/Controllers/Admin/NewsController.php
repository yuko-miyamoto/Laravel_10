<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('admin.news.create');
    }

   //以下を追記(Laravel_13)
    public function create(Request $request)
    {
    // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
    
}
