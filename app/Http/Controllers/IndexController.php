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
        return view('layouts.main');
    }
    public function addCategory()
    {
        return view('admin.addCategory');
    }
}
