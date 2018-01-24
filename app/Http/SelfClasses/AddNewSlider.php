<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 1/23/2018
 * Time: 3:11 PM
 */

namespace App\Http\SelfClasses;


use App\Models\Slider;

class AddNewSlider
{
   public function addNewSlide($request)
   {
       $count = count($request->file);
       $i     = 0;
       while($i < $count)
       {
           $slider = new Slider();
           $file = $request->file[$i];
           $src  = $file->getClientOriginalName();
           $file->move('public/dashboard/sliderImages', $src);
           $slider->image_src = $src;
           $slider->title      = trim($request->title[$i]);
           $slider->save();
           $i++;
       }if($slider)
       {
           return true;
       }else
           {
               return('خطایی رخ داده است ، لطفا بخش پشتباتی تماس بگیرید');
           }
   }
}