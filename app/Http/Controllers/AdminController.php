<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function addSlider()
    {
        $pageTitle = 'افزودن گالری تصاویر';
        return view('admin.addSlider', compact($pageTitle));
    }

    //below function is related to add sliders photo
    public function addSliderPost()
    {

        
    }

    public function addAboutUs()
    {
        $pageTitle = 'افزودن درباره ی ما';
        return view('admin.addAboutUs', compact($pageTitle));
    }
    public function editAboutUs()
    {
        $pageTitle = 'ویرایش درباره ی ما';
        $about = About::latest()->first();
        return view('admin.editAboutUs', compact('pageTitle','about'));
    }

    public function addAboutUsPost(Request $request)
    {
        $abouts = count(About::all());
        if ($abouts > 0)
            DB::table('abouts')->truncate();
        $aboutUs = new About();
        $aboutUs->description = $request->description;
        $res = $aboutUs->save();
        if ($res == 1)
            return response()->json('متن شما با مؤفقیت ثبت شد');
        else
            return response()->json('متاسفانه متن شما ثبت نشد');
    }
    public function editAboutUsPost(Request $request)
    {
        $abouts = count(About::all());
        if ($abouts > 0)
            DB::table('abouts')->truncate();
        $aboutUs = About::find($request->id);
        $aboutUs->description = $request->description;
        $res = $aboutUs->save();
        if ($res == 1)
            return response()->json('متن شما با مؤفقیت ویرایش شد');
        else
            return response()->json('متاسفانه متن شما ویرایش نشد');
    }
    public function addService()
    {
        $icons=Icon::all();
        $pageTitle = 'افزودن سرویس های سایت';
        return view('admin.addService', compact('pageTitle' , 'icons'));
    }

}
