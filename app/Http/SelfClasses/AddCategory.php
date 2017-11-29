<?php

namespace App\Http\SelfClasses;

use App\Http\Requests\CategoryFilesValidate;
use App\Models\Categories;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AddCategory
{
    //below function is related to add categories
    public function addNewCategory($category,$request)
    {
        //the below block of code is related to step one that shop manager wants to register main categories
        if($request->mainId == '' && $request->subId == '')
        {
            $count = count($category);
            // dd($count);
            $i = 0;
            while($i < $count)
            {
                    $categories = new Category();
                    $categories->title = $category[$i];
                    if(!empty($request->file[$i]))
                    {
                        $file = $request->file[$i];
                        $src  = $file->getClientOriginalName();
                        $file->move( 'public/dashboard/image/' , $src);
                        $categories->image_src = $src;
                    }
                    $categories->parent_id = 0;
                    $categories->save();
                $i++;
                if($i == $count)
                {
                    if($categories)
                    {
                        return('اطلاعات با موفقیت ثبت گردید ، لطفا جهت ثبت دسته های جدید ابتدا دسته های موجود را بررسی نمایید  در صورت عدم وجود دسته مورد نظر دکمه ثبت دسته  جدید را بزنید');
                    }else
                    {
                        return('در ثبت اطلاعات خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید');
                    }
                }
            }
        }

        //the below block of code is related to step two that shop manager wants to register sub categories
        if($request->mainId != '' && $request->subId == '')
        {
            $count = count($category);
            // dd($count);
            $i = 0;
            while($i < $count)
            {
                $categories = new Category();
                $categories->title = $category[$i];
                if(!empty($request->file[$i]))
                {
                    $file = $request->file[$i];
                    $src  = $file->getClientOriginalName();
                    $file->move( 'public/dashboard/image/' , $src);
                    $categories->image_src = $src;
                }
                $categories->parent_id = $request->mainId;
                $categories->save();
                $i++;
                if($i == $count)
                {
                    if($categories)
                    {
                        return('اطلاعات با موفقیت ثبت گردید ، لطفا جهت ثبت دسته های جدید ابتدا دسته های موجود را بررسی نمایید  در صورت عدم وجود دسته مورد نظر دکمه ثبت دسته  جدید را بزنید');
                    }else
                    {
                        return('در ثبت اطلاعات خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید');
                    }
                }
            }
        }
    }
}

