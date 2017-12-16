<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
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
                $basketId = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->value('id');
                $count    = DB::table('basket_product')->where([['basket_id',$basketId],['product_id',$request->productId]])->count();

                if($count > 0)
                {
                    $update = DB::table('basket_product')->where([['basket_id',$basketId],['product_id',$request->productId]])->increment('count');
                    if($update)
                    {
                        return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1]);
                    }else
                        {
                            return response()->json(['message' => 'خطایی رخ داده است']);
                        }

                }else
                    {
                            $pivotInsert = DB::table('basket_product')->insert
                            ([
                                'basket_id'      => $basketId,
                                'product_id'     => $request->productId,
                                'product_price'  => $request->productFlag,
                                'time'           => $now->toTimeString(),
                                'date'           => $now->toDateString(),
                                'count'          => 1
                            ]);
                            if($pivotInsert)
                            {
                                return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1]);
                            }else
                            {
                                return response()->json(['message' => 'خطایی رخ داده است']);
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
                        $basket->cookie         = $cookieValue;
                        $basket->save();
                        if($basket)
                        {
                            $pivotInsert = DB::table('basket_product')->insert
                            ([
                                'basket_id'      => $basket->id,
                                'product_id'     => $request->productId,
                                'product_price'  => $request->productFlag,
                                'time'           => $now->toTimeString(),
                                'date'           => $now->toDateString(),
                                'count'          => 1
                            ]);
                            if($pivotInsert)
                            {
                                return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1]);
                            }else
                            {
                                return response()->json(['message' => 'خطایی رخ داده است']);
                            }

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
        $basketId  = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->value('id');
        $count    = DB::table('basket_product')->where('basket_id',$basketId)->count();
        return response()->json($count);
    }

    //below function is related to get basket total price
    public function getBasketTotalPrice()
    {
        $basketId  = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->value('id');
        $baskets   = DB::table('basket_product')->where('basket_id',$basketId)->get();
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
        $basketId  = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->value('id');
        $baskets  = Basket::find($basketId);
        foreach ($baskets->products as $product)
        {
            $product->count       = $product->pivot->count;
            $product->price       = $product->pivot->product_price;
            $product->basket_id   = $product->pivot->basket_id;
            $product->product_id  = $product->pivot->product_id;

        }
        return response()->json($baskets);
    }

    //below function is related to remove item from basket
    public function removeItemFromBasket(Request $request)
    {
        if(!$request->ajax())
        {
            abort(403);
        }
        $delete = DB::table('basket_product')->where([['basket_id',$request->basketId],['product_id',$request->productId]])->delete();
        if($delete)
        {
            return response()->json(['message' => 'محصول مورد نظر از سبد خرید حذف گردید' , 'code' => 1]);
        }else
            {
                return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
    }


}

