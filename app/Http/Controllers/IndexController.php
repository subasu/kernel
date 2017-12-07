<?php

namespace App\Http\Controllers;

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
        $pageTitle='صفحه ی اصلی';
        return view('main.index',compact('pageTitle'));
    }

}
