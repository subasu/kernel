<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/30/2017
 * Time: 9:33 AM
 */

namespace App\Http\SelfClasses;

use Illuminate\Support\Facades\Validator;

class CheckProduct
{
    public function ProductValidate($request)
    {
        $validation=Validator::make($request->all(),[

            'categories' => 'required|numeric',
            'subCategories' => 'numeric',
            'brands' => 'numeric',
            'title' => 'required|max:255',
            'description' => 'required',
            'unit_count_id' => 'required|numeric',
            'sub_unit_count_id' => 'required|numeric',
            'produce_date' => 'max:10|min:8',
            'expire_date' => 'max:10|min:8',
            'produce_place' => '',
            'warehouse_count' => 'numeric',
            'warehouse_place' => '',
            'ready_time' => 'numeric',
            'barcode' => 'numeric',
            'price' => 'numeric',
            'sales_price' => 'numeric',
            'special_price' => 'numeric',
            'Wholesale_price' => 'numeric',
            'discount' => 'numeric|min:1|max:3',
            'discount_volume' => 'numeric',
            'delivery_volume' => 'numeric',
            'video_src' => 'mimtypes:video/avi,video/mpeg,video/quicktime',
            'pic1' => 'image',

        ]);
        $errors = $validation->errors();
        if(!$errors->isEmpty())
            return $errors;
        else
            return "true";
    }
}