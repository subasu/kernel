<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => '/v1'], function () {
    Route::get('getMainCategories','CommonController@getMainCategories');

    Route::get('getSubCategories/{id}','CommonController@getSubCategories');
    Route::get('getBrands/{id}','CommonController@getBrands');
    Route::get('getExistedCategories/{id}','CommonController@getExistedCategories'); //get existed categories to show to shop manager not to be confused
    Route::post('addNewProduct','CommonController@addNewProduct');// add new product in database
    Route::post('addNewDeliveryMan','ProductController@addNewDeliveryMan');// add new DeliveryMan in database
    Route::post('addNewUnit','ProductController@addNewUnit');// add new Unit in database
    
    Route::get('getMainUnits','CommonController@getMainUnits');
    Route::get('getSubunits/{id}','CommonController@getSubunits');
});
