<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    //below function  is related to add new unit counts
    public function addNewUnit(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }else
            {
                $count = count($request->unit);
                // dd($count);
                $i = 0;
                while ($i < $count)
                {
                    $insert = DB::table('unit_counts')->insertGetId
                    ([
                       'title' => trim($request->unit[$i]),
                    ]);
                    $i++;
                }
                if($insert)
                {
                    return response()->json('اطلاعات با موفقیت ثبت شد');
                }
            }
    }

}
