<?php

namespace App\Http\Controllers\webService;

use App\Http\SelfClasses\AddProduct;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\CheckJalaliDate;
use App\Http\SelfClasses\CheckProduct;
use App\Http\SelfClasses\NotToBeRepeated;
use App\Models\Product;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }
    //below function is related to return all products data
    public function productsManagement()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $data = Product::all();
            foreach ($data as $datum) {
                $datum->date = $this->toPersian($datum->created_at->toDateString());
            }
            return response()->json(['products' => $data]);
        }
    }

    //below function is related to convert gregorian date to jalali
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


    //add new product to database
    public function addNewProduct(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $notToBeRepeated = new NotToBeRepeated();
            $checkTitles = $notToBeRepeated->notToBeRepeated($request, 'product');
            if (is_bool($checkTitles)) {
                $checkJalaliDate = new CheckJalaliDate();
                $dateResult = $checkJalaliDate->checkDate($request);
                if ($dateResult == "true") {
                    $checkProduct = new CheckProduct();
                    $result = $checkProduct->ProductValidate($request);
                    if ($result == "true") {
                        $checkFiles = new CheckFiles();
                        $result = $checkFiles->checkCategoryFiles($request,'');
                        if (is_bool($result)) {
                            $addNewProduct = new AddProduct();
                            $ans = $addNewProduct->addProduct($request);
                            if ($ans == "true")
                                return response()->json(['data' => 'محصول شما با مؤفقیت درج شد']);
                            else
                                return response()->json(['data' => 'خطایی رخ داده است، -لطفا با بخش پشتیبانی تماس بگیرید.']);
                        } else
                            return response()->json(['message' => $result, 'code' => '1']);
                    } else {
                        return response()->json($result);
                    }
                } else {
                    return response()->json(['data' => 'تاریخ را بطور صحیح وارد نمائید : 1396/09/19']);
                }
            } else {
                return response()->json(['data' => $checkTitles]);
            }
        }
    }
}
