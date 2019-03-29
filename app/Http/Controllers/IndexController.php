<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 获取正在招标的项目，显示在首页
     */
    public function index()
    {
        $pro = Project::where('status',1)->orderBy('pid','desc')->take(3)->get();
        return view('index',compact('pro'));
    }
}
