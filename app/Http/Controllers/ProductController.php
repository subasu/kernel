<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFilesValidate;
use App\Http\SelfClasses\AddCategory;
use App\Http\SelfClasses\CheckCategoryFiles;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function addNewCategory(Request $request)
    {
        $checkCategoryFiles = new AddCategory();
        $checkCategoryFiles->checkCategoryFiles($request);
        if($checkCategoryFiles == true)
        {
            $add = new AddCategory();
            $add->addNewCategory($request->category,$request);
        }

    }
    public function addProduct(Request $request)
    {
        return view('admin.addProduct');
    }
    public function productManagement()
    {
        $data=Product::all();
        return view('admin.productManagement',compact('data'));
    }


}
