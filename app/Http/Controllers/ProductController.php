<?php
namespace App\Http\Controllers;
use App\Http\SelfClasses\AddProduct;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\CheckProduct;
use App\Models\Product;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function addProduct()
    {
        $pageTitle='درج محصول';
        return view('admin.addProduct',compact('pageTitle'));
    }
    public function productsManagement()
    {
        $pageTitle = 'مدیریت محصولات';
        $data = Product::all();
        foreach($data as $datum)
        {
            $datum->date = $this->toPersian($datum->created_at->toDateString());
        }
        return view('admin.productManagement', compact('data','pageTitle'));
    }
    //add new product to database
    public function addNewProduct(Request $request)
    {
        $checkProduct = new CheckProduct();
        $result = $checkProduct->ProductValidate($request);
        if ($result == "true") {
            $checkFiles = new CheckFiles();
            $result = $checkFiles->checkCategoryFiles($request);
            if (is_bool($result)) {
                $addNewProduct = new AddProduct();
                $ans = $addNewProduct->addProduct($request);
                return response()->json(['data' => '1']);
//            if($ans == "1")
//                return response()->json(['data' => 'محصول شما با مؤفقیت درج شد']);
//            else
//              return response()->json(['data'=>'خطایی رخ داده است، -لطفا با بخش پشتیبانی تماس بگیرید.']);
            }
            else
                return response()->json(['message' => $result , 'code' => '1']);
        } else {
            return response()->json($result);
        }
    }
    //
    public function productDetailsGet($id)
    {
        $pageTitle = 'ویرایش محصول';
        $products = Product::where([['id',$id],['active',1]])->get();
        if(count($products) > 0)
        {
            return view('admin.productDetails',compact('products','pageTitle'));
        }else
        {
            return view('errors.403');
        }
    }


    public function toPersian($date)
    {
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
}