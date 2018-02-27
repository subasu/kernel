<?php

namespace App\Http\Controllers\webService;

use App\Http\Requests\TitleValidation;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use JWTAuth;
class PaymentTypeController extends Controller
{



    //below function is related to add new payment types in data base
    public function addNewPaymentTypes(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $count = count($request->paymentTypes);
            $i = 0;
            while ($i < $count) {
                $newPaymentTypes = new PaymentType();
                $newPaymentTypes->title = trim($request->paymentTypes[$i]);
                $newPaymentTypes->save();
                $i++;
            }

            if ($newPaymentTypes) {
                return response()->json(['message' => 'اطلاعات با موفقیت ثبت شد', 'code' => '1']);
            } else {
                return response()->json(['message' => 'خطایی در ثبت اطلاعات رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
        }
    }



    //below function is related toi edit size title
    public function editPaymentTypeTitle(TitleValidation $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else
        {
            $update = PaymentType::find($request->id);
            $update->title = trim($request->title);
            $update->save();
            if($update)
            {
                return response()->json(['message' => 'ویرایش با موفقیت انجام شد' , 'code' => '1']);
            }
            else
            {
                return response()->json(['message' => '  خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید ']);
            }
        }
    }

    public function enableOrDisablePaymentType(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else
        {
            $active = DB::table('payment_types')->where('id',$request->paymentTypeId)->value('active');
            switch ($active)
            {
                case 1 :
                    $update = DB::table('payment_types')->where('id',$request->paymentTypeId)->update(['active' => 0 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'حالت پرداخت مورد نظر شما غیر فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('payment_types')->where('id',$request->paymentTypeId)->update(['active' => 1 ]);
                    if($update)
                    {
                        return response()->json(['message' => 'حالت پرداخت مورد نظر شما  فعال گردید' , 'code' => '1']);
                    }else
                    {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

            }
        }
    }
}
