<?php

namespace App\Http\Controllers\webService;

use App\Models\Basket;
use App\Models\Category;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    //below function is related to get main menu
    public function getMainMenu()
    {
        $mainMenu  = Category::where([['parent_id',null],['grand_parent_id',null]])->get();
        return response()->json(['mainMenu' => $mainMenu]);
    }

    //below function is related to get sub menu
    public function getSubMenu($id)
    {
        $subMenu  = Category::where('parent_id',$id)->get();
        return response()->json(['subMenu' =>$subMenu ]);
    }

    //below function is related to get brands
    public function getBrands($id)
    {
        $brands = Category::where('parent_id',$id)->get();
        return response()->json(['brands' => $brands]);
    }

    //below function is related to show basket detail
    public function order(Request $request)
    {
        if($basket = Basket::where([['id',$request->basketId],['payment',0]])->count() > 0)
        {
            switch ($request->parameter)
            {
                case 'basketDetail':
                    if($request->basketId)
                    {
                        $baskets   = Basket::find($request->basketId);
                        $total     = 0;
                        foreach ($baskets->products as $basket)
                        {
                            $basket->count       = $basket->pivot->count;
                            $basket->price       = $basket->pivot->product_price;
                            $basket->sum         = $basket->pivot->count * $basket->pivot->product_price;
                            $total              += $basket->sum;
                            $basket->basket_id   = $basket->pivot->basket_id;
                        }
                        return response()->json(compact(['basket' => 'baskets' , 'total' => 'total']));
                    }else
                    {
                        return response()->json(['message' => 'سبد خرید وجود ندارد']);
                    }

                    break;

                case 'orderDetail':
                    $paymentTypes = PaymentType::where('active',1)->get();
                    $baskets   = Basket::find($request->basketId);
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
                        return response()->json(compact('baskets','total','totalPostPrice','finalPrice','paymentTypes'));
                    }else
                    {
                        return resposne()->json(['message' => 'سبد خرید خالی است']);
                    }

                    break;
            }

        }else
        {
            return response()->json(['message' => 'سبد خرید ایجاد نشده است']);
        }

    }
}
