<?php

namespace App\Http\Controllers\webService;

use App\Models\Order;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class SyncController extends Controller
{
    //
    public function orderSync()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else
            {
                $orders =  Order::where('synchronize',null)->get();
                if(count($orders) > 0)
                {
                    foreach ($orders as $order) {
                        $order->persianDate = $this->toPersian($order->date);
                    }
                    $update =  Order::where('synchronize',null)->update(['synchronize' => 'sync']);
                    if($update)
                    {
                        return response()->json(['orders'=> $orders]);
                    }else
                    {
                        return response()->json(['message' => 'در عملیات سینک کردن خطایی رخ داده است']);
                    }
                }else
                    {
                        return response()->json(['message' => 'داده ای برای همگام سازی وجود ندارد ، همگام سازی به روز است']);
                    }


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
}
