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

    public function addProduct()
    {
        return view('admin.addProduct');
    }
    public function productsManagement()
    {
        $data=Product::all();
        return view('admin.productManagement',compact('data'));
    }
}
