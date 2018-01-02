<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/lib/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{url('public/main/assets/lib/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/lib/select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{url('public/main/assets/lib/jquery.bxslider/jquery.bxslider.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/lib/owl.carousel/owl.carousel.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/lib/jquery-ui/jquery-ui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/css/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/css/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('public/main/assets/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('public/css/persianDatepicker-default.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/sweetalert.css')}}">
    <link href="{{URL::asset('public/css/pnotify.custom.min.css')}}" media="all" rel="stylesheet" type="text/css" />
    <title>@if(!empty($pageTitle)){{$pageTitle}}@endif</title>
</head>
<body class="home">
<!-- TOP BANNER -->
{{--<div id="top-banner" class="top-banner">--}}
{{--<div class="bg-overlay"></div>--}}
{{--<div class="container">--}}
{{--<h1>Special Offer!</h1>--}}
{{--<h2>Additional 40% OFF For Men & Women Clothings</h2>--}}
{{--<span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>--}}
{{--<span class="btn-close"></span>--}}
{{--</div>--}}
{{--</div>--}}
<!-- HEADER -->
<!--/.top-header -->
@include('layouts.header')

<!-- end header -->
@yield('content')
<!-- Footer -->
<footer id="footer">
    <div class="container" dir="rtl">
        <!-- introduce-box -->
        <div id="introduce-box" class="row">
            <div class="col-md-3">
                <div id="address-box">
                    <a href="#"><img src="{{url('public/main/assets/data/introduce-logo.png')}}" alt=""/></a>
                    <div id="address-list">
                        <div class="tit-name">آدرس:</div>
                        <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                        <div class="tit-name">تلفن:</div>
                        <div class="tit-contain">+00 123 456 789</div>
                        <div class="tit-name">ایمیل:</div>
                        <div class="tit-contain">support@business.com</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="introduce-title">فروشگاه</div>
                        <ul id="introduce-company" class="introduce-list">
                            <li><a href="#">درباره ی ما</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">تماس با ما</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <div class="introduce-title">حساب کاربری</div>
                        <ul id="introduce-Account" class="introduce-list">
                            <li><a href="#">My Order</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">My Credit Slip</a></li>
                            <li><a href="#">My Addresses</a></li>
                            <li><a href="#">My Personal In</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <div class="introduce-title">پشتیبانی</div>
                        <ul id="introduce-support" class="introduce-list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="contact-box">
                    <div class="introduce-title">عضویت در خبرنامه</div>
                    <div class="input-group" id="mail-box">
                        <input type="text" placeholder="ایمیل شما"/>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">ثبت</button>
                          </span>
                    </div><!-- /input-group -->
                    <div class="introduce-title">با ما در شبکه های اجتماعی</div>
                    <div class="social-link">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-vk"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>

            </div>
        </div><!-- /#introduce-box -->

        <!-- #trademark-box -->
        {{--<div id="trademark-box" class="row">--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul id="trademark-list">--}}
                    {{--<li id="payment-methods">Accepted Payment Methods</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-ups.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-qiwi.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-wu.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-cn.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-visa.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-mc.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-ems.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-dhl.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-fe.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><img src="public/main/assets/data/trademark-wm.jpg" alt="ups"/></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div> <!-- /#trademark-box -->--}}

        <!-- #trademark-text-box -->
        <div id="trademark-text-box" class="row">
            {{--<div class="col-sm-12">--}}
                {{--<ul id="trademark-search-list" class="trademark-list">--}}
                    {{--<li class="trademark-text-tit">HOT SEARCHED KEYWORDS:</li>--}}
                    {{--<li><a href="#">Xiaomio Mi3</a></li>--}}
                    {{--<li><a href="#">Digiflipo Pro XT 712 Tablet</a></li>--}}
                    {{--<li><a href="#">Mi 3 Phones</a></li>--}}
                    {{--<li><a href="#">Iphoneo 6 Plus</a></li>--}}
                    {{--<li><a href="#">Women's Messenger Bags</a></li>--}}
                    {{--<li><a href="#">Wallets</a></li>--}}
                    {{--<li><a href="#">Women's Clutches</a></li>--}}
                    {{--<li><a href="#">Backpacks Totes</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul id="trademark-tv-list" class="trademark-list">--}}
                    {{--<li class="trademark-text-tit">TVS:</li>--}}
                    {{--<li><a href="#">Sonyo TV</a></li>--}}
                    {{--<li><a href="#">Samsing TV</a></li>--}}
                    {{--<li><a href="#">LGG TV</a></li>--}}
                    {{--<li><a href="#">Onidai TV</a></li>--}}
                    {{--<li><a href="#">Toshibao TV</a></li>--}}
                    {{--<li><a href="#">Philipsi TV</a></li>--}}
                    {{--<li><a href="#">Micromaxo TV</a></li>--}}
                    {{--<li><a href="#">LED TV</a></li>--}}
                    {{--<li><a href="#">LCD TV</a></li>--}}
                    {{--<li><a href="#">Plasma TV</a></li>--}}
                    {{--<li><a href="#">3D TV</a></li>--}}
                    {{--<li><a href="#">Smart TV</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul id="trademark-mobile-list" class="trademark-list">--}}
                    {{--<li class="trademark-text-tit">MOBILES:</li>--}}
                    {{--<li><a href="#">Moto E</a></li>--}}
                    {{--<li><a href="#">Samsing Mobile</a></li>--}}
                    {{--<li><a href="#">Micromaxi Mobile</a></li>--}}
                    {{--<li><a href="#">Nokian Mobile</a></li>--}}
                    {{--<li><a href="#">HTCi Mobile</a></li>--}}
                    {{--<li><a href="#">Sonyo Mobile</a></li>--}}
                    {{--<li><a href="#">Appleo Mobile</a></li>--}}
                    {{--<li><a href="#">LGG Mobile</a></li>--}}
                    {{--<li><a href="#">Karbonni Mobile</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul id="trademark-laptop-list" class="trademark-list">--}}
                    {{--<li class="trademark-text-tit">LAPTOPS::</li>--}}
                    {{--<li><a href="#">Appleo Laptop</a></li>--}}
                    {{--<li><a href="#">Acer Laptop</a></li>--}}
                    {{--<li><a href="#">Samsing Laptop</a></li>--}}
                    {{--<li><a href="#">Lenov Laptop</a></li>--}}
                    {{--<li><a href="#">Sonyo Laptop</a></li>--}}
                    {{--<li><a href="#">Delli Laptop</a></li>--}}
                    {{--<li><a href="#">Asuso Laptop</a></li>--}}
                    {{--<li><a href="#">Toshibao Laptop</a></li>--}}
                    {{--<li><a href="#">LGG Laptop</a></li>--}}
                    {{--<li><a href="#">HPo Laptop</a></li>--}}
                    {{--<li><a href="#">Notebook</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul id="trademark-watches-list" class="trademark-list">--}}
                    {{--<li class="trademark-text-tit">WATCHES:</li>--}}
                    {{--<li><a href="#">FCUKo Watches</a></li>--}}
                    {{--<li><a href="#">Titan Watches</a></li>--}}
                    {{--<li><a href="#">Casioo Watches</a></li>--}}
                    {{--<li><a href="#">Fastrack Watches</a></li>--}}
                    {{--<li><a href="#">Timexi Watches</a></li>--}}
                    {{--<li><a href="#">Fossili Watches</a></li>--}}
                    {{--<li><a href="#">Dieselo Watches</a></li>--}}
                    {{--<li><a href="#">Toshibao Laptop</a></li>--}}
                    {{--<li><a href="#">Luxury Watches</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul id="trademark-shoes-list" class="trademark-list">--}}
                    {{--<li class="trademark-text-tit">FOOTWEAR:</li>--}}
                    {{--<li><a href="#">Shoes</a></li>--}}
                    {{--<li><a href="#">Casual Shoes</a></li>--}}
                    {{--<li><a href="#">Sports Shoes</a></li>--}}
                    {{--<li><a href="#">Adidasi Shoes</a></li>--}}
                    {{--<li><a href="#">Gas Shoes</a></li>--}}
                    {{--<li><a href="#">Pumai Shoes</a></li>--}}
                    {{--<li><a href="#">Reeboki Shoes</a></li>--}}
                    {{--<li><a href="#">Woodlandi Shoes</a></li>--}}
                    {{--<li><a href="#">Red tape Shoes</a></li>--}}
                    {{--<li><a href="#">Nikeo Shoes</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div><!-- /#trademark-text-box -->
        <div id="footer-menu-box">
            {{--<div class="col-sm-12">--}}
                {{--<ul class="footer-menu-list">--}}
                    {{--<li><a href="#">Company Info - Partnerships</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul class="footer-menu-list">--}}
                    {{--<li><a href="#">Online Shopping</a></li>--}}
                    {{--<li><a href="#">Promotions</a></li>--}}
                    {{--<li><a href="#">My Orders</a></li>--}}
                    {{--<li><a href="#">Help</a></li>--}}
                    {{--<li><a href="#">Site Map</a></li>--}}
                    {{--<li><a href="#">Customer Service</a></li>--}}
                    {{--<li><a href="#">Support</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul class="footer-menu-list">--}}
                    {{--<li><a href="#">Most Populars</a></li>--}}
                    {{--<li><a href="#">Best Sellers</a></li>--}}
                    {{--<li><a href="#">New Arrivals</a></li>--}}
                    {{--<li><a href="#">Special Products</a></li>--}}
                    {{--<li><a href="#">Manufacturers</a></li>--}}
                    {{--<li><a href="#">Our Stores</a></li>--}}
                    {{--<li><a href="#">Shipping</a></li>--}}
                    {{--<li><a href="#">Payments</a></li>--}}
                    {{--<li><a href="#">Warantee</a></li>--}}
                    {{--<li><a href="#">Refunds</a></li>--}}
                    {{--<li><a href="#">Checkout</a></li>--}}
                    {{--<li><a href="#">Discount</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12">--}}
                {{--<ul class="footer-menu-list">--}}
                    {{--<li><a href="#">Terms & Conditions</a></li>--}}
                    {{--<li><a href="#">Policy</a></li>--}}
                    {{--<li><a href="#">Shipping</a></li>--}}
                    {{--<li><a href="#">Payments</a></li>--}}
                    {{--<li><a href="#">Returns</a></li>--}}
                    {{--<li><a href="#">Refunds</a></li>--}}
                    {{--<li><a href="#">Warrantee</a></li>--}}
                    {{--<li><a href="#">FAQ</a></li>--}}
                    {{--<li><a href="#">Contact</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            <p class="text-center">Copyrights &#169; 2015 KuteShop. All Rights Reserved. Designed by KuteThemes.com</p>
        </div><!-- /#footer-menu-box -->
    </div>
</footer>
{{csrf_field()}}
<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<input type="hidden" id="token" value="{{csrf_token()}}" name="_token">
<!-- Script-->
<script type="text/javascript" src="{{url('public/main/assets/lib/jquery/jquery-1.11.2.min.js')}}"></script>
<!-- below script get and load sub menu -->
<script>
    $(document).ready(function () {
        $(".mainMenu").each(function () {
            $(this).hover(function () {
                var id = $(this).attr('name');
                var token = $(this).data("token");
                $.ajax({
                    dataType: "json",
                    url: "{{url('getSubmenu')}}" + '/' + id,
                    cash: false,
                    type: "get",
                    data: {
                        "_method": 'get',
                        "_token": token
                    },
                    success: function (response) {
                        var item = $(".submenu");
                        item.empty();
                        var x = 1;
                        $.each(response.submenu, function (key, value) {
                            if(value.hasProduct==1)
                            {
                                if (value.catImg != null && x == 1) {
                                    item.append('<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                        '<ul class="block">' +
                                        '<li class="img_container">' +
                                        '<img src="{{url('public/dashboard/image')}}/'+value.catImg+'" alt="' + value.title + '" title="' + value.title + '" >' +
                                        '</li>' +
                                        '</ul></li>')
                                }
                                x = 0;
                                var len = value.brands.length;
                                if (len != 0 || value.title == 'سایر') {
                                    if (value.title == 'سایر')
                                    {
                                        var temp = '<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                            '<ul class="block">' +
                                            '<li class="link_container group_header">' +
                                            '<a href="#">سایر محصولات</a>' +
                                            '</li>';
                                        temp += '<li class="link_container" id="' + value.id + '">' +
                                            '<a href="{{url('showProducts')}}'+"/"+value.id+'">مشاهده ی سایر محصولات</a>' +
                                            '</li>';
                                        temp += '</ul>' + '</li>';
                                        item.append(temp)
                                    }
                                    else {
                                        var temp = '<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                            '<ul class="block">' +
                                            '<li class="link_container group_header">' +
                                            '<a href="#">' + value.title + '</a>' +
                                            '</li>';
                                        $.each(value.brands, function (key, value) {
                                            temp += '<li class="link_container" id="' + value.id + '">' +
                                                '<a href="{{url('showProducts')}}'+"/"+value.id+' ">' + value.title + '</a>' +
                                                '</li>';
                                        });
                                        temp += '</ul>' + '</li>'
                                        item.append(temp)
                                    }

                                }
                            }

                        });
                    }
                })
                //$(".submenu").show(100);
            });
            $(this).mouseleave(function () {
                var item = $(".mainMenu>ul");
                item.empty();
                //$(".submenu").hide(1);
            })
        })
    })
</script>
<script type="text/javascript" src="{{url('public/main/assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/lib/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/lib/owl.carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/lib/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/js/jquery.actual.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/lib/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/lib/jquery.elevatezoom.js')}}"></script>
<script type="text/javascript" src="{{url('public/main/assets/js/theme-script.js')}}"></script>
<script src="{{url('public/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/js/pnotify.custom.min.js')}}"></script>
<script>
    $(document).ready(function () {
        basketCountNotify();
        basketTotalPrice();
        basketContent();
       // handlePayButton();
    })
</script>
<!-- below script is related to add to basket -->

<script>
    $(document).on('click','#addToBasket',function () {

        var productFlag = $(this).attr('content');
        var  productId = $(this).attr('name');
        var token      = $('#token').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax
        ({
            url      : "{{url('user/addToBasket')}}",
            type     : "post",
            data     : {'productId' : productId , '_token' : token , 'productFlag' : productFlag},
            dataType : "json",
            success  : function(response)
            {
                console.log(response);
                if(response.code == 1)
                {
                    var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                    new PNotify({
                        title: response.message,
                        text: "",
                        addclass: "stack-custom",
                        type:"success",
                        stack: myStack
                    })
                    basketCountNotify();
                    basketTotalPrice();
                    basketContent();
                }else
                {
                    var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                    new PNotify({
                        title: response.message,
                        text: '',
                        addclass: "stack-custom",
                        type:"success",
                        stack: myStack
                    })
                }

            },error  : function(error)
            {
                console.log(error);
                alert('خطایی رخ داده است')
            }
        })
    })
</script>


<script>
    //below function is related to make pay button shown or not shown
//    function handlePayButton(response)
//    {
//        if(response == 0)
//        {
//            $('#pay').css('display','none');
//        }
//    }


    //below function is related to get basket count
    function basketCountNotify()
    {
        var token = $('#token').val();
        $.ajax
        ({
            url         : "{{url('user/getBasketCountNotify')}}",
            type        : "get",
            dataType    : "json",
            data        : {'_token' : token},
            success     : function(response)

            {
                console.log(response);
                $('#basketCountNotify').text(response);
                handlePayButton(response);
            },
            error       : function (error) {
                console.log(error);
            }

        });
    }

    //below function is related to get total price
    function basketTotalPrice()
    {
        var token = $('#token').val();
        $.ajax
        ({
            url         : "{{url('user/getBasketTotalPrice')}}",
            type        : "get",
            dataType    : "json",
            data        : {'_token' : token},
            success     : function(response)

            {
                console.log(response);
                $('.total').text(formatNumber(response) + ' ' + 'تومان'  );
                $('#orderTotal').text(formatNumber(response) + ' ' + 'تومان'  );
            },
            error       : function (error) {
                console.log(error);
            }

        });
    }

    //below function is related to get basket content
    function basketContent()
    {
        var token = $('#token').val();
        $.ajax
        ({
            url         : "{{url('user/getBasketContent')}}",
            type        : "get",
            dataType    : "json",
            data        : {'_token' : token},
            success     : function(response)

            {
                console.log(response.products.length);
                $('#cartBlockList').empty();
                var len = response.products.length;
                var i   = 0;
                while(i < len )
                {
                    $('#cartBlockList').append
                    (
                        '<ul>'+
                        '<li class="product-info">'+
                        '<div class="p-left">'+
                        '<a name="'+response.products[i].product_id+'" content="'+response.products[i].basket_id+'" id="removeFromBasket" class="fa fa-trash-o color-red"></a>'+
                        '</div>'+
                        '<div class="p-right">'+
                        '<p class="p-name"><span>عنوان : </span><span class="color-black">'+response.products[i].title+'</span></p>'+
                        '<p><span> قیمت : </span><span class="p-rice color-black">'+formatNumber(response.products[i].price)+'</span></p>'+
                        '<p><span>تعداد : </span><span class="color-black">'+response.products[i].count+'</span></p>'+
                        '</div>'+
                        '</li>'+
                        '</ul>'
                    )
                    i++;
                }

            },
            error       : function (error) {
                console.log(error);
            }

        });
    }
</script>
<script>
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
</script>

<!-- below script is related to remove item from basket -->
<script>
    $(document).on('click','#removeFromBasket',function(){
        var productId = $(this).attr('name');
        var basketId  = $(this).attr('content');
        var token     = $('#token').val();
        $.ajax
        ({
            url      : "{{url('user/removeItemFromBasket')}}",
            type     : "post",
            data     : {'productId' : productId , 'basketId' : basketId , '_token' : token},
            dataType : "json",
            success   : function(response)
            {
                if(response.code == 1)
                {
                    swal({
                        title: "",
                        text: response.message,
                        type: "success",
                        confirmButtonText: "بستن"
                    });
                    setTimeout(function(){
                        window.location.reload(true);
                    },5000);

                }else
                {
                    swal({
                        title: "",
                        text: response.message,
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
            }

        })
    })
</script>

<!-- below script is related to remove basket items inj order page -->
<script>
    $(document).on('click','#removeItem',function(){
       var price      = $(this).attr('data-target');
       var orderTotal = $('#orderTotal').attr('content');
       var productId  = $(this).attr('name');
       var basketId   = $(this).attr('content');
        var token     = $('#token').val();
        var DOM       = $('#orderTable');
        var td        = $(this);
        $.ajax
        ({
            url       : "{{url('user/removeItemFromBasket')}}",
            type      : "post",
            data      : {'productId' : productId , 'basketId' : basketId , '_token' : token},
            dataType  : "json",
            context   : {'DOM' : DOM  ,'td' : td},
            success   : function(response)
            {
                if(response.code == 1)
                {
                    swal({
                        title: "",
                        text: response.message,
                        type: "success",
                        confirmButtonText: "بستن"
                    });
                    $('#orderTotal').text(formatNumber(orderTotal - price) +  'تومان'  );
                    $(td).parentsUntil(DOM,'tr').remove();
                    basketCountNotify();
                    basketTotalPrice();
                    basketContent();
                    if(response.count == 0)
                        window.history.back();

                }else
                {
                    swal({
                        title: "",
                        text: response.message,
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
            }

        })
    });
</script>

<!-- below script is related to fix or register order -->
<script>
    $(document).on('click','#orderFixed',function(){
       var token = $('#token').val();
       $.ajax
       ({
            url      : "{{url('user/orderFixed')}}",
            type     : "post",
            data     :  {'_token' : token},
            dataType : "json",
            success  : function(response)
            {
                if(response.code == 1)
                {
                    window.location.href = 'factor';
                }
            },error  : function(error)
            {
               console.log(error);
            }
       });
    });
</script>


<!-- below script is related to handle addToCount  -->
<script>
    $('.addToCount').each(function(){
        $(this).click(function(){
            var productId  = $(this).attr('content');
            var basketId   = $(this).attr('name');
            var token      = $('#token').val();
            var count      = $(this).closest('td').find('input.input-sm').val();
            var unitPrice  = $(this).closest('td').prev('td').attr('content');
            var td         = $(this);
            $(td).css('pointer-events','none');
            $(td).css('color','#adaaaa');
            $.ajax
            ({
                url      : "{{url('user/addOrSubCount')}}",
                type     : "post",
                data     :  {'_token' : token , 'productId' : productId , 'basketId' : basketId , 'parameter' : 'addToCount'},
                dataType : "json",
                context  :  td ,
                success  : function(response)
                {
                    console.log(response);
                    if(response.code == 1)
                    {
                        $(td).closest('td').find('input.input-sm').val(++count);
                        var newCount = $(td).closest('td').find('input.input-sm').val();
                        var sum = unitPrice * newCount ;
                        $(td).closest('td').next('td').text(formatNumber(sum) + 'تومان');
                        basketTotalPrice();
                        setTimeout(function () {
                            $(td).css('pointer-events','');
                            $(td).css('color','#666');
                        },5000);
                    }
                },error  : function(error)
                {
                    console.log(error);
                }
            });
        })
    })
</script>
<!-- below script is related to handle subFromCount  -->
<script>
    $('.subFromCount').each(function(){
        $(this).click(function(){

            var productId  = $(this).attr('content');
            var basketId   = $(this).attr('name');
            var token      = $('#token').val();
            var count      = $(this).closest('td').find('input.input-sm').val();
            var unitPrice  = $(this).closest('td').prev('td').attr('content');
            var td         = $(this);
            $(td).css('pointer-events','none');
            $(td).css('color','#adaaaa');
            if(count == 1)
            {
                swal({
                    title: "",
                    text: 'در صورتی که می خواهید کالایی را از سبد خرید حذف کنید می بایست دکمه حذف را بزنید',
                    type: "warning",
                    confirmButtonText: "بستن"
                });
                setTimeout(function () {
                    $(td).css('pointer-events','');
                },5000);
                return false;
            }else
            {
                $.ajax
                ({
                    url      : "{{url('user/addOrSubCount')}}",
                    type     : "post",
                    data     :  {'_token' : token , 'productId' : productId , 'basketId' : basketId , 'parameter' : 'subFromCount'},
                    context  : td,
                    dataType : "json",
                    success  : function(response)
                    {

                        if(response.code == 1)
                        {

                            $(td).closest('td').find('input.input-sm').val(--count);
                            var newCount = $(td).closest('td').find('input.input-sm').val();
                            var sum = unitPrice * newCount;
                            $(td).closest('td').next('td').text(formatNumber(sum) + 'تومان');
                            basketTotalPrice();
                            setTimeout(function () {
                                $(td).css('pointer-events','');
                                $(td).css('color','#666');
                            },5000);

                        }
                    },error  : function(error)
                    {
                        console.log(error);
                    }
                });
            }
        })
    })

</script>

<!-- below script is related to add order in data base -->
<script>
    $(document).on('click','#orderRegistration',function () {
        var formData = $('#orderDetailForm').serialize();
        var userCellphone    = $('#userCellphone').val();
        var userCoordination = $('#userCoordination').val();
        $.ajax
        ({
            url         : "{{url('user/orderRegistration')}}",
            type        : "post",
            data        : formData,
            dataType    : 'JSON',
            beforeSend  : function()
            {
                if(userCellphone == '' || userCellphone == null)
                {
                    $('#userCellphone').focus();
                    $('#userCellphone').css('border-color','red');
                    return false;
                }
                if(userCoordination == '' || userCoordination == null)
                {
                    $('#userCoordination').focus();
                    $('#userCoordination').css('border-color','red');
                    return false;
                }

            },
            success : function(response)
            {
                console.log(response);
                if(response.code == 1)
                {
                    swal
                    ({
                        title: "",
                        text: response.message +'\n' + response.userPassword,
                        type: "success",
                        confirmButtonText: "بستن"
                    });
                    setTimeout(function(){
                        window.location.href = '../login';
                    },15000);
                }else
                    {
                        swal
                        ({
                            title: "",
                            text: response.message,
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
            },
            error   : function(error)
            {
                if(error.status === 500)
                {
                    console.log(error);
                    swal
                    ({
                        title: "",
                        text: "خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید",
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
                if (error.status === 422) {

                    var errors = error.responseJSON; //this will get the errors response data.

                    var errorsHtml = '';

                    $.each(errors, function (key, value) {
                        errorsHtml += value[0] + '\n'; //showing only the first error.
                    });
                     //errorsHtml += errorsHtml;

                    swal({
                        title: "",
                        text: errorsHtml,
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
            }
        });
        $("[name='search_select']").change(function () {
            console.log($(this).val())
            $("#form_search").attr('action','{{url('search')}}/'+$(this).val())
        })
    })
</script>


<!-- below script is related to add seen count of product -->
<script>
    $(document).on('click','#goToDetail',function(){
            var productId = $(this).attr('content');
            var token     = $('#token').val();
            $.ajax
            ({
                url     : "{{url('user/addToSeenCount')}}",
                type    : "post",
                data    : {'productId': productId , '_token' : token},
                success : function(response)
                {
                    console.log(response);
                },error : function(error)
                {
                  console.log(error);
                }
            })
    })
</script>
</body>
</html>
