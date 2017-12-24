<?php

namespace App\Http\Controllers;
use App\Http\SelfClasses\AddProduct;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\CheckJalaliDate;
use App\Http\SelfClasses\CheckProduct;
use App\Http\SelfClasses\CheckUpdateProduct;
use App\Http\SelfClasses\UpdateProduct;
use App\Models\Product;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function addProduct()
    {
        $pageTitle = 'درج محصول';
        return view('admin.addProduct', compact('pageTitle'));
    }
    public function productsManagement()
    {
        $pageTitle = 'مدیریت محصولات';
        $data = Product::all();
        foreach ($data as $datum) {
            $datum->date = $this->toPersian($datum->created_at->toDateString());
        }
        return view('admin.productManagement', compact('data', 'pageTitle'));
    }
    //add new product to database
    public function addNewProduct(Request $request)
    {
        $checkJalaliDate = new CheckJalaliDate();
        $dateResult = $checkJalaliDate->checkDate($request);
        if ($dateResult == "true") {
            $checkProduct = new CheckProduct();
            $result = $checkProduct->ProductValidate($request);
            if ($result == "true") {
                $checkFiles = new CheckFiles();
                $result = $checkFiles->checkCategoryFiles($request);
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

    }
    //update product to database
    public function updateProduct(Request $request)
    {
        $checkJalaliDate = new CheckJalaliDate();
        $dateResult = $checkJalaliDate->checkDate($request);
        if ($dateResult == "true") {
            $checkProduct = new CheckUpdateProduct();
            $result = $checkProduct->ProductValidate($request);
            if ($result == "true") {
                $checkFiles = new CheckFiles();
                $result = $checkFiles->checkCategoryFiles($request);
                if (is_bool($result)) {
                    $UpdateProduct = new UpdateProduct();
                    $ans = $UpdateProduct->UpdateProduct($request);
                    if ($ans == "true")
                        return response()->json(['data' => 'ویرایش محصول شما با مؤفقیت انجام شد']);
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
    }
    public function productDetailsGet($id)
    {
        $pageTitle = 'ویرایش محصول';
        $products = Product::where([['id', $id], ['active', 1]])->get();
        if (count($products) > 0) {
            $products[0]->produceDate = $this->toPersian($products[0]->produce_date);
            $products[0]->expireDate = $this->toPersian($products[0]->expire_date);
            return view('admin.productDetails', compact('products', 'pageTitle'));
        } else {
            return view('errors.403');
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