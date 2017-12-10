<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('layouts.adminLayout');
    }
    public function home()
    {
        $menu=Category::where('depth','=','2')->get();
        $pageTitle='صفحه ی اصلی';
        return view('main.index',compact('pageTitle','menu'));
    }
    public function login()
    {
        $menu=Category::where('depth','=','2')->get();
        $capital=City::where('parent_id','=','1')->get();
        $pageTitle='ورود/عضویت';
        return view('main.login',compact('pageTitle','menu','capital'));
    }
    public function products()
    {
        $menu=Category::where('depth','=','2')->get();
        $pageTitle='لیست محصولات';
        return view('main.products',compact('pageTitle','menu'));
    }
    public function getTown($cid)
    {
        $towns=City::where('parent_id','=',$cid)->value('title');
        return response()->json($towns);
    }
}
