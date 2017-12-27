<div id="header" class="header">
    <div class="top-header">
    <div class="container">
        <div class="nav-top-links">
            <a class="first-item" href="#"><img alt="phone"  src="{{url('public/main/assets/images/phone.png')}}" />00-62-658-658</a>
            <a href="#"><img alt="email"  src="{{url('public/main/assets/images/email.png')}}" />تماس با ما</a>
        </div>
        <div class="currency ">
            <div class="dropdown">
                <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">واحد پول</a>
                <ul class="dropdown-menu text-right" role="menu">
                    <li><a href="#">تومان</a></li>
                    <li><a href="#">ریال</a></li>
                </ul>
            </div>
        </div>
        <div class="language ">
            <div class="dropdown">
                <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <img alt="email" src="{{url('public/main/assets/images/fr.jpg')}}" />فارسی

                </a>
                <ul class="dropdown-menu text-right" role="menu">
                    <li><a href="#"><img alt="email" src="{{url('public/main/assets/images/en.jpg')}}" />انگلیسی</a></li>
                    <li><a href="#"><img alt="email" src="{{url('public/main/assets/images/fr.jpg')}}" />فارسی</a></li>
                </ul>
            </div>
        </div>

        <div class="support-link">
            <a href="#">خدمات</a>
            <a href="#">پشتیبانی</a>
        </div>

        <div id="user-info-top" class="user-info pull-right">
            <div class="dropdown">
                <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>حساب من</span></a>
                <ul class="dropdown-menu mega_dropdown text-right" role="menu">
                    <li><a href="{{url('login')}}">ورود/ثبت نام</a></li>
                    {{--<li><a href="#">مقایسه</a></li>--}}
                    {{--<li><a href="#">علاقه مندی ها</a></li>--}}
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- MAIN HEADER -->
<div class="container main-header">
    <div class="row">
        <div class="col-xs-12 col-sm-3 logo">
            <a href="{{url('/')}}"><img alt="KernelShop"  src="{{url('public/main/assets/images/logo.png')}}" /></a>
        </div>
        <div class="col-xs-7 col-sm-7 header-search-box">
            <form class="form-inline" id="search_form" action="{{url('search')}}" method="post">
                {{csrf_field()}}
                <div class="form-group form-category">
                    {{--<select class="select-category1" name="search_type">--}}
                        {{--<option value="1">جستجو نام محصول</option>--}}
                        {{--<option value="2">جستجو در دسته بندیها</option>--}}
                    {{--</select>--}}
                </div>
                <div class="form-group input-serach ">
                    <input type="text" class="text-right" name="search_key" placeholder="...جستجو در عنوان و توضیحات محصول">
                </div>
                <button type="submit" id="send_search" class="pull-right btn-search"></button>
            </form>
        </div>
        <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
            <a class="cart-link" >
                {{--<span class="title" id="basketCount">سبدخرید شما<span class="">0</span></span>--}}
                <span id="totalPrice" class="total">0</span>
                <span id="basketCountNotify" class="notify notify-left">0</span>
            </a>
            <div class="cart-block">
                <div class="cart-block-content">
                    <h2  align="center" dir="rtl">محتویات سبد خرید</h2>
                    <br/>
                    <div id="cartBlockList" class="cart-block-list">

                    </div>
                    <div class="toal-cart" style="text-align: right;direction: rtl" >
                        <span class="pull-right">جمع کل</span>
                        <span class="total"></span>
                    </div>
                    <div class="cart-buttons">
                        <a href="{{url('order/basketDetail')}}" id="pay" class="btn-check-out" style="width: 100%; font-size: 120%;">مشاهده جزئیات سبد خرید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END MANIN HEADER -->
    <!--  my main menu -->
<div id="nav-top-menu" class="nav-top-menu">
    <div class="container">
        <div class="row">
            <div id="main-menu" class="col-sm-12 main-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                                    aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">صفحه ی اصلی</a></li>
                                @foreach($menu as $mnu)
                                    @if($mnu->hasProduct)
                                    <li class="dropdown mainMenu"  name="{{$mnu->id}}">
                                        <a class="dropdown-toggle" data-toggle="dropdown">{{$mnu->title}}</a>
                                        <ul class="dropdown-menu mega_dropdown submenu" role="menu" style="width: 830px;">

                                        </ul>
                                    </li>
                                    @endif
                                @endforeach
                                {{--<li class="dropdown">--}}
                                    {{--<a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Foods</a>--}}
                                    {{--<ul class="mega_dropdown dropdown-menu" style="width: 830px;">--}}
                                        {{--<li class="block-container col-sm-3">--}}
                                            {{--<ul class="block">--}}
                                                {{--<li class="link_container group_header">--}}
                                                    {{--<a href="#">Asian</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Vietnamese Pho</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Noodles</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Seafood</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container group_header">--}}
                                                    {{--<a href="#">Sausages</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Meat Dishes</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Desserts</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Tops</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Tops</a>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li class="block-container col-sm-3">--}}
                                            {{--<ul class="block">--}}
                                                {{--<li class="link_container group_header">--}}
                                                    {{--<a href="#">European</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Greek Potatoes</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Famous Spaghetti</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Famous Spaghetti</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container group_header">--}}
                                                    {{--<a href="#">Chicken</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Italian Pizza</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">French Cakes</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Tops</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Tops</a>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li class="block-container col-sm-3">--}}
                                            {{--<ul class="block">--}}
                                                {{--<li class="link_container group_header">--}}
                                                    {{--<a href="#">FAST</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Hamberger</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Pizza</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Noodles</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container group_header">--}}
                                                    {{--<a href="#">Sandwich</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Salad</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Paste</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Tops</a>--}}
                                                {{--</li>--}}
                                                {{--<li class="link_container">--}}
                                                    {{--<a href="#">Tops</a>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li class="block-container col-sm-3">--}}
                                            {{--<ul class="block">--}}
                                                {{--<li class="img_container">--}}
                                                    {{--<img src="public/main/assets/data/banner-topmenu.jpg" alt="Banner">--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Digital</a>--}}
                                    {{--<ul class="dropdown-menu container-fluid">--}}
                                        {{--<li class="block-container">--}}
                                            {{--<ul class="block">--}}
                                                {{--<li class="link_container"><a href="#">Mobile</a></li>--}}
                                                {{--<li class="link_container"><a href="#">Tablets</a></li>--}}
                                                {{--<li class="link_container"><a href="#">Laptop</a></li>--}}
                                                {{--<li class="link_container"><a href="#">Memory Cards</a></li>--}}
                                                {{--<li class="link_container"><a href="#">Accessories</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>                </nav>
            </div>
            <!-- دسته بندی ها--->
            {{--<div class="col-sm-3" id="box-vertical-megamenus">--}}
                {{--<div class="box-vertical-megamenus">--}}
                    {{--<h4 class="title">--}}
                        {{--<span class="btn-open-mobile pull-left home-page"><i class="fa fa-bars"></i></span>--}}
                        {{--<span class="title-menu pull-right">دسته بندی ها</span>--}}
                    {{--</h4>--}}
                    {{--<div class="vertical-menu-content is-home">--}}
                        {{--<ul class="vertical-menu-list">--}}
                            {{--<li><a href="#">Electronics<img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/1.png"></a></li>--}}
                            {{--<li>--}}
                                {{--<a class="parent" href="#">Sports &amp; Outdoors<img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/2.png"></a>--}}
                                {{--<div class="vertical-dropdown-menu">--}}
                                    {{--<div class="vertical-groups col-sm-12">--}}
                                        {{--<div class="mega-group col-sm-4">--}}
                                            {{--<h4 class="mega-group-header"><span>Tennis</span></h4>--}}
                                            {{--<ul class="group-link-default">--}}
                                                {{--<li><a href="#">Tennis</a></li>--}}
                                                {{--<li><a href="#">Coats &amp; Jackets</a></li>--}}
                                                {{--<li><a href="#">Blouses &amp; Shirts</a></li>--}}
                                                {{--<li><a href="#">Tops &amp; Tees</a></li>--}}
                                                {{--<li><a href="#">Hoodies &amp; Sweatshirts</a></li>--}}
                                                {{--<li><a href="#">Intimates</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="mega-group col-sm-4">--}}
                                            {{--<h4 class="mega-group-header"><span>Swimming</span></h4>--}}
                                            {{--<ul class="group-link-default">--}}
                                                {{--<li><a href="#">Dresses</a></li>--}}
                                                {{--<li><a href="#">Coats &amp; Jackets</a></li>--}}
                                                {{--<li><a href="#">Blouses &amp; Shirts</a></li>--}}
                                                {{--<li><a href="#">Tops &amp; Tees</a></li>--}}
                                                {{--<li><a href="#">Hoodies &amp; Sweatshirts</a></li>--}}
                                                {{--<li><a href="#">Intimates</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="mega-group col-sm-4">--}}
                                            {{--<h4 class="mega-group-header"><span>Shoes</span></h4>--}}
                                            {{--<ul class="group-link-default">--}}
                                                {{--<li><a href="#">Dresses</a></li>--}}
                                                {{--<li><a href="#">Coats &amp; Jackets</a></li>--}}
                                                {{--<li><a href="#">Blouses &amp; Shirts</a></li>--}}
                                                {{--<li><a href="#">Tops &amp; Tees</a></li>--}}
                                                {{--<li><a href="#">Hoodies &amp; Sweatshirts</a></li>--}}
                                                {{--<li><a href="#">Intimates</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="mega-custom-html col-sm-12">--}}
                                            {{--<a href="#"><img  src="public/main/assets/data/banner-megamenu.jpg" alt="Banner"></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/3.png">Smartphone &amp; Tablets</a></li>--}}
                            {{--<li><a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/4.png">Health &amp; Beauty Bags</a></li>--}}
                            {{--<li>--}}
                                {{--<a class="parent" href="#">--}}
                                    {{--<img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/5.png">Shoes &amp; Accessories</a>--}}
                                {{--<div class="vertical-dropdown-menu">--}}
                                    {{--<div class="vertical-groups col-sm-12">--}}
                                        {{--<div class="mega-group col-sm-12">--}}
                                            {{--<h4 class="mega-group-header"><span>Special products</span></h4>--}}
                                            {{--<div class="row mega-products">--}}
                                                {{--<div class="col-sm-3 mega-product">--}}
                                                    {{--<div class="product-avatar">--}}
                                                        {{--<a href="#"><img  src="public/main/assets/data/p10.jpg" alt="product1"></a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-name">--}}
                                                        {{--<a href="#">Fashion hand bag</a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-price">--}}
                                                        {{--<div class="new-price">$38</div>--}}
                                                        {{--<div class="old-price">$45</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-star">--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star-half-o"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-sm-3 mega-product">--}}
                                                    {{--<div class="product-avatar">--}}
                                                        {{--<a href="#"><img  src="public/main/assets/data/p11.jpg" alt="product1"></a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-name">--}}
                                                        {{--<a href="#">Fashion hand bag</a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-price">--}}
                                                        {{--<div class="new-price">$38</div>--}}
                                                        {{--<div class="old-price">$45</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-star">--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star-half-o"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-sm-3 mega-product">--}}
                                                    {{--<div class="product-avatar">--}}
                                                        {{--<a href="#"><img  src="public/main/assets/data/p12.jpg" alt="product1"></a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-name">--}}
                                                        {{--<a href="#">Fashion hand bag</a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-price">--}}
                                                        {{--<div class="new-price">$38</div>--}}
                                                        {{--<div class="old-price">$45</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-star">--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star-half-o"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-sm-3 mega-product">--}}
                                                    {{--<div class="product-avatar">--}}
                                                        {{--<a href="#"><img  src="public/main/assets/data/p13.jpg" alt="product1"></a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-name">--}}
                                                        {{--<a href="#">Fashion hand bag</a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-price">--}}
                                                        {{--<div class="new-price">$38</div>--}}
                                                        {{--<div class="old-price">$45</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-star">--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star"></i>--}}
                                                        {{--<i class="fa fa-star-half-o"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/6.png">Toys &amp; Hobbies</a></li>--}}
                            {{--<li><a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/7.png">Computers &amp; Networking</a></li>--}}
                            {{--<li><a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/8.png">Laptops &amp; Accessories</a></li>--}}
                            {{--<li><a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/9.png">Jewelry &amp; Watches</a></li>--}}
                            {{--<li><a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/10.png">Flashlights &amp; Lamps</a></li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/11.png">--}}
                                    {{--Cameras &amp; Photo--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="cat-link-orther">--}}
                                {{--<a href="#">--}}
                                    {{--<img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/5.png">--}}
                                    {{--Television--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="cat-link-orther">--}}
                                {{--<a href="#">--}}
                                    {{--<img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/7.png">Computers &amp; Networking--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="cat-link-orther">--}}
                                {{--<a href="#">--}}
                                    {{--<img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/6.png">--}}
                                    {{--Toys &amp; Hobbies--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="cat-link-orther">--}}
                                {{--<a href="#"><img class="icon-menu" alt="Funky roots"  src="public/main/assets/data/9.png">Jewelry &amp; Watches</a></li>--}}
                        {{--</ul>--}}
                        {{--<div class="all-category"><span class="open-cate">All Categories</span></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
        <!-- userinfo on top-->
        <div id="user-info-opntop">
        </div>
        <!-- CART ICON ON MMENU -->
        <div id="shopping-cart-box-ontop">
            <i class="fa fa-shopping-cart"></i>
            <div class="shopping-cart-box-ontop-content"></div>
        </div>
    </div>
</div>
</div>
