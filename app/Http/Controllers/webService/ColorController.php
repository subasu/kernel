<?php

namespace App\Http\Controllers\webService;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class ColorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }
    //below function is related to return colors management view
//    public function colorsManagement()
//    {
//        if (!$user = JWTAuth::parseToken()->authenticate()) {
//            return response()->json(['msg' => 'User not found !'], 404);
//        } else {
//            $colors = Color::all();
//            return response()->json(['colors' => $colors]);
//        }
//    }

    //below function is related toi edit color title
    public function editColorTitle(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $update        = Color::find($request->id);
            $update->title = trim($request->title);
            $update->save();
            if($update)
            {
                return response()->json(['message' => 'ویرایش با موفقیت انجام شد' , 'code' => '1']);
            }
            else
            {
                return response()->json(['message' => '  خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید ']);
            }
        }
    }

    //below function is related to add new colors
    public function addNewColors(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $count = count($request->color);
            $i = 0;
            while ($i < $count) {
                $newColor = new Color();
                $newColor->title = trim($request->color[$i]);
                $newColor->save();
                $i++;
            }
            if ($newColor) {
                return response()->json(['message' => 'اطلاعات با موفقیت ثبت شد', 'code' => '1']);
            } else {
                return response()->json(['message' => 'خطایی در ثبت اطلاعات رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
        }
    }

    //below function is related to make color enable or disable
    public function enableOrDisableColor(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        }
        else
        {
            $active = Color::where('id',$request->colorId)->value('active');
            switch ($active)
            {
                case 1 :
                    $update = DB::table('colors')->where('id',$request->colorId)->update(['active' => 0 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'رنگ  مورد نظر شما غیر فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('colors')->where('id',$request->colorId)->update(['active' => 1 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'رنگ مورد نظر شما  فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

            }
        }
    }
}
