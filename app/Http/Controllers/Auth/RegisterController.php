<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//        ]);

        if ($data['frmtype'] == "user") {
            return Validator::make($data, [
                    'name' => 'sometimes|nullable|max:255',
                    'family' => 'sometimes|nullable|max:255',
                    'email' => 'sometimes|nullable|max:255|unique:users',
                    'password' => 'sometimes|nullable|min:6|confirmed',
                    'address' => 'sometimes|nullable|max:1000',
                    'telephone' => 'sometimes|nullable|numeric|size:11',
                    'cellphone' => 'sometimes|nullable|numeric|size:11',
                    'birth_date' => 'sometimes|nullable|numeric|min:8|max:10',
                    'register_date' => 'sometimes|nullable|numeric|min:8|max:10',
                    'birth_date' => 'sometimes|nullable|numeric|min:8|max:10',
                    'capital_city_id' => 'sometimes|nullable|numeric',
                    'town_city_id' => 'sometimes|nullable|numeric',
                    'cellphone' => 'required|numeric|max:11|min:11',
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
                    'password.required' => ' فیلد رمز عبور الزامی است ',
                    'password.min' => ' رمز عبور حداقل باید 6 کاراکتر باشد ',
                    'password.confirmed' => ' رمز عبور و تکرار آن با هم مطابقت ندارند ',
                    'captcha.required' => ' فیلد کد امنیتی الزامی است. ',
                    'captcha.in' => ' کد امنیتی وارد شده صحیح نیست. ',
                    'cellphone.required' => ' فیلد تلفن همراه الزامی است ',
                    'cellphone.numeric' => 'فیلد موبایل باید عددی باشد',
                    'telephone.required' => ' فیلد تلفن الزامی است ',
                    'telephone.numeric' => ' فیلد تلفن عددی است',
                    'telephone.size' => ' فیلد تلفن باید 11 رقمی باشد',
                    'cellphone.size' => ' فیلد موبایل باید 11 رقمی باشد',
                ]);;
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cellphone' => $data['cellphone'],
            'birth_date' => $data['birth_date'],
            'register_date' => $data['register_date'],
            'address' => $data['address'],
            'capital_city_id' => $data['capital_city_id'],
            'town_city_id' => $data['town_city_id'],
            'telephone' => $data['telephone'],
            'role_id' => $data['role_id'],
        ]);
    }
}
