<?php

namespace App\Http\Controllers\webService;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class CommonController extends Controller
{
    //below function is to get main categories from database
    public function getMainCategories()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $mainCategories = Category::where([['parent_id', null], ['active', 1]])->get();
            if (count($mainCategories) > 0) {
                return response()->json(['mainCategories' => $mainCategories]);
            } else {
                return response()->json(['message' => 'no match found']);
            }
        }
    }

    //below function is to get sub categories from database
    public function getSubCategories($id)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $subCategories = Category::where([['parent_id', $id], ['active', 1], ['title', '<>', 'سایر']])->get();
            if (count($subCategories) > 0) {
                return response()->json(['subCategories' => $subCategories]);
            } else {
                return response()->json(['message' => 'no match found']);
            }
        }
    }

    // below function is related to get all disabled categories
    public function getAllDisabledCategories()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $disabledCategories = Category::where('active', 0)->get();
            if (count($disabledCategories) > 0) {
                return response()->json(['disabledCategories' => $disabledCategories]);
            } else {
                return response()->json(['message' => 'no match found']);
            }
        }
    }

    //below function is related to show disabled categories of each category
    public function getDisabledCategories($id)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $disabledCategories = Category::where([['parent_id', $id], ['active', 0]])->get();
            if (count($disabledCategories) > 0) {
                return response()->json(['relatedDisabledCategories' => $disabledCategories]);
            } else {
                return response()->json(['message' => 'no match found']);
            }
        }
    }

    //below function is related to existed colors
    public function getColors()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $colors = Color::all();
            if (count($colors) > 0) {
                return response()->json(['colors' => $colors]);
            } else {
                return response()->json(['message' => 'no match found']);
            }
        }
    }

    //below function is related to existed sizes
    public function getSizes()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $sizes = Size::where('active', '=', '1')->get();
            if (count($sizes) > 0) {
                return response()->json(['sizes' => $sizes]);
            } else {
                return response()->json(['messages' => 'no match found']);
            }
        }
    }

}
