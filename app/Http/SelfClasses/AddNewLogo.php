<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 1/27/2018
 * Time: 1:05 PM
 */

namespace App\Http\SelfClasses;


use App\Models\Logo;

class AddNewLogo
{
    public function addNewLogo($request)
    {
        $count = count($request->file);
        $i = 0;
        while ($i < $count) {
            $logo = new Logo();
            $file = $request->file[$i];
            $src = $file->getClientOriginalName();
            $file->move('public/dashboard/Logo', $src);
            $logo->image_src = $src;
            $logo->title = trim($request->title);
            $logo->active = 1;
            $logo->save();
            $i++;
        }
        if ($logo) {
            return true;
        } else {
            return ('خطایی رخ داده است ، لطفا بخش پشتباتی تماس بگیرید');
        }
    }
}