<?php

namespace App\Http\Controllers;

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
        return view('admin.addUnit');
    }

    //below function returns unitsManagement blade ...
    public function unitsManagement()
    {
        $data=UnitCount::all();
        return view('admin.unitsManagement',compact('data'));
    }
}
