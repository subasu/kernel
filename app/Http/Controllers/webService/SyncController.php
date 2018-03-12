<?php

namespace App\Http\Controllers\webService;

use App\Models\Order;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
                $basketProducts =  DB::table('basket_product')->where('synchronize',null)->select('product_id AS GoodsCode','basket_id','count AS Tedad','product_price AS Price','comments AS GoodsComments')->get();
                if(count($basketProducts) > 0)
                {
                    foreach ($basketProducts as $basketProduct)
                    {
                        $basketProduct->Taraf                  =  DB::table('orders')->where('basket_id',$basketProduct->basket_id)->value('user_cellphone');
                        $basketProduct->Factor_Num             =  DB::table('orders')->where('basket_id',$basketProduct->basket_id)->value('id');
                        $basketProduct->factoreComments        =  DB::table('orders')->where('basket_id',$basketProduct->basket_id)->value('comments');
                        $basketProduct->Pocket                 =  DB::table('orders')->where('basket_id',$basketProduct->basket_id)->value('pay_price');
                        $basketProduct->Factor_Date            =  $this->toPersian(DB::table('orders')->where('basket_id',$basketProduct->basket_id)->value('date'));
                        $basketProduct->Discount               =  DB::table('products')->where('id',$basketProduct->GoodsCode)->value('discount');
                        $basketProduct->Product_Title          =  DB::table('products')->where('id',$basketProduct->GoodsCode)->value('title');
                    }
                    $update =  DB::table('basket_product')->where('synchronize',null)->update(['synchronize' => 'sync']);
                    if($update)
                    {
                        return response()->json(['synchronizeInfo'=> $basketProducts]);
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
       // return;
    }
}
