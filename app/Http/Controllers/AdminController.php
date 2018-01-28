<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddNewLogo;
use App\Http\SelfClasses\AddNewSlider;
use App\Http\SelfClasses\CheckFiles;
use App\Models\About;
use App\Models\GoogleMap;
use App\Models\Icon;
use App\Models\Logo;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Psy\Test\Exception\RuntimeExceptionTest;

class AdminController extends Controller
{
    public function addSlider()
    {
        $pageTitle = 'افزودن گالری تصاویر';
        return view('admin.addSlider', compact('pageTitle'));
    }

    //below function is related to add sliders photo
    public function addNewSlider(Request $request)
    {
        $checkFiles = new CheckFiles();
        $result = $checkFiles->checkCategoryFiles($request, 'slider');
        if (is_bool($result)) {
            $addNewSlide = new AddNewSlider();
            $result1 = $addNewSlide->addNewSlide($request);
            if (is_bool($result1)) {
                return response()->json(['message' => 'اطاعات شما با موفقیت ثبت گردید', 'code' => 'success']);
            } else {
                return response()->json(['message' => $result1, 'code' => 'error']);
            }
        } else {
            return response()->json(['message' => $result, 'code' => 'error']);
        }
    }

    public function addAboutUs()
    {
        $pageTitle = 'افزودن درباره ی ما';
        return view('admin.addAboutUs', compact('pageTitle'));
    }

    public function editAboutUs()
    {
        $pageTitle = 'ویرایش درباره ی ما';
        $about = About::latest()->first();
        return view('admin.editAboutUs', compact('pageTitle', 'about'));
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
        $icons = Icon::all();
        $pageTitle = 'افزودن سرویس های سایت';
        return view('admin.addService', compact('pageTitle', 'icons'));
    }

    public function addServicePost(Request $request)
    {
        if (count(Service::all()) >= 6) {
            return response()->json('تعداد سرویس های ثبت شده ی شما بیش از 6 سرویس نمی تواند باشد');
        }
        $services = new Service();
        $services->description = $request->description;
        $services->title = $request->title;
        $services->icon = $request->icon;
        $res = $services->save();
        if ($res == 1)
            return response()->json('سرویس شما با مؤفقیت ثبت شد');
        else
            return response()->json('متاسفانه سرویس شما ثبت نشد');
    }

//below function is related to show edit service page with service details
    public function editService($id)
    {
        $service = Service::find($id);
        return view('admin.editService', compact('service'));
    }

//below function is related to edit service title,description and icon
    public function editServicePost(Request $request)
    {
        if (!(empty($request->icon)))
            $update = Service::where('id', '=', $request->id)
                ->update(['title' => trim($request->title), 'description' => trim($request->description), 'icon' => trim($request->icon)]);
        else
            $update = Service::where('id', '=', $request->id)
                ->update(['title' => trim($request->title), 'description' => trim($request->description)]);
        if ($update) {
            return response()->json(['message' => 'ویرایش با موفقیت انجام شد', 'code' => '1']);
        } else {
            return response()->json(['message' => '  خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید ']);
        }
        $update = Service::find($request->id);
    }
    public function ServicesManagement()
    {
        $services = Service::all();
        $pageTitle = 'ویرایش سرویس های سایت';
        return view('admin.ServicesManagement', compact('pageTitle', 'services'));
    }

    //below function is related to make site service enable or disable
    public function enableOrDisableService(Request $request)
    {
        if (!$request->ajax()) {
            abort(403);
        } else {
            switch ($request->active) {
                case 1 :
                    $update = Service::where('id', '=', $request->id)->update(['active' => 0]);
                    if ($update) {
                        return response()->json(['message' => 'سرویس  مورد نظر شما غیر فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = Service::where('id', '=', $request->id)->update(['active' => 1]);
                    if ($update) {
                        return response()->json(['message' => 'سرویس مورد نظر شما  فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;
            }
        }
    }

    //below function is related to return slider management view
    public function sliderManagement()
    {
        $pageTitle = 'مدیریت اسلایدرها';
        $sliders = Slider::all();
        return view('admin.sliderManagement', compact('pageTitle', 'sliders'));
    }

    //below function is related to return edit slider view
    public function editSlider($id)
    {
        $pageTitle = 'ویرایش اسلایدر';
        $slider = Slider::find($id);
        return view('admin.editSlider', compact('pageTitle', 'slider'));
    }


    //below function is related to edit category picture
    public function editSliderPicture(Request $request)
    {
        $checkFiles = new CheckFiles();
        $result = $checkFiles->checkCategoryFiles($request, 'slider');
        if (is_bool($result)) {
            $slider = Slider::find($request->sliderId);
            $file = $request->file[0];
            $src = $file->getClientOriginalName();
            $file->move('public/dashboard/sliderImages/', $src);
            $slider->image_src = $request->file[0]->getClientOriginalName();
            $slider->save();
            if ($slider) {
                return response()->json('ویرایش با موفقیت انجام گردید');
            }
        } else {
            return response()->json(['message' => $result, 'code' => '1']);
        }
    }

    //below function is related to edit category title
    public function editSliderTitle(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->title = trim($request->title);
        $slider->save();
        if ($slider) {
            return response()->json(['message' => 'ویرایش با موفقیت انجام گردید', 'code' => 1]);
        } else {
            return response()->json(['message' => 'خطایی در عملیات ویرایش رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }
    }

    //below function is related to make categories enable or disable
    public function enableOrDisableSlider(Request $request)
    {
        if (!$request->ajax()) {
            abort(403);
        } else {
            switch ($request->active) {
                case 1 :
                    $update = DB::table('sliders')->where('id', $request->sliderId)->update(['active' => 0]);
                    if ($update) {
                        return response()->json(['message' => 'اسلایدر مورد نظر شما غیر فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('sliders')->where('id', $request->sliderId)->update(['active' => 1]);
                    if ($update) {
                        return response()->json(['message' => 'اسلایدر مورد نظر شما  فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

            }
        }
    }

    public function addLogo()
    {
        $pageTitle = 'ثبت لوگو';
        return view('admin.addLogo', compact('pageTitle'));
    }
    public function editLogo()
    {
        $myLogo=Logo::latest()->first();
        $pageTitle = 'ویرایش لوگو';
        return view('admin.editLogo', compact('pageTitle','myLogo'));
    }

    public function addLogoPost(Request $request)
    {
        $checkFiles = new CheckFiles();
        $result = $checkFiles->checkCategoryFiles($request, 'logo');
        if (is_bool($result)) {
            $addLogo = new AddNewLogo();
            $result1 = $addLogo->addNewLogo($request);
            if (is_bool($result1)) {
                return response()->json(['message' => 'لوگو سایت با موفقیت ثبت گردید', 'code' => 'success']);
            } else {
                return response()->json(['message' => $result1, 'code' => 'error']);
            }
        } else {
            return response()->json(['message' => $checkFiles, 'code' => 'error']);
        }
    }
    public function editLogoPost(Request $request)
    {
        $checkFiles = new CheckFiles();
        $result = $checkFiles->checkCategoryFiles($request, 'logo');
        if (is_bool($result)) {
            $logo = Logo::find($request->logoId);
            $file = $request->file[0];
            $src = $file->getClientOriginalName();
            $file->move('public/dashboard/Logo/', $src);
            $logo->image_src = $request->file[0]->getClientOriginalName();
            if (!empty($request->title))
            {
                $logo->title=$request->title;
            }
            $logo->save();
            if ($logo) {
                return response()->json(['message' => 'ویرایش با موفقیت انجام گردید', 'code' => '1']);
            }
        } else {
            return response()->json(['message' => $result, 'code' => '1']);
        }
    }
    public function addGoogleMap()
    {
        $pageTitle = 'ثبت گوگل مپ';
        return view('admin.addGoogleMap', compact('pageTitle'));
    }
    public function editGoogleMap()
    {
        $myGoogleMap=GoogleMap::latest()->first();
        $pageTitle = 'ویرایش گوگل مپ';
        return view('admin.editGoogleMap', compact('pageTitle','myGoogleMap'));
    }

    public function addGoogleMapPost(Request $request)
    {
        if (!empty($request->iframe_tag)) {
            $count = count(GoogleMap::all());
            if ($count > 0)
                DB::table('google_maps')->truncate();
            $add = new GoogleMap();
            $add->iframe_tag = $request->iframe_tag;
            $add->save();
            if ($add)
                return response()->json(['message' => 'گوگل مپ شما ثبت شد', 'code' => '1']);
            else
                return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }
        return response()->json(['message' => 'وارد کردن آدرس گوگل مپ الزامی است']);

    }
    public function editGoogleMapPost(Request $request)
    {
        if (!empty($request->iframe_tag)) {
            $count = count(GoogleMap::all());
            if ($count > 0)
                DB::table('google_maps')->truncate();
            $add = new GoogleMap();
            $add->iframe_tag = $request->iframe_tag;
            $add->save();
            if ($add)
                return response()->json(['message' => 'گوگل مپ شما ویرایش شد', 'code' => '1']);
            else
                return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }
        return response()->json(['message' => 'وارد کردن آدرس گوگل مپ الزامی است']);

    }
}
