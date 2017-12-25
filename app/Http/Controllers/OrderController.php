<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //below function .....
    public function ordersManagement()
    {
        $pageTitle = 'مدیریت سفارشات';
        $data=Order::where([['transaction_code','<>',null],['pay','<>',null]])->get();
        foreach ($data as $datum)
        {
            $datum->persianDate = $this->toPersian($datum->date);
        }
        return view('admin.ordersManagement',compact('data','pageTitle'));
    }


    //
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

    public function adminShowFactor($id)
    {
        $pageTitle      = 'فاکتور سفارش';
        $baskets        = Basket::find($id);
        $total          = 0;
        $totalDiscount  = 0 ;
        $totalPostPrice = 0;
        $finalPrice     = 0;
        if(!empty($baskets))
        {
            foreach ($baskets->products as $basket)
            {
                $basket->count         = $basket->pivot->count;
                $basket->price         = $basket->pivot->product_price;
                $basket->sum           = $basket->pivot->count * $basket->pivot->product_price;
                $basket->basketComment = $basket->pivot->comments;
                $total                += $basket->sum;
                $basket->basket_id     = $basket->pivot->basket_id;
                $totalPostPrice       += $basket->post_price;
                if($basket->discount_volume != null )
                {
                    $totalDiscount        += $basket->discount_volume;
                    if($totalDiscount > 0)
                    {
                        $basket->sumOfDiscount = ($total * $totalDiscount ) / 100 ;
                    }
                }

            }
            $finalPrice += ($total + $totalPostPrice) - $basket->sumOfDiscount;
            return view('admin.adminFactor',compact('pageTitle','baskets','total','totalPostPrice','finalPrice','paymentTypes'));
        }else
        {
            return view('errors.403');
        }
    }
}
