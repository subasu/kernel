<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 1/27/2018
 * Time: 1:05 PM
 */

namespace App\Http\SelfClasses;


use App\Models\Logo;
use Illuminate\Support\Facades\DB;

class AddNewLogo
{
    public function addNewLogo($request)
    {
        DB::table('logos')->truncate();
        $logo = new Logo();
        $file = $request->file[0];
        $src = $file->getClientOriginalName();
        $file->move('public/dashboard/Logo', $src);
        $logo->image_src = $src;
        $logo->title = trim($request->title);
        $logo->active = 1;
        $logo->save();
        if ($logo) {
            return true;
        } else {
            return ('خطایی رخ داده است ، لطفا بخش پشتباتی تماس بگیرید');
        }
    }
}