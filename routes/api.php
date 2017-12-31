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
    //categories routes
    Route::get('getMainCategories','CommonController@getMainCategories');
    Route::get('getSubCategories/{id}','CommonController@getSubCategories');
    Route::get('getSubmenu/{id}','CommonController@getSubmenu');
    Route::get('getBrands/{id}','CommonController@getBrands');
    Route::get('getExistedCategories/{id}','CommonController@getExistedCategories'); //get existed categories to show to shop manager not to be confused
    Route::post('findCategoryProduct','CommonController@findCategoryProduct');
    Route::get('getDisabledCategories/{id}','CommonController@getDisabledCategories');
    Route::get('getAllDisabledCategories','CommonController@getAllDisabledCategories');

    //unit counts routes
    Route::get('getSubunits/{id}','CommonController@getSubunits');
    Route::get('getMainUnits','CommonController@getMainUnits');
    Route::post('getSubunitsBySubUnitTitle','CommonController@getSubunitsBySubUnitTitle');

    //color routes
    Route::get('getColors','CommonController@getColors');

    //size routes
    Route::get('getSizes','CommonController@getSizes');

    //payment type routes
    Route::get('getPaymentTypes','CommonController@getPaymentTypes');
});

//below routes are related to some special operation in index page such as add to basket or ...
Route::group(['prefix' => '/v1/user'],function (){

    Route::post('addToBasket','webService\UserController@addToBasket');
    Route::post('getBasketCountNotify','webService\UserController@getBasketCountNotify');
    Route::post('getBasketTotalPrice','webService\UserController@getBasketTotalPrice');
    Route::post('getBasketContent','webService\UserController@getBasketContent');
    Route::get('showProducts/{id}','webService\UserController@showProducts');
    Route::post('removeItemFromBasket','webService\UserController@removeItemFromBasket');
    Route::post('addOrSubCount','webService\UserController@addOrSubCount');
    Route::post('orderRegistration','webService\UserController@orderRegistration');
    Route::post('addCommentForEachProduct','webService\UserController@addCommentForEachProduct');

});

//below routes are related to some general routes in index routes such menu and ...

Route::group(['prefix' => '/v1/general'],function(){

    Route::get('getMainMenu','webService\GeneralController@getMainMenu');
    Route::get('getSubMenu/{id}','webService\GeneralController@getSubMenu');
    Route::get('getBrands/{id}','webService\GeneralController@getBrands');
    Route::post('order','webService\GeneralController@order');

});



