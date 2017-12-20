<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    // below function is related to return
    public function sizesManagement()
    {
        $pageTitle = 'مدیریت و نمایش سایزها';
        $data = Size::all();
        return view('admin.sizesManagement',compact('data','pageTitle'));
    }

    //below function is related to return view of add size
    public function addSizes()
    {
        $pageTitle = 'افزودن سایز';
        return view('admin.addSizes',compact('pageTitle'));
    }

    //below function is related to add new size in data base
    public function addNewSize(Request $request)
    {
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


    //below function is related to edit size
    public function editSize($id)
    {
        $pageTitle = 'ویرایش سایز';
        $data = Size::where('id',$id)->get();
        if(count($data) > 0)
        {
            return view('admin.editSize',compact('data','pageTitle'));
        }else
        {
            return view('errors.403');
        }
    }

    //below function is related toi edit size title
    public function editSizeTitle(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }else
        {
            $update = DB::table('sizes')->where('id',$request->id)->update(['title' => $request->title]);
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
