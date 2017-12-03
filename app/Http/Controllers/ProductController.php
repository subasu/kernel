<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFilesValidate;
use App\Http\SelfClasses\AddCategory;
use App\Http\SelfClasses\AddProduct;
use App\Models\Category;
use App\Models\DeliveryMan;
use App\Http\SelfClasses\CheckFiles;
use App\Models\Product;
use App\Models\UnitCount;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function addNewCategory(Request $request)
    {
        $checkFiles = new CheckFiles();
        $result =$checkFiles->checkCategoryFiles($request);
        if(is_bool($result))
        {

            $addNewCategory = new AddCategory();
            $result1 = $addNewCategory->addNewCategory($request->category,$request);
            if($result1)
            {
                return response()->json(['message' => $result1]);
            }

        }else
            {
                return response()->json(['message' => $result , 'code' => '1']);
            }
    }
    public function addProduct()
    {
        return view('admin.addProduct');
    }
    public function productsManagement()
    {
        $data=Product::all();
        return view('admin.productManagement',compact('data'));
    }
    public function categoriesManagement()
    {
        $data=Category::all();
        return view('admin.categoriesManagement',compact('data'));
    }
    public function unitsManagement()
    {
        $data=UnitCount::all();
        return view('admin.unitsManagement',compact('data'));
    }
    public function deliveryMansManagement()
    {
        $data=DeliveryMan::all();
        return view('admin.deliveryMansManagement',compact('data'));
    }
    public function ordersManagement()
    {
        $data=DeliveryMan::all();
        return view('admin.ordersManagement',compact('data'));
    }
    public function usersManagement()
    {
        $data=User::all();
        return view('admin.usersManagement',compact('data'));
    }
    public function addDeliveryMan()
    {
        $data=User::all();
        return view('admin.addDeliveryMan',compact('data'));
    }
    public function addUnit()
    {
        return view('admin.addUnit');
    }


}
