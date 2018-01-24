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
    public function checkCategoryFiles($request,$type)
    {
        if($type=='slider')
        {
            $imageWidth=1200;
            $imageHeight=800;
        }
        else
        {
            $imageWidth=200;
            $imageHeight=50;
        }
        if(count($request->file) > 0)
        {
            $allowedExtensions = array('png','jpg');
            $allowedSize       = 10000000;
            $count             = count($request->file);
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
                $image = getimagesize($request->file[0]);
                if($image[0] >= $imageWidth && $image[1] >= $imageHeight)
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
                }else
                    {
                        return( ' کیفیت تصویر یا تصاویر انتخاب شده مناسب نیست ، لطفا تصاویر  با کیفیت'.$imageWidth .'*'.$imageHeight.'بالاتر انتخاب نمایید');
                    }
            }
            else
            {
                return('پسوند فایل یا فایل های انتخاب شده مجاز نمیباشد');
            }
        }
        else
            {
                return true;
            }
    }
}