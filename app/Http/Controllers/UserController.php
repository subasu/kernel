<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    //below function returns all users to the usersManagement blade ...
    public function usersManagement()
    {
        $data=User::all();
        return view('admin.usersManagement',compact('data'));
    }


    //below function is related to add products into basket with cookie
    public function addToBasket(Request $request)
    {
            $cookie = setcookie('addToBasket', microtime(), time() + (86400 * 30), "/");
            if(isset($_COOKIE['addToBasket']))
            {
                $basket = new Basket();
                $basket->product_id = $request->productId;
                $basket->cookie     = $cookie;
                $basket->save();
                if($basket)
                {
                    return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1]);
                }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است']);
                    }
            }
    }




}

