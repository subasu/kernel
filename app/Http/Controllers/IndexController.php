<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

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
}
