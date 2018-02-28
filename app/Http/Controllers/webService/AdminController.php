<?php

namespace App\Http\Controllers\webService;

use App\Http\Requests\AboutUsValidation;
use App\Http\Requests\ServiceValidation;
use App\Http\Requests\TitleValidation;
use App\Http\SelfClasses\AddNewLogo;
use App\Http\SelfClasses\AddNewSlider;
use App\Http\SelfClasses\CheckFiles;
use App\Models\About;
use App\Models\GoogleMap;
use App\Models\Logo;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class AdminController extends Controller
{
    //
    //below function is related to add sliders photo
    public function addNewSlider(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
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
    }

    //below function is related to return all sliders info
    public function sliderManagement()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $sliders = Slider::all();
         return response()->json(['sliders' => $sliders]);
        }
    }

    //below function is related to return edit slider
    public function editSlider($id)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $slider = Slider::find($id);
            return response()->json(['sliderInfo' => $slider]);
        }
    }

    //below function is related to edit slider title
    public function editSliderTitle(TitleValidation $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $slider = Slider::find($request->id);
            $slider->title = trim($request->title);
            $slider->save();
            if ($slider) {
                return response()->json(['message' => 'ویرایش با موفقیت انجام گردید', 'code' => 'success']);
            } else {
                return response()->json(['message' => 'خطایی در عملیات ویرایش رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
        }
    }

    //below function is related to edit slider picture
    public function editSliderPicture(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
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
                    return response()->json(['message' => 'ویرایش با موفقیت انجام گردید', 'code' => 'success']);
                }
            } else {
                return response()->json(['message' => $result, 'code' => '1']);
            }
        }
    }

    //below function is related to make sliders enable or disable
    public function enableOrDisableSlider(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $active = DB::table('sliders')->where('id',$request->sliderId)->value('active');
            switch ($active) {
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

    //add new post
    public function addLogoPost(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
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
    }

    public function editLogo()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $myLogo = Logo::latest()->first();
            return response()->json(['logoInfo' => $myLogo]);
        }
    }

    //below function is related to add services
    public function addServicePost(ServiceValidation $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            if (count(Service::all()) >= 6) {
                return response()->json('تعداد سرویس های ثبت شده ی شما بیش از 6 سرویس نمی تواند باشد');
            }
            $services = new Service();
            $services->description = $request->description;
            $services->title = $request->title;
            $services->icon = $request->icon;
            $res = $services->save();
            if ($res == 1)
                return response()->json(['message' => 'سرویس شما با مؤفقیت ثبت شد', 'code' => 'success']);
            else
                return response()->json(['message' => 'متاسفانه سرویس شما ثبت نشد', 'code' => 'error']);
        }
    }

    //below function is related to show all services to client
    public function ServicesManagement()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $services = Service::all();
            if(count($services) > 0)
            {
                return response()->json(['services' => $services]);
            }else
                {
                    return response()->json(['message' => 'no match found']);
                }
        }
    }

    //below function is related to show service info to client
    public function editService($id)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $service = Service::find($id);
            return response()->json(['serviceInfo' => $service]);
        }
    }

    public function editServicePost(ServiceValidation $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else{
            $update =  Service::find($request->id);
            $update->description = trim($request->description);
            $update->title       = trim($request->title);
            $update->icon        = trim($request->icon);
            $update->save();
            if($update)
            {
                return response()->json(['message' => 'ویرایش با موفقیت انجام شد' , 'code' => 'success']);
            }else
                {
                    return response()->json(['message' => ' خطایی رخ داده است' , 'code' => 'error']);
                }
        }
    }

    //below function is related to make site service enable or disable
    public function enableOrDisableService(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else{
            $active = Service::where('id',$request->serviceId)->value('active');
            switch ($active) {
                case 1 :
                    $update = Service::where('id', '=', $request->serviceId)->update(['active' => 0]);
                    if ($update) {
                        return response()->json(['message' => 'سرویس  مورد نظر شما غیر فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = Service::where('id', '=', $request->serviceId)->update(['active' => 1]);
                    if ($update) {
                        return response()->json(['message' => 'سرویس مورد نظر شما  فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;
            }
        }
    }


    public function editAboutUs()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $about = About::latest()->first();
            if(count($about) > 0)
            {
                return response()->json(['aboutInfo' => $about]);
            }else
                {
                    return response()->json(['message' => 'no match found']);
                }

        }
    }

    public function addAboutUsPost(AboutUsValidation $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $abouts = count(About::all());
            if ($abouts > 0)
                DB::table('abouts')->truncate();
            $aboutUs = new About();
            $aboutUs->description = $request->description;
            $res = $aboutUs->save();
            if ($res == 1)
                return response()->json(['message' => 'متن شما با مؤفقیت ثبت شد' , 'code' => 'success']);
            else
                return response()->json(['message' => 'متاسفانه متن شما ثبت نشد' , 'code' => 'error']);
        }
    }

    public function editAboutUsPost(AboutUsValidation $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $aboutUs = About::find($request->id);
            $aboutUs->description = $request->description;
            $res = $aboutUs->save();
            if ($res)
                return response()->json(['message' => 'متن شما با مؤفقیت ویرایش شد' , 'code' => 'success']);
            else
                return response()->json(['message' => 'متاسفانه متن شما ویرایش نشد' , 'code' => 'error']);
        }
    }

    public function editGoogleMap()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $myGoogleMap = GoogleMap::latest()->first();
            return response()->json(['googleMapInfo' => $myGoogleMap]);
        }
    }

    public function addGoogleMapPost(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
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

    }
    public function editGoogleMapPost(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
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
}
