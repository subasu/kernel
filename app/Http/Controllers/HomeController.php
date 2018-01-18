<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function addSlider()
    {
        $pageTitle='افزودن گالری تصاویر';
        return view('admin.addSlider',compact($pageTitle));
    }
    public function addSliderPost()
    {

        return response()->json('admin.addNewSlider');
    }
}
