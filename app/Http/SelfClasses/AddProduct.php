<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/29/2017
 * Time: 8:26 AM
 */

namespace App\Http\SelfClasses;


class AddProduct
{
    public function addProduct($xx)
    {
        if($xx==1)
        {
            return "ok";
        }
        else
        {
            return "no";
        }
    }
}