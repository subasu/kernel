<?php

namespace App\Http\Controllers\webService;

use App\Models\UnitCount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class UnitController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }
    ////below function is to get main units from database
    public function getMainUnits()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found !'], 404);
        } else {
            $mainUnits = UnitCount::with('subUnits')->get();
            if (count($mainUnits) > 0) {
                return response()->json(['mainUnits' => $mainUnits]);
            } else {
                return response()->json(0);
            }
        }
    }
}
