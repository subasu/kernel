<?php

namespace App\Http\Controllers\webService;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }
    // below function is related to return
    public function sizesManagement()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $sizes = Size::all();
            return response()->json(['sizes' => $sizes]);
        }
    }


    //below function is related to add new size in data base
    public function addNewSize(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $count = count($request->size);
            $i = 0;
            while($i < $count)
            {
                $newSize = new Size();
                $newSize->title = trim($request->size[$i]);
                $newSize->save();
                $i++;
            }

            if($newSize)
            {
                return response()->json(['message' => 'اطلاعات با موفقیت ثبت شد', 'code' => '1']);
            }else
            {
                return response()->json(['message' => 'خطایی در ثبت اطلاعات رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
        }
    }


    //below function is related toi edit size title
    public function editSizeTitle(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $update = Size::find($request->id);
            $update->title = trim($request->title);
            $update->save();
            if($update)
            {
                return response()->json(['message' => 'ویرایش با موفقیت انجام شد' , 'code' => '1']);
            }
            else
            {
                return response()->json(['message' => 'خطایی رخ د اده است ، با بخش پشتیبانی تماس بگیرید ']);
            }
        }
    }


    //below function is related to make size enable or disable
    public function enableOrDisableSize(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $active  = Size::where('id',$request->sizeId)->value('active');
            switch ($active)
            {
                case 1 :
                    $update = DB::table('sizes')->where('id',$request->sizeId)->update(['active' => 0 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'سایز  مورد نظر شما غیر فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('sizes')->where('id',$request->sizeId)->update(['active' => 1 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'سایز مورد نظر شما  فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

            }
        }
    }
}
