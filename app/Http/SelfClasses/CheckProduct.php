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
            'produce_date' => 'sometimes|nullable|max:10|min:8',
            'expire_date' => 'sometimes|nullable|max:10|min:8',
            'produce_place' => '',
            'warehouse_count' => 'sometimes|nullable|numeric',
            'warehouse_place' => '',
            'ready_time' => 'sometimes|nullable|numeric',
            'barcode' => 'sometimes|nullable|numeric',
            'price' => 'required|numeric',
            'sales_price' => 'sometimes|nullable||numeric',
            'special_price' => 'sometimes|nullable||numeric',
            'wholesale_price' => 'sometimes|nullable||numeric',
            'discount' => 'sometimes|nullable||numeric|min:1|max:3',
            'discount_volume' => 'sometimes|nullable|numeric',
            'delivery_volume' => 'sometimes|nullable|numeric',
            'video_src' => 'sometimes|nullable|mimtypes:video/avi,video/mpeg,video/quicktime',
            'pic1' => 'sometimes|nullable|image',

        ]);
        $errors = $validation->errors();
        if(!$errors->isEmpty())
            return $errors;
        else
            return "true";
    }
}