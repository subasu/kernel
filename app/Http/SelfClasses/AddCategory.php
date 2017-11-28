<?php

namespace App\Http\SelfClasses;

use App\Http\Requests\CategoryFilesValidate;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class AddCategory
{
    //

     public function checkCategoryFiles($request)
    {
        if($request->hasFile('file'))
        {
            $allowedExtension = ['png','jpg'];
            foreach ($request->file as $file)
            {
                if(!in_array($file->getClientOriginalExtension(),$allowedExtension))
                {
                    if($file->getClientSize() < 150000)
                    {
                        return true;
                    }else
                    {
                        return false;

                    }
                }else
                {
                    return false;

                }

            }

        }

//                $extension = $request->image->getClientOriginalExtension();
//                $size      = $request->image->getClientSize();

    }

    //
    public function addNewCategory($category,$request)
    {
//        $checkDbNotToBeNull = DB::table('categories')->first();
//        $counter = 0;
//        if(count($checkDbNotToBeNull) > 0)
//        {
//            $latestCategory  = DB::table('categories')->select('id')->orderBy('id', 'DESC')->first();
//            $counter += $latestCategory->id;
//        }
        $count = count($category);
       // dd($count);
        $i = 0;

        while($i < $count)
        {
            $file = $request->file[$i];
            $src  = $file->getClientOriginalName();
            $file->move( 'public/dashboard/image/' , $src);
            //$fileExistence = public_path().'public/dashboard/image/'.$src;
//            if($fileExistence)
//            {
                $insert = DB::table('categories')->insert
                ([
                    'title'     => $category[$i],
                    'image_src' => $src,
                    'parent_id' => 0
                ]);
                $i++;

//            }else
//                {
//                    print ('مشکلی در ذخیره سازی فایل رخ داده است ، تماس با بخش پشتیبانی');
//                }

        }
//        $newCategories = DB::table('categories')->select('id')->where('id', '>' ,$counter)->get();
//        $len=count($newCategories);
//        $len1= $len;
//        foreach ($newCategories as $newCategory)
//        {
//            if($len == $len1)
//            {
//                   $update = DB::table('categories')->where('id',$newCategory->id)->update(['parent_id' => 0]);
//            }else
//                {
//                    $update1 = DB::table('categories')->where('id',$newCategory->id)->update(['parent_id' => $newCategory->id-1]);
//                }
//            $len--;
//        }
        if($insert)
        {
            print('اطلاعات با موفقیت ثبت گردید ، لطفا جهت ثبت دسته های جدید ابتدا دسته های موجود را بررسی نمایید  در صورت عدم وجود دسته مورد نظر دکمه ثبت دسته  جدید را بزنید');
        }else
            {
                print('در ثبت اطلاعات خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید');
            }

    }
}

