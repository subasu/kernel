<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\City;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    //
    public function index()
    {
        $role_id = Auth::user()->role_id;
        $admin_id = Role::where('title', '=', 'admin')->value('id');
        $user_id = Role::where('title', '=', 'user')->value('id');
        if ($role_id == $admin_id)
            return view('layouts.adminLayout');
        elseif ($role_id == $user_id)
            return view('layouts.userLayout');
    }

    public function search(Request $request)
    {
//        if($request->search_type==1)
//        {
//
//        }
//        elseif($request->search_type==2)
//        {
//            $result=Category::where('title','like','%'.$request->search_key.'%')->get();
//            foreach ($result as $item) {
//                if($item->depth==2)
//                {
//                    $item->subcat=Category::where('parent_id','=',$item->id)->get();
//                }
//                if($item->depth==1)
//                {
//                    $item->brand=Category::where('parent_id','=',$item->id)->get();
//                }
//                $results1=CategoryProduct::where('category_id','=','383')->get();
//                $results2=CategoryProduct::where('category_id','=','383')->get();
//                $results = array_merge($results1->toArray(), $results2->toArray());
//                $collection = collect($results);
//            }
//            dd($collection);
//        }

        $results = Product::where('title', 'like', '%' . $request->search_key . '%')
            ->orWhere('description', 'like', '%' . $request->search_key . '%')->get();
        $menu = $this->loadMenu();
        return view('main.searchResult', compact('results', 'menu'));
    }

    public function loadMenu()
    {
        $menu = Category::where([['parent_id', null], ['grand_parent_id', null], ['active', 1]])->get();
        foreach ($menu as $sub) {
            $submenu = Category::where([['parent_id', $sub->id], ['active', 1]])->orderBy('depth', 'DESC')->get();
            foreach ($submenu as $sm) {
                $sm->brands = Category::where([['parent_id', $sm->id], ['active', 1]])->get();
                $x = 0;
                foreach ($sm->brands as $val) {
                    $x = CategoryProduct::where('product_id', '=', $val->id)->get();
                }
            }
            if ($x)
                $sub->hasProduct = 1;
            else
                $sub->hasProduct = 0;
        }

        return $menu;

    }

    public function home()
    {
        $menu = $this->loadMenu();
        $pageTitle = 'صفحه ی اصلی';
        return view('main.index', compact('pageTitle', 'menu'));
    }

    //show login blade :in login blade there are 2 form for login and registeration
    public function login()
    {
        $menu = $this->loadMenu();
        $capital = City::where('parent_id', '=', '1')->get();
        $pageTitle = 'ورود/عضویت';
        return view('main.login', compact('pageTitle', 'menu', 'capital'));
    }

    //show product page in main site
    public function products()
    {
        $menu = $menu = $this->loadMenu();
        $pageTitle = 'لیست محصولات';
        return view('main.products', compact('pageTitle', 'menu'));
    }

    //find city of a selected capital in register page,call by ajax from login blade
    public function town($cid)
    {
        $towns = City::where('parent_id', '=', $cid)->get();
        return response()->json($towns);
    }

    //make captcha- called by ajax
    function createCaptchaImage()
    {
        $time = round(microtime(true) * 1000);
        $image = imagecreate(180, 45);
        $background_color = imagecolorallocate($image, 190, 190, 190);
        $text_color = imagecolorallocate($image, 225, 255, 255);
        $line_color = imagecolorallocate($image, 0, 210, 0);
        $pixel_color = imagecolorallocate($image, 0, 70, 250);

        imagefilledrectangle($image, 0, 0, 180, 45, $background_color);

        for ($i = 0; $i < 3; $i++) {
            imageline($image, 0, rand(0, 45), 180, rand(0, 45), $line_color);
        }
        for ($i = 0; $i < 200; $i++) {
            imagesetpixel($image, rand(0, 180), rand(0, 45), $pixel_color);
        }
        $letters = "c7b8d9efhgij123kqlonmps456tauvw0zxyr";
        $len = strlen($letters);
        $word = "";
        $font = public_path() . "/main/assets/fonts/arial.ttf";
        for ($i = 0; $i < 5; $i++) {
            $letter = $letters[rand(0, $len - 1)];
            imagettftext($image, 18, rand(10, 45), 25 + ($i * 30), 30, $text_color, $font, $letter);
            $word = $word . $letter;

        }
        session()->put('captcha', $word);
        $array = glob('*.png');

        foreach ($array as $x) {
            $create_time = str_replace('.png', '', $x);
            if ($time - $create_time > 20000)
                unlink($x);
        }
        imagepng($image, $time . ".png");
        return response()->json($time . ".png");

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function register(request $data)
    {
        if ($data['frmtype'] == "user") {
            $validation = Validator::make($data->all(), [
                    'name' => 'sometimes|nullable|max:255',
                    'family' => 'sometimes|nullable|max:255',
                    'email' => 'sometimes|nullable|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required',
                    'address' => 'sometimes|nullable|max:1000',
                    'telephone' => 'sometimes|nullable|numeric|size:11',
                    'cellphone' => 'required|numeric|min:11|unique:users',
                    'birth_date' => 'sometimes|nullable|min:8|max:10',
                    'capital' => 'required',
                    'town' => 'required',
                    'zipCode' => 'sometimes|nullable|numeric|min:10',
                    'captcha' => 'required|in:' . session()->get('captcha')
                ]
                ,
                [
                    'name.required' => ' فیلد نام الزامی است',
                    'name.max' => 'حداکثر 255 کاراکتر مجاز است',
                    'family.required' => ' فیلد نام خانوادگی الزامی است ',
                    'family.max' => 'حداکثر 255 کاراکتر مجاز است',
                    'email.required' => ' فیلد ایمیل/نام کاربری الزامی است',
                    'email.unique' => ' ایمیل/نام کاربری قبلا استفاده شده است ',
                    'cellphone.unique' => ' این تلفن همراه قبلا استفاده شده است ',
                    'password.required' => ' فیلد رمز عبور الزامی است ',
                    'password.min' => ' رمز عبور حداقل باید 6 کاراکتر باشد ',
                    'password.confirmed' => ' رمز عبور و تکرار آن با هم مطابقت ندارند ',
                    'captcha.required' => ' فیلد کد امنیتی الزامی است ',
                    'captcha.in' => ' کد امنیتی وارد شده صحیح نیست ',
                    'cellphone.required' => ' فیلد تلفن همراه الزامی است ',
                    'cellphone.numeric' => 'فیلد موبایل باید عددی باشد',
                    'telephone.required' => ' فیلد تلفن الزامی است ',
                    'telephone.numeric' => ' فیلد تلفن عددی است',
                    'zipCode.numeric' => ' فیلد کدپستی عددی است',
                    'telephone.size' => ' فیلد تلفن باید 11 رقمی باشد',
                    'cellphone.size' => ' فیلد موبایل باید 11 رقمی باشد',
                    'town.required' => ' فیلد شهرستان ضروری است',
                    'capital.required' => ' فیلد استان ضروری است',
                    'password_confirmation.required' => 'فیلد تکرار پسورد ضروری است'
                ]);
        }//end of if
        $errors = $validation->errors();
        if (!$errors->isEmpty())
            return response()->json($errors);

        if ($data['frmtype'] == "user") {
            $role_id = 1;
        }
        $capital = City::where('id', '=', $data['capital'])->value('title');
        $result = User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cellphone' => $data['cellphone'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'capital_city_id' => $capital,
            'town_city_id' => $data['town'],
            'telephone' => $data['telephone'],
            'role_id' => $role_id,
            'zipCode' => $data['zipCode'],
//            'register_date' => date_create(),
        ]);
        if ($result)
            return response()->json(['data' => 1]);
        else
            return response()->json(['data' => 0]);

    }


    //below function is to return show product blade with pagination
    //first time show by view second time show by ajax
    public function showProducts($id, Request $request)
    {
        $menu = $menu = $this->loadMenu();
        $pageTitle = 'لیست محصولات';
        $categories = Category::find($id);
        $products = $categories->products()->paginate(12);
        if ($request->ajax()) {
            return view('main.presult', compact('menu', 'pageTitle', 'categories', 'products'));
        }
        return view('main.showProducts', compact('menu', 'pageTitle', 'categories', 'products'));
    }

    //below function is to return show product blade
    public function productDetail($id)
    {
        $menu = $menu = $this->loadMenu();
        $product = Product::find($id);
        $pageTitle = Product::where('id', '=', $id)->value('title');
        $brand = $product->categories[0]->id;
        $subcatId = Category::where('id', '=', $brand)->value('parent_id');
        $subcat = \App\Models\Category::where('id', '=', $subcatId)->value('title');
        $cat = Category::where('id', '=', $subcat)->value('title');
        return view('main.productDetail', compact('menu', 'pageTitle', 'product', 'cat', 'subcat'));
    }


    //below function is related to return order view
    public function order($parameter)
    {
        $menu = $menu = $this->loadMenu();
        //$categories  = Category::find($id);
        if (isset($_COOKIE['addToBasket'])) {

            switch ($parameter) {
                case 'basketDetail':
                    $pageTitle = 'لیست سفارشات';
                    $basketId = Basket::where([['cookie', $_COOKIE['addToBasket']], ['payment', 0]])->value('id');
                    if ($basketId) {
                        $baskets = Basket::find($basketId);
                        $total = 0;
                        foreach ($baskets->products as $basket) {
                            $basket->count = $basket->pivot->count;
                            $basket->price = $basket->pivot->product_price;
                            $basket->sum = $basket->pivot->count * $basket->pivot->product_price;
                            $total += $basket->sum;
                            $basket->basket_id = $basket->pivot->basket_id;
                        }
                        return view('main.order', compact('menu', 'pageTitle', 'baskets', 'total'));
                    } else {
                        return Redirect::back();
                    }

                    break;

                case 'orderDetail':
                    $pageTitle = 'جزئیات سفارش';
                    $paymentTypes = PaymentType::where('active', 1)->get();
                    $basketId = Basket::where([['cookie', $_COOKIE['addToBasket']], ['payment', 0]])->value('id');
                    $baskets = Basket::find($basketId);
                    $total = 0;
                    $totalDiscount = 0;
                    $totalPostPrice = 0;
                    $finalPrice = 0;
                    if (!empty($baskets)) {
                        foreach ($baskets->products as $basket) {
                            $basket->count = $basket->pivot->count;
                            $basket->price = $basket->pivot->product_price;
                            $basket->sum = $basket->pivot->count * $basket->pivot->product_price;
                            $total += $basket->sum;
                            $basket->basket_id = $basket->pivot->basket_id;
                            $totalPostPrice += $basket->post_price;
                            $basket->product_id = $basket->pivot->product_id;
                            if ($basket->discount_volume != null) {
                                $totalDiscount += $basket->discount_volume;
                                if ($totalDiscount > 0) {
                                    $basket->sumOfDiscount = ($total * $totalDiscount) / 100;
                                }
                            }

                        }
                        $finalPrice += ($total + $totalPostPrice) - $basket->sumOfDiscount;
                        return view('main.orderDetail', compact('menu', 'pageTitle', 'baskets', 'total', 'totalPostPrice', 'finalPrice', 'paymentTypes'));
                    } else {
                        return view('errors.403');
                    }

                    break;
            }

        } else {
            return Redirect::back();
        }

    }

}
