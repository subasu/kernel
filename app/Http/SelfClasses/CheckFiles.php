<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/28/2017
 * Time: 3:28 PM
 */

namespace App\Http\SelfClasses;


use Illuminate\Support\Facades\DB;

class CheckFiles
{
    public function checkCategoryFiles($request)
    {
        if(count($request->file) > 0)
        {
            $allowedExtensions = array('png','jpg');
            $allowedSize       = array('150000');
            $count             = count($request->file);
            $count1            = count($request);
            $sentExtensions    = '';
            $sentSizes         = '';
            $i = 0;
            while($i < $count)
            {
                if(empty($request->file[$i]))
                {
                    $i++;
                }
                $sentExtensions .='-'.$request->file[$i]->getClientOriginalExtension();
                $sentSizes      .='-'.$request->file[$i]->getClientSize();
                $i++;
            }
            $sentExtensions = substr($sentExtensions,1);
            //print($sentExtensions);
            $sentExtensionsArray = explode('-',$sentExtensions);
            $extensionArrayDiff = array_diff($sentExtensionsArray,$allowedExtensions);
           // print_r($extensionArrayDiff);
            if($extensionArrayDiff == null)
            {
                $sentSizes = substr($sentSizes,1);
                $sentSizesArray = explode('-',$sentSizes);
                $sizeArrayDiff  = array_diff($sentSizesArray,$allowedSize);
                if($sizeArrayDiff != null)
                {
                    return true;
                }
                else
                {
                    return('سایز هیچکدام از فایل های انتخاب شده نباید بیش از 150 کیلوبایت باشد');
                   // return false;
                }
            }
            else
            {
//                $sentExtensions = '';
//                $sentExtensionsArray = [];
                return('پسوند فایل یا فایل های انتخاب شده مجاز نمیباشد');
                //return false;
            }
        }
        else
            {
                return true;
            }

    }

}