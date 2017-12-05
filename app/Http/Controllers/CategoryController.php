<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddCategory;
use App\Http\SelfClasses\CheckFiles;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //below function is related to add new category
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

    //below function returns addCategory blade....
    public function addCategory()
    {
        return view('admin.addCategory');
    }


    //below function is to returns all categories to the categoriesManagement blade....
    public function categoriesManagement()
    {
        $data=Category::all();
        return view('admin.categoriesManagement',compact('data'));
    }
}
