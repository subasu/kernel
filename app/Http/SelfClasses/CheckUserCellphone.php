<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 12/20/2017
 * Time: 2:02 PM
 */

namespace App\Http\SelfClasses;


use App\User;

class CheckUserCellphone
{
    //below function is related to check user cellphone if existed in user table
    public function checkUserCellphone($request)
    {
        $oldUserCellphone = User::where('cellphone',$request->userCellphone)->get();
        if(count($oldUserCellphone) > 0)
        {
            return $oldUserCellphone[0]->id;
        }else
        {
            return $this->addNewUser($request);
        }
    }


    //below function is related to add new user
    public function addNewUser($request)
    {
        $user = new User();
        $user->cellphone = $request->userCellphone;
        $user->save();
        if($user)
        {
            return $user->id;
        }else
            {
                return ('در ثبت اطلاعات خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید');
            }
    }
}