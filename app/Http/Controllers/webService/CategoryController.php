<?php

namespace App\Http\Controllers\webService;

use App\Http\SelfClasses\AddCategory;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\NotToBeRepeated;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
//use Tymon\JWTAuth\JWTAuth;

//use Tymon\JWTAuth\Facades\JWTAuth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);

    }
    //
    public function addNewCategory(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $notToBeRepeated = new NotToBeRepeated();
            $titleCheck = $notToBeRepeated->notToBeRepeated($request, 'category');
            if (is_bool($titleCheck)) {
                $checkFiles = new CheckFiles();
                $result = $checkFiles->checkCategoryFiles($request);
                if (is_bool($result)) {
                    $addNewCategory = new AddCategory();
                    $result1 = $addNewCategory->addNewCategory($request->category, $request);
                    if ($result1) {
                        return response()->json(['message' => $result1, 'code' => 1]);
                    }
                } else {
                    return response()->json(['message' => $result, 'code' => 0]);
                }
            } else {
                return response()->json(['message' => $titleCheck, 'code' => 0]);
            }
        }
    }

    //below function is to returns all categories to the categoriesManagement blade....
    public function categoriesManagement()
    {
        $categories = Category::where('parent_id',null)->get();
        return response()->json(['categories' => $categories]);
    }

    //below function is related to edit category
    public function editCategory($id)
    {
        $categoryInfo = Category::find($id);
        if(count($categoryInfo) > 0)
        {
            return response()->json(['categoryInfo' => $categoryInfo]);
        }else
        {
            return response()->json(['message' => 'no match found']);
        }

    }

    //below function is to get sub categories from database
    public function getSubCategories($id)
    {
        $subCategories = Category::where([['parent_id', $id], ['active', 1], ['title', '<>', 'سایر']])->get();
        if (count($subCategories) > 0) {
            return response()->json($subCategories);
        } else {
            return response()->json(0);
        }
    }

    //below function is related to edit category title
    public function editCategoryTitle(Request $request)
    {
        $category = Category::find($request->id);
        $category->title = trim($request->title);
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
