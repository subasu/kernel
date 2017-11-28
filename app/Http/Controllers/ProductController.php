<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddCategory;
use App\Models\Category;
use App\Models\DeliveryMan;
use App\Models\Product;
use App\Models\UnitCount;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function addNewCategory(Request $request)
    {
        $add = new AddCategory();

        $add->addNewCategory($request->category);
    }
    public function addProduct(Request $request)
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
