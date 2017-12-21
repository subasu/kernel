<?php

namespace App\Http\Controllers\webService;

use App\Models\Basket;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /* below function is related to add product in basket
       as you see this function used in web service
       the client should send 3 parameters :
       1-cookie 2-productId  3-productFlag
     */
    public function addToBasket(Request $request)
    {
        $now = Carbon::now(new \DateTimeZone('Asia/Tehran'));
        if($request->cookie != null || $request->cookie != '')
        {

            if($oldCookie = DB::table('baskets')->where([['cookie',$request->cookie],['payment',0]])->count() > 0)
            {
                $basketId = DB::table('baskets')->where([['cookie',$request->cookie],['payment',0]])->value('id');
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
            }else if($oldCookie = DB::table('baskets')->where([['cookie',$request->cookie],['payment',1]])->count() > 0 )
                {
                   return  $this->newCookie($now,$request);

                }else
                    {
                        return response()->json(['message' => 'لطفا در عملیات مربوط به سبد خرید اختلال ایجاد ننمایید']);
                    }
        }
        else
        {
           return $this->newCookie($now,$request);
        }
    }


    //below function is related make new cookie
    public function newCookie($now,$request)
    {
        $cookie = mt_rand(1,100000).microtime();
        if($cookie)
        {
            $basket = new Basket();
            $basket->cookie         = $cookie;
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
                    return response()->json(['message' => 'محصول مورد نظر شما به سبد خرید اضافه گردید' , 'code' => 1 , 'cookie' => $cookie]);
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

    /* below function is related to get basket count
       this function is in web service and client should
       send it cookie that can get basket count or notify
    */
    public function getBasketCountNotify(Request $request)
    {
        $basketId  = DB::table('baskets')->where([['cookie',$request->cookie],['payment' , 0]])->value('id');
        $count     = DB::table('basket_product')->where('basket_id',$basketId)->count();
        return response()->json($count);
    }

    /*
     * below function is related to show products of
     * each category
     *  */
    public function showProducts($id)
    {
        $products = Category::find($id);
        foreach ($products->products as $product) {
            $product->productFlags = $product->productFlags;
        }
        return response()->json(['products' => $products->products]);
    }

    //below function is related to get basket content for web service
    public function getBasketTotalPrice(Request $request)
    {
        $basketId  = DB::table('baskets')->where([['cookie',$request->cookie],['payment' , 0]])->value('id');
        $baskets   = DB::table('basket_product')->where('basket_id',$basketId)->get();
        $totalPrice = '';
        foreach ($baskets as $basket)
        {
            $totalPrice  += $basket->count * $basket->product_price;
        }
        return response()->json($totalPrice);
    }

    //below function is related to get basket content
    public function getBasketContent(Request $request)
    {
        $basketId  = DB::table('baskets')->where([['cookie',$request->cookie],['payment' , 0]])->value('id');
        $baskets  = Basket::find($basketId);
        foreach ($baskets->products as $product)
        {
            $product->count       = $product->pivot->count;
            $product->price       = $product->pivot->product_price;
            $product->basket_id   = $product->pivot->basket_id;
            $product->product_id  = $product->pivot->product_id;

        }
        return response()->json(['basketContent' => $baskets]);
    }

    //below function is related to remove item from basket
    public function removeItemFromBasket(Request $request)
    {
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
}
