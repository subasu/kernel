<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddProduct;
use App\Http\SelfClasses\CheckProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('admin.addProduct');
    }
    //
    public function productsManagement()
    {
        $data=Product::all();
        return view('admin.productManagement',compact('data'));
    }

    //add new product to database
    public function addNewProduct(Request $request)
    {
        $checkProduct = new CheckProduct();
        $result = $checkProduct->ProductValidate($request);
        if ($result == "true") {
            $addNewProduct = new AddProduct();
            $ans = $addNewProduct->addProduct($request);
//            if($ans=="1")
//            return response()->json(['data'=>'محصول شما با مؤفقیت درج شد']);
//            return ($ans);
//        elseif($ans=="0")
            return response()->json(['data' => '1']);
//            return response()->json(['data'=>'خطایی رخ داده است، -لطفا با بخش پشتیبانی تماس بگیرید.']);

        } else {
            return response()->json($result);
        }
    }


    //
    public function productDetailsGet($id)
    {

        $products = Product::where([['id',$id],['active',1]])->get();
        if(count($products) > 0)
        {
            return view('admin.productDetails',compact('products'));
        }else
            {
                return view('errors.403');
            }

    }
}
