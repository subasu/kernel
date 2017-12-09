<?php

namespace App\Http\Controllers;

use App\Models\UnitCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    //below function  is related to add new unit counts and
    public function addNewUnit(Request $request)
    {
        if (!$request->ajax()) {
            abort(403);
        } else {
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

    //below function returns addUnit blade...
    public function addUnit()
    {
        $pageTitle = 'افزودن واحد های شمارش';
        return view('admin.addUnit',compact('pageTitle'));
    }

    //below function returns unitsManagement blade ...
    public function unitCountManagement()
    {
        $pageTitle = 'مدیریت واحد های شمارش';
        $data=UnitCount::all();
        return view('admin.unitCountManagement',compact('data','pageTitle'));
    }
}
