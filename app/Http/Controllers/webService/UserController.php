<?php

namespace App\Http\Controllers\webService;

use App\Models\Basket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addToBasket(Request $request)
    {
        $now = Carbon::now(new \DateTimeZone('Asia/Tehran'));
        if($request->cookie != null || $request->cookie != '')
        {
            return response()->json('OK');
        }
        else
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
    }
}
