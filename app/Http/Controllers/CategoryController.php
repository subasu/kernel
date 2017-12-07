<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddCategory;
use App\Http\SelfClasses\CheckFiles;
use App\Models\Category;
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
        $categories = Category::where([['active',1],['parent_id',0]])->get();
        return view('admin.categoriesManagement',compact('categories'));
    }

    //below function is related to edit main category
    public function editCategory($id)
    {
        $categoryInfo = Category::where('id',$id)->get();
        return view('admin.editCategory',compact('categoryInfo'));
    }
    //below function is related to edit main category
    public function showSubCategory($id)
    {
        $categoryInfo = Category::where('parent_id',$id)->get();
        return view('admin.showSubCategory',compact('categoryInfo'));
    }


    //below function is related to edit category picture
    public function editCategoryPicture(Request $request)
    {

        $checkFiles = new CheckFiles();
        $result = $checkFiles->checkCategoryFiles($request);
        if(is_bool($result))
        {
            $category = Category::find($request->categoryId);
            $category->image_src = $request->file[0]->getClientOriginalName();
            $category->save();
            if($category){
                return response()->json('ویرایش با موفقیت انجام گردید');
            }
        }else
            {
                return response()->json(['message' => $result , 'code' => '1']);
            }
    }

    //below function is related to edit category title
    public function editCategoryTitle(Request $request)
    {
        $category = Category::find($request->id);
        $category->title = $request->title;
        $category->save();
        if($category)
        {
            return response()->json(['message' => 'ویرایش با موفقیت انجام گردید' , 'code' => 1 ]);
        }else
            {
                return response()->json(['message' => 'خطایی در عملیات ویرایش رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
            }
    }
}
