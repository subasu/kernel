<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $pageTitle='ورود/عضویت';
        return view('main.login',compact('pageTitle','menu'));
    }
    public function products()
    {
        $menu=Category::where('depth','=','2')->get();
        $pageTitle='لیست محصولات';
        return view('main.products',compact('pageTitle','menu'));
    }

}
