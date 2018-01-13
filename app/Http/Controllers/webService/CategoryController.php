<?php

namespace App\Http\Controllers\webService;

use App\Http\SelfClasses\AddCategory;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\NotToBeRepeated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
//use Tymon\JWTAuth\JWTAuth;

//use Tymon\JWTAuth\Facades\JWTAuth;

class CategoryController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('jwt.auth', ['except' => ['login']]);
//
//    }
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
}
