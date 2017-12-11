<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('layouts.adminLayout');
    }
    public function home()
    {
        $menu=Category::where('depth','=','2')->get();
        $pageTitle='صفحه ی اصلی';
        return view('main.index',compact('pageTitle','menu'));
    }
    public function login()
    {
        $menu=Category::where('depth','=','2')->get();
        $capital=City::where('parent_id','=','1')->get();
        $pageTitle='ورود/عضویت';
        return view('main.login',compact('pageTitle','menu','capital'));
    }
    //show product page in main site
    public function products()
    {
        $menu=Category::where('depth','=','2')->get();
        $pageTitle='لیست محصولات';
        return view('main.products',compact('pageTitle','menu'));
    }
    //find city of a selected capital in register page
    public function town($cid)
    {
        $towns=City::where('parent_id','=',$cid)->get();
        return response()->json($towns);
    }
    //make captcha- called by ajax
    function create_image()
    {
        $time=round(microtime(true)*1000);
        $image=imagecreate(180,45);
        $background_color=imagecolorallocate($image,190,190,190);
        $text_color=imagecolorallocate($image,225,255,255);
        $line_color=imagecolorallocate($image,0,210,0);
        $pixel_color=imagecolorallocate($image,0,70,250);

        imagefilledrectangle($image,0,0,180,45,$background_color);

        for($i=0;$i<3;$i++)
        {
            imageline($image,0,rand(0,45),180,rand(0,45),$line_color);
        }
        for($i=0;$i<200;$i++)
        {
            imagesetpixel($image,rand(0,180),rand(0,45),$pixel_color);
        }
        $letters="c7b8d9efhgij123kqlonmps456tauvw0zxyr";
        $len=strlen($letters);
        $word="";
        $font=public_path() ."/main/assets/fonts/arial.ttf";
        for($i=0;$i<5;$i++)
        {
            $letter=$letters[rand(0,$len-1)];
            imagettftext($image,18,rand(10,45),25+($i*30),30,$text_color,$font,$letter);
            $word=$word.$letter;

        }
        session()->put('captcha', $word);
        $array=glob('*.png');

        foreach( $array as  $x  )
        {
            $create_time=str_replace('.png','',$x);
            if($time-$create_time>20000)
                unlink($x);
        }
        imagepng($image,$time.".png");
        return response()->json($time.".png");

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
            $validation= Validator::make($data->all(), [
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
                    'email.required' => ' فیلد ایمیل الزامی است',
                    'email.email' => ' فرمت ایمیل نادرست است ',
                    'email.unique' => ' این ایمیل قبلا استفاده شده است ',
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
                    'password_confirmation.required'=>'فیلد تکرار پسورد ضروری است'
                ]);
        }//end of if
        $errors = $validation->errors();
        if(!$errors->isEmpty())
            return response()->json( $errors);

        if ($data['frmtype'] == "user")
        {
            $role_id=1;
        }
        $capital=City::where('id','=',$data['capital'])->value('title');
        return User::create([
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
        return response()->json(['success' => true]);
    }
}
