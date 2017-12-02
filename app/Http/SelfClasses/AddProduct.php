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
    public function addProduct($product)
    {
        if($product)
        {
            return $product;
        }
        else
        {
            return "no";
        }
    }
}