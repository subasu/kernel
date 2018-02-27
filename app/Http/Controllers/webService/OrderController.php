<?php

namespace App\Http\Controllers\webService;

use App\Models\Basket;
use App\Models\Order;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class OrderController extends Controller
{
    //
    public function ordersManagement()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $data = Order::where([['transaction_code', '<>', null], ['pay', '<>', null], ['order_status', null]])->get();
            foreach ($data as $datum) {
                $datum->persianDate = $this->toPersian($datum->date);
            }
            return response()->json(['orders' => $data]);
        }
    }

    public function toPersian($date)
    {
        if (count($date) > 0) {
            $gDate = $date;
            if ($date = explode('-', $gDate)) {
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
            }
            $date = Verta::getJalali($year, $month, $day);
            $myDate = $date[0] . '/' . $date[1] . '/' . $date[2];
            return $myDate;
        }
        return;
    }

    //below function is to change order status
    public function changeOrderStatus(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $order = Order::find($request->orderId);
            $order->order_status = 'OK';
            $order->save();
            if($order)
            {
                return response()->json(['message' => 'وضعیت سفارش تغییر کرد' , 'code' => 'success']);
            }else
            {
                return response()->json(['message' => 'خطایی رخ داده است' , 'code' => 'error']);
            }
        }
    }

    public function adminShowFactor($id)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $order = Basket::find($id)->orders;
            $baskets = Basket::find($id);
            $total = 0;
            $totalDiscount = 0;
            $totalPostPrice = 0;
            $finalPrice = 0;
            if (!empty($baskets)) {
                foreach ($baskets->products as $basket) {
                    $basket->count = $basket->pivot->count;
                    $basket->price = $basket->pivot->product_price;
                    $basket->sum = $basket->pivot->count * $basket->pivot->product_price;
                    $basket->basketComment = $basket->pivot->comments;
                    $total += $basket->sum;
                    $basket->basket_id = $basket->pivot->basket_id;
                    $totalPostPrice += $basket->post_price;
                    if ($basket->discount_volume != null) {
                        $totalDiscount += $basket->discount_volume;
                        if ($totalDiscount > 0) {
                            $basket->sumOfDiscount = ($total * $totalDiscount) / 100;
                        }
                    }

                }
                $finalPrice += ($total + $totalPostPrice) - $basket->sumOfDiscount;
                return response()->json( compact( 'baskets', 'total', 'totalPostPrice', 'finalPrice', 'paymentTypes', 'order'));
            }
        }
    }

    //below function is related to get old orders
    public function oldOrders()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $data = Order::where([['transaction_code', '<>', null], ['pay', '<>', null], ['order_status', '<>', null]])->get();
            foreach ($data as $datum) {
                $datum->persianDate = $this->toPersian($datum->created_at);
            }
            return response()->json(['oldOrders' => $data]);
        }
    }

}
