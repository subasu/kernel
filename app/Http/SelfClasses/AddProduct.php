<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/29/2017
 * Time: 8:26 AM
 */

namespace App\Http\SelfClasses;


use App\Models\Product;

class AddProduct
{
    public function addProduct($product)
    {
        if($product)
        {
            $pr=new Product();
            $title=$product->title;
            return ($title);
        }
        else
        {
            return (false);
        }
    }
}