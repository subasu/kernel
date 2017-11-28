<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//main site
Route::get('/','IndexController@index');
Route::get('/index','IndexController@home');
//categories
Route::get('/addCategory','IndexController@addCategory');
Route::post('addNewCategory','ProductController@addNewCategory');
Route::get('/categoriesManagement','ProductController@categoriesManagement');
//units
Route::get('/addUnit','ProductController@addUnit');
Route::post('/addNewUnit','ProductController@addNewUnit');
Route::get('/unitsManagement','ProductController@unitsManagement');
//products
Route::get('/addProduct','ProductController@addProduct');
Route::post('/addNewProduct','ProductController@addNewProduct');
Route::get('/productsManagement','ProductController@productsManagement');
//users
Route::get('/usersManagement','ProductController@usersManagement');
//orders
Route::get('/ordersManagement','ProductController@ordersManagement');
//deliveryMan
Route::get('/addDeliveryMan','ProductController@addDeliveryMan');
Route::post('/addNewDeliveryMan','ProductController@addNewDeliveryMan');
Route::get('/deliveryMansManagement','ProductController@deliveryMansManagement');