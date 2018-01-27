<?php

namespace App\Http\Controllers\webService;

use App\Models\SubUnitCount;
use App\Models\UnitCount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }
    ////below function is to get main units from database
    public function getMainUnits()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $mainUnits = UnitCount::with('subUnits')->get();
            if (count($mainUnits) > 0) {
                return response()->json(['mainUnits' => $mainUnits]);
            } else {
                return response()->json(0);
            }
        }
    }

    //below function is related to edit unit count title
    public function editUnitCountTitle(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else
        {
            switch ($request->parameter)
            {
                case 'unitCount':
                    $unitCount = UnitCount::find($request->id);
                    $unitCount->title = trim($request->title);
                    $unitCount->save();
                    if($unitCount)
                    {
                        return response()->json(['message' => 'ویرایش با موفقیت انجام گردید' , 'code' => 1 ]);
                    }else
                    {
                        return response()->json(['message' => 'خطایی در عملیات ویرایش رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 'subUnitCount':
                    $unitCount = SubUnitCount::find($request->id);
                    $unitCount->title = trim($request->title);
                    $unitCount->save();
                    if($unitCount)
                    {
                        return response()->json(['message' => 'ویرایش با موفقیت انجام گردید' , 'code' => 1 ]);
                    }else
                    {
                        return response()->json(['message' => 'خطایی در عملیات ویرایش رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;
            }

        }

    }

    //below function is related to make unit counts enable or disable
    public function enableOrDisableUnitCount(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else
        {
            $active = UnitCount::where('id',$request->unitId)->value('active');
            switch ($active)
            {
                case 1 :
                    $update = DB::table('unit_counts')->where('id',$request->unitId)->update(['active' => 0 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'واحد شمارش مورد نظر شما غیر فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;
                case 0 :
                    $update = DB::table('unit_counts')->where('id',$request->unitId)->update(['active' => 1 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'واحد شمارش مورد  نظر شما  فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;
            }
        }
    }

    //below function is related to make sub unit counts enable or disable
    public function enableOrDisableSubUnitCount(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        }
        else
        {
            $active = SubUnitCount::where('id',$request->subUnitId)->value('active');
            switch ($active)
            {
                case 1 :
                    $update = DB::table('sub_unit_counts')->where('id',$request->subUnitId)->update(['active' => 0 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'واحد شمارش مورد نظر شما غیر فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('sub_unit_counts')->where('id',$request->subUnitId)->update(['active' => 1 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'واحد شمارش مورد نظر شما  فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

            }
        }
    }

    //below function  is related to add new unit counts and
    public function addNewUnit(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            //return response()->json('hhhhhhhhhhh');
            if ($request->unitId == '') {
                $count = count($request->unit);
                $i = 0;
                while ($i < $count) {
                    $insert = DB::table('unit_counts')->insertGetId
                    ([
                        'title' => trim($request->unit[$i]),
                    ]);
                    $i++;
                }
                if ($insert) {
                    return response()->json('اطلاعات با موفقیت ثبت شد');
                }
            } else {
                $count = count($request->unit);
                $i = 0;
                while ($i < $count) {
                    $insert = DB::table('sub_unit_counts')->insertGetId
                    ([
                        'title' => trim($request->unit[$i]),
                        'unit_count_id' => $request->unitId,
                    ]);
                    $i++;
                }
                if ($insert) {
                    return response()->json('اطلاعات با موفقیت ثبت شد');
                }
            }

        }
    }
}
