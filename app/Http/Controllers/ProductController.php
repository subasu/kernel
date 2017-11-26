<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddCategory;
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


}
