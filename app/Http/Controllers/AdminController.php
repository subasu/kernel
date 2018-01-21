<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addSlider()
    {
        $pageTitle = 'افزودن گالری تصاویر';
        return view('admin.addSlider', compact($pageTitle));
    }

    public function addSliderPost()
    {

        return response()->json('admin.addNewSlider');
    }

    public function addAboutUs()
    {
        $pageTitle = 'افزودن درباره ی ما';
        return view('admin.addAboutUs', compact($pageTitle));
    }

    public function addAboutUsPost(Request $request)
    {
        $abouts = count(About::all());
//        if ($abouts > 0)
//            About::all()->delete();
//        $aboutUs = new About();
//        $aboutUs->description = $request->description;
//        $res = $aboutUs->save();
//        if ($res == 1)
//            return response()->json('متن شما با مؤفقیت ثبت شد');
//        else
//            return response()->json('متاسفانه متن شما ثبت نشد');
        return response()->json($request->editorText);
    }
}
