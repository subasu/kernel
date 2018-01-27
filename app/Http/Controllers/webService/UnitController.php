<?php

namespace App\Http\Controllers\webService;

use App\Models\SubUnitCount;
use App\Models\UnitCount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

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
}
