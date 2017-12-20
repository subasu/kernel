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
use App\Models\Category;

Route::get('/','IndexController@index');
Route::get('index','IndexController@home');
Route::get('productFiles','IndexController@productFiles');
Route::get('myLogin','IndexController@login');
Route::get('town/{cid}','IndexController@town');
Route::get('products','IndexController@products');
Route::get('captcha', 'IndexController@create_image');
Route::get('getSubmenu/{id}','CommonController@getSubmenu');
Route::get('showProducts/{id}','IndexController@showProducts');
Route::get('order/{parameter}','IndexController@order');
Route::get('factor',function (){
    return view('main.factor');
});
Route::get('checkout',function (){
    $menu = Category::where([['parent_id',null],['grand_parent_id',null],['depth','<>',0]])->get();
    $pageTitle = 'پرداخت نهایی';
    return view('main.checkout', compact('pageTitle', 'menu'));
});

//admin routes

Route::group(['prefix'=>'admin'],function() {

//categories
    Route::get('addCategory', 'CategoryController@addCategory');//show add category view
    Route::get('categoriesManagement', 'CategoryController@categoriesManagement');//show view of all category
    Route::post('addNewCategory', 'CategoryController@addNewCategory');// add new category in database
    Route::get('editCategory/{id}', 'CategoryController@editCategory');//this route is related to edit main category
    Route::get('showSubCategory/{id}', 'CategoryController@showSubCategory');//this route is related to edit sub category
    Route::post('editCategoryPicture', 'CategoryController@editCategoryPicture');//this route is related to edit category picture
    Route::post('editCategoryTitle', 'CategoryController@editCategoryTitle');//this route is related ti edit category title
    Route::post('enableOrDisableCategory','CategoryController@enableOrDisableCategory');//this route is related to make categories enable or disable
//units
    Route::get('addUnit', 'UnitController@addUnit');//show add unit view
    Route::get('unitCountManagement', 'UnitController@unitCountManagement');//show view of all units and subUnits
    Route::post('addNewUnit', 'UnitController@addNewUnit');//show view of all units and subUnits
    Route::get('subUnitManagement/{id}', 'UnitController@subUnitManagement');//show view of all units and subUnits
    Route::get('editUnitCount/{id}', 'UnitController@editUnitCount');
    Route::post('editUnitCountTitle', 'UnitController@editUnitCountTitle');

//productFiles
    Route::get('addProduct', 'ProductController@addProduct');//show add product view
    Route::get('productsManagement', 'ProductController@productsManagement');//show view of all product's details
    Route::post('addNewProduct', 'ProductController@addNewProduct');// add new product in database
    Route::post('updateProduct', 'ProductController@updateProduct');// update Product in database
    Route::get('productDetails/{id}', 'ProductController@productDetailsGet');
//users
    Route::get('usersManagement', 'UserController@usersManagement');//show view of all customer's details


//orders
    Route::get('ordersManagement', 'OrderController@ordersManagement');//show view of all orders

//deliveryMan
    Route::get('addDeliveryMan', 'DeliveryManController@addDeliveryMan');//show add DeliveryMan view
    Route::get('deliveryMansManagement', 'DeliveryManController@deliveryMansManagement');//show view of all deliveryMans's details

//color routes
    Route::get('colorsManagement','ColorController@colorsManagement'); //this route is related to show all colors
    Route::get('addColors','ColorController@addColors'); //this route is related to show add colors blade
    Route::post('addNewColors','ColorController@addNewColors');//this route is related to add new colors
    Route::get('editColor/{id}','ColorController@editColor'); //this route is related to return edit color view
    Route::post('editColorTitle','ColorController@editColorTitle');//this route is related to edit color title

//size routes
    Route::get('sizesManagement','SizeController@sizesManagement');//this route is related to return view of size management
    Route::get('addSizes','SizeController@addSizes');//this route is related to return view of add size
    Route::post('addNewSize','SizeController@addNewSize');//this route is related to add new size in data base
    Route::get('editSize/{id}','SizeController@editSize'); //this route is related to return edit color view
    Route::post('editSizeTitle','SizeController@editSizeTitle');//this route is related to edit size title

//payment type routes
    Route::get('addPaymentType','PaymentTypeController@addPaymentType');//this route is related to return add payment type blade
    Route::post('addNewPaymentTypes','PaymentTypeController@addNewPaymentTypes');
    Route::get('paymentTypesManagement','PaymentTypeController@paymentTypesManagement');
    Route::get('editPaymentType/{id}','PaymentTypeController@editPaymentType');
    Route::post('editPaymentTypeTitle','PaymentTypeController@editPaymentTypeTitle');
});

//user routes

Route::group(['prefix'=>'user'],function() {
    Route::post('addToBasket','UserController@addToBasket');
    Route::get('getBasketCountNotify','UserController@getBasketCountNotify');
    Route::get('getBasketTotalPrice','UserController@getBasketTotalPrice');
    Route::get('getBasketContent','UserController@getBasketContent');
    Route::post('removeItemFromBasket','UserController@removeItemFromBasket');
    Route::post('orderFixed','UserController@orderFixed');
    Route::post('addOrSubCount','UserController@addOrSubCount');

});

//Auth::routes();
// Authentication Routes...
Route::get('login', 'IndexController@login')->name('login');//rayat 20-9-96
Route::post('login', 'Auth\LoginController@login');//rayat 20-9-96
Route::post('logout', 'Auth\LoginController@logout');//rayat 20-9-96
Route::get('logout', 'Auth\LoginController@logout');//rayat 20-9-96

// Registration Routes...
Route::get('register', 'IndexController@showRegistrationForm');//rayat 20-9-96
Route::post('register', 'IndexController@register');//rayat 20-9-96
// Password Reset Routes...
Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm');//rayat 20-9-96
Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail');//rayat 20-9-96
Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm');//rayat 20-9-96
Route::post('reset', 'Auth\ResetPasswordController@reset');//rayat 20-9-96

//Route::get('/home', 'Auth\RegisterController@register')->name('home');
