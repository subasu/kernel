<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/28/2017
 * Time: 3:28 PM
 */

namespace App\Http\SelfClasses;

use Illuminate\Support\Facades\Validator;

class CheckFiles
{
    public function checkCategoryFiles($request)
    {
        if(count($request->file) > 0)
        {
            $allowedExtensions = array('png','jpg');
            $allowedSize       = 10000000;
            $count             = count($request->file);
//            return Validator::make($request->file, [
//                'file' => 'image|mimes:jpeg|max:2048',
//            ]);
            $sentExtensions    = '';
            $sentSizes         = '';
            $notAllowedSize    = 0;
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
            $sentExtensionsArray = explode('-',$sentExtensions);
            $extensionArrayDiff = array_diff($sentExtensionsArray,$allowedExtensions);
            if($extensionArrayDiff == null)
            {
                $sentSizes = substr($sentSizes,1);
                $sentSizesArray = explode('-',$sentSizes);
                foreach ($sentSizesArray as $item)
                {
                    if($item > $allowedSize)
                    {
                        $notAllowedSize ++;
                    }
                    if($notAllowedSize == 0)
                    {
                        return true;
                    }
                    else
                    {
                        return('سایز فایل یا فایل های انتخاب شده بیش 1 مگابایت است');
                        // return false;
                    }
                }

            }
            else
            {
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