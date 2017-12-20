<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRegistrationValidation;
use App\Http\SelfClasses\CheckUserCellphone;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
                $basketId = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['payment',0]])->value('id');
                $count    = DB::table('basket_product')->where([['basket_id',$basketId],['product_id',$request->productId]])->count();

                if($oldBasket = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['payment',0]])->count() > 0 && $count > 0)
                {

                    $update = DB::table('basket_product')->where([['basket_id',$basketId],['product_id',$request->productId]])->increment('count');
                    if($update)
                    {
                        return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1]);
                    }else
                        {
                            return response()->json(['message' => 'خطایی رخ داده است']);
                        }

                }else if($oldBasket = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['payment',1]])->count() > 0)
                {
                    return $this->newCookie($now,$request);
                }
                else
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
                       return $this->newCookie($now,$request);
                }

    }

    //below function is related to make new cookie
    public function newCookie($now,$request)
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

    //below function is related to get basket count
    public function getBasketCountNotify()
    {
        $basketId  = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['payment' , 0]])->value('id');
        $count    = DB::table('basket_product')->where('basket_id',$basketId)->count();
        return response()->json($count);
    }

    //below function is related to get basket total price
    public function getBasketTotalPrice()
    {
        $basketId  = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['payment' , 0]])->value('id');
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
        $basketId  = DB::table('baskets')->where([['cookie',$_COOKIE['addToBasket']],['payment' , 0]])->value('id');
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
        $count  = DB::table('basket_product')->where('basket_id',$request->basketId)->count();
        if($delete)
        {
            return response()->json(['message' => 'محصول مورد نظر از سبد خرید حذف گردید' , 'code' => 1 , 'count' => $count]);
        }else
            {
                return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
    }

    //below function is related to update basket payment field
    public function orderFixed()
    {
        if(isset($_COOKIE['addToBasket']))
        {
            $update = DB::table('baskets')->where('cookie',$_COOKIE['addToBasket'])->update(['payment' => 1]);
            if($update)
            {
                return response()->json(['message' => '' , 'code' => 1]);
            }
        }
    }

    //below function is related to add or sub count of basket
    public function addOrSubCount(Request $request)
    {
        switch ($request->parameter)
        {
            case 'addToCount' :
                $update = DB::table('basket_product')->where([['basket_id',$request->basketId],['product_id',$request->productId]])->increment('count');
                if($update)
                {
                    return response()->json(['code' => 1]);
                }else
                    {
                        return response()->json(['code' => 0]);
                    }
            break;
            case 'subFromCount' :
                $update = DB::table('basket_product')->where([['basket_id',$request->basketId],['product_id',$request->productId]])->decrement('count');
                if($update)
                {
                    return response()->json(['code' => 1]);
                }else
                {
                    return response()->json(['code' => 0]);
                }
            break;
        }
    }


    //below function is related to add order registration
    public function orderRegistration(OrderRegistrationValidation $request)
    {
        if($basket = Basket::where([['id',$request->basketId],['payment',0]])->count() > 0 ) {
            $now = Carbon::now(new\DateTimeZone('Asia/Tehran'));
            $checkUserCellphone = new CheckUserCellphone();
            $result = $checkUserCellphone->checkUserCellphone($request);
            if (is_numeric($result)) {
                $order = new Order();
                $order->user_id = $result;
                $order->user_coordination = trim($request->userCoordination);
                $order->date = $now->toDateString();
                $order->time = $now->toTimeString();
                $order->total_price = $request->totalPrice;
                $order->discount_price = $request->discountPrice;
                $order->factor_price = $request->factorPrice;
                $order->user_cellphone = $request->userCellphone;
                $order->basket_id = $request->basketId;
                $order->payment_type = $request->paymentType;
                $order->save();
                if ($order) {
                    $update = Basket::find($request->basketId);
                    $update->payment = 1;
                    $update->save();
                    if ($update) {
                        return response()->json(['message' => 'سفارش  شما با موفقیت ثبت گردید', 'code' => 1]);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }

                }
            } else {
                return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
        }else
            {
              //  return redirect()->route('index');
            }
    }
}

