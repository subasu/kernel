<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    //below function is related to return colors management view
    public function colorsManagement()
    {
        $pageTitle = 'مدیریت و نمایش رنگها';
        $data = Color::all();
        return view('admin.colorsManagement',compact('data','pageTitle'));
    }

    //below function is related to return add colors view
    public function addColors()
    {
        $pageTitle = 'افزودن رنگها';
        return view('admin.addColors',compact('pageTitle'));
    }

    //below function is related to add new colors
    public function addNewColors(Request $request)
    {
        $count = count($request->color);
        $i = 0;
        while($i < $count)
        {
            $newColor = new Color();
            $newColor->title = trim($request->color[$i]);
            $newColor->save();
            $i++;
        }

        if($newColor)
        {
            return response()->json(['message' => 'اطلاعات با موفقیت ثبت شد', 'code' => '1']);
        }else
            {
                return response()->json(['message' => 'خطایی در ثبت اطلاعات رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
    }


    //below function is related to edit color
    public function editColor($id)
    {
        $pageTitle = 'ویرایش رنگ';
        $data = Color::where('id',$id)->get();
        if(count($data) > 0)
        {
            return view('admin.editColor',compact('data','pageTitle'));
        }else
            {
                return view('errors.403');
            }
    }

    //below function is related toi edit color title
    public function editColorTitle(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }else
            {
                $update = DB::table('colors')->where('id',$request->id)->update(['title' => $request->title]);
                if($update)
                {
                    return response()->json(['message' => 'ویرایش با موفقیت انجام شد' , 'code' => '1']);
                }
                else
                    {
                        return response()->json(['message' => 'با توجه به اینکه هیچ تغییری اعمال نکردید ، ویرایش انجام نشد']);
                    }
            }
    }
}
