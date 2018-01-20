<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addSlider()
    {
        $pageTitle='افزودن گالری تصاویر';
        return view('admin.addSlider',compact($pageTitle));
    }
    public function addSliderPost()
    {

        return response()->json('admin.addNewSlider');
    }
    public function addAboutUs()
    {
        $pageTitle='افزودن درباره ی ما';
        return view('admin.addAboutUs',compact($pageTitle));
    }
    public function addAboutUsPost()
    {

        return response()->json('admin.addNewSlider');
    }
}
