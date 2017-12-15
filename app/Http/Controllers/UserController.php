<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

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
            $now = Carbon::now(new \DateTimeZone('Asia/Tehran'));
            if(isset($_COOKIE['addToBasket']))
            {
                $dataBaseOldProductId = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['product_id',$request->productId]])->count();
                if($dataBaseOldProductId > 0)
                {
                    $update = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['product_id',$request->productId]])->increment('count');
                    if($update)
                    {
                        return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1]);
                    }
                }else
                    {
                        $basket = new Basket();
                        $basket->product_id     = $request->productId;
                        $basket->cookie         = $_COOKIE['addToBasket'];
                        $basket->product_price  = $request->productFlag;
                        $basket->time           = $now->toTimeString();
                        $basket->date           = $now->toDateString();
                        $basket->count          = 1;
                        $basket->save();
                        if($basket)
                        {
                            return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1 ]);
                        }

                    }
            }
            else
                {
                    $cookieValue = mt_rand(1,1000).microtime();
                    $cookie = setcookie('addToBasket', $cookieValue , time() + (86400 * 30), "/");
                    if($cookie)
                    {
                        $basket = new Basket();
                        $basket->product_id     = $request->productId;
                        $basket->cookie         = $cookieValue;
                        $basket->product_price  = $request->productFlag;
                        $basket->time           = $now->toTimeString();
                        $basket->date           = $now->toDateString();
                        $basket->count          = 1;
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


    //below function is related to get basket count
    public function getBasketCountNotify()
    {
        $baskets  = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->count();
        return response()->json($baskets);
    }

    //below function is related to get basket total price
    public function getBasketTotalPrice()
    {
        $baskets  = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->get();
        $totalPrice = '';
        foreach ($baskets as $basket)
        {
            $totalPrice  += $basket->count * $basket->product_price;
        }
        return response()->json($totalPrice);
    }

    //below function is related to get basket content
    public function getBasketContent()
    {
        $baskets  = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->get();
        return response()->json($baskets);
    }


}

