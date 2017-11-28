<?php

namespace App\Http\SelfClasses;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class AddCategory
{
    //
    public function addNewCategory($category)
    {
        $checkDbNotToBeNull = DB::table('categories')->first();
        $counter = 0;
        if(count($checkDbNotToBeNull) > 0)
        {
            $latestCategory  = DB::table('categories')->select('id')->orderBy('id', 'DESC')->first();
            $counter += $latestCategory->id;
        }
        $count = count($category);
       // dd($count);
        $i = 0;
        $j = $count-1;
        while($i < $count)
        {
            $insert = DB::table('categories')->insert
            ([
                 'title' => $category[$i],
                 'depth' => $j
            ]);
            $i++;
            $j--;
        }
        $newCategories = DB::table('categories')->select('id')->where('id', '>' ,$counter)->get();
        $len=count($newCategories);
        $len1= $len;
        foreach ($newCategories as $newCategory)
        {
            if($len == $len1)
            {
                   $update = DB::table('categories')->where('id',$newCategory->id)->update(['parent_id' => 0]);
            }else
                {
                    $update1 = DB::table('categories')->where('id',$newCategory->id)->update(['parent_id' => $newCategory->id-1]);
                }
            $len--;
        }
        if($insert && $update && $update1)
        {
            print('اطلاعات با موفقیت ثبت گردید ، لطفا جهت ثبت دسته های جدید ابتدا دسته های موجود را بررسی نمایید  در صورت عدم وجود دسته مورد نظر دکمه ثبت دسته  جدید را بزنید');
        }else
            {
                print('در ثبت اطلاعات خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید');
            }

    }
}

