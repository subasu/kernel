@extends('layouts.mainLayout')
@section('content')

    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">خانه</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">نام دسته</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <!-- Left colunm -->
                <div class="column col-xs-12 col-sm-3" id="left_column">
                    <!-- block category -->
                    <div class="block left-module">
                        <p class="title_block">Today's Deals</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered">
                                <div class="layered-content">
                                    <div class="today-deals">
                                        <ul class="deals-product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3,"margin":20},"1000":{"items":1}}'>
                                            <li>
                                                <div class="product-conatainer">
                                                    <div class="product-thumb">
                                                        <a href="#">
                                                            <img src="{{url('public/main/assets/data/ld2.jpg')}}" alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="show-count-down">
                                                            <span class="countdown-lastest" data-y="2015" data-m="7" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                                                        </div>
                                                        <h5 class="product-name">
                                                            <a href="#"> Jackets and coats</a>
                                                        </h5>
                                                        <div class="product-meta">
                                                            <span class="price">$38,95</span>
                                                            <span class="old-price">$52,00</span>
                                                            <span class="star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-conatainer">
                                                    <div class="product-thumb">
                                                        <a href="#">
                                                            <img src="public/main/assets/data/ld1.jpg" alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="show-count-down">
                                                            <span class="countdown-lastest" data-y="2015" data-m="7" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                                                        </div>
                                                        <h5 class="product-name">
                                                            <a href="#"> Jackets and coats</a>
                                                        </h5>
                                                        <div class="product-meta">
                                                            <span class="price">$38,95</span>
                                                            <span class="old-price">$52,00</span>
                                                            <span class="star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-conatainer">
                                                    <div class="product-thumb">
                                                        <a href="#">
                                                            <img src="public/main/assets/data/ld3.jpg" alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="show-count-down">
                                                            <span class="countdown-lastest" data-y="2015" data-m="7" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                                                        </div>
                                                        <h5 class="product-name">
                                                            <a href="#"> Jackets and coats</a>
                                                        </h5>
                                                        <div class="product-meta">
                                                            <span class="price">$38,95</span>
                                                            <span class="old-price">$52,00</span>
                                                            <span class="star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ./layered -->
                        </div>
                    </div>
                    <!-- ./block category  -->
                    <!-- block filter -->
                    <div class="block left-module">
                        <p class="title_block">Filter selection</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-filter-price">
                                <!-- filter categgory -->
                                <div class="layered_subtitle">CATEGORIES</div>
                                <div class="layered-content">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="c1" name="cc" />
                                            <label for="c1">
                                                <span class="button"></span>
                                                Tops<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c2" name="cc" />
                                            <label for="c2">
                                                <span class="button"></span>
                                                T-shirts<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c3" name="cc" />
                                            <label for="c3">
                                                <span class="button"></span>
                                                Dresses<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c4" name="cc" />
                                            <label for="c4">
                                                <span class="button"></span>
                                                Jackets and coats<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c5" name="cc" />
                                            <label for="c5">
                                                <span class="button"></span>
                                                Knitted<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c6" name="cc" />
                                            <label for="c6">
                                                <span class="button"></span>
                                                Pants<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c7" name="cc" />
                                            <label for="c7">
                                                <span class="button"></span>
                                                Bags & Shoes<span class="count">(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c8" name="cc" />
                                            <label for="c8">
                                                <span class="button"></span>
                                                Best selling<span class="count">(10)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter categgory -->
                                <!-- filter price -->
                                <div class="layered_subtitle">price</div>
                                <div class="layered-content slider-range">

                                    <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                                    <div class="amount-range-price">Range: $50 - $350</div>
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="p1" name="cc" />
                                            <label for="p1">
                                                <span class="button"></span>
                                                $20 - $50<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="p2" name="cc" />
                                            <label for="p2">
                                                <span class="button"></span>
                                                $50 - $100<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="p3" name="cc" />
                                            <label for="p3">
                                                <span class="button"></span>
                                                $100 - $250<span class="count">(0)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter price -->
                                <!-- filter color -->
                                <div class="layered_subtitle">Color</div>
                                <div class="layered-content filter-color">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="color1" name="cc" />
                                            <label style=" background:#aab2bd;" for="color1"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color2" name="cc" />
                                            <label style=" background:#cfc4a6;" for="color2"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color3" name="cc" />
                                            <label style=" background:#aab2bd;" for="color3"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color4" name="cc" />
                                            <label style=" background:#fccacd;" for="color4"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color5" name="cc" />
                                            <label style="background:#964b00;" for="color5"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color6" name="cc" />
                                            <label style=" background:#faebd7;" for="color6"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color7" name="cc" />
                                            <label style=" background:#e84c3d;" for="color7"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color8" name="cc" />
                                            <label style=" background:#c19a6b;" for="color8"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color9" name="cc" />
                                            <label style=" background:#f39c11;" for="color9"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color10" name="cc" />
                                            <label style=" background:#5d9cec;" for="color10"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color11" name="cc" />
                                            <label style=" background:#a0d468;" for="color11"><span class="button"></span></label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color12" name="cc" />
                                            <label style=" background:#f1c40f;" for="color12"><span class="button"></span></label>
                                        </li>

                                    </ul>
                                </div>
                                <!-- ./filter color -->
                                <!-- ./filter brand -->
                                <div class="layered_subtitle">brand</div>
                                <div class="layered-content filter-brand">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="brand1" name="cc" />
                                            <label for="brand1">
                                                <span class="button"></span>
                                                Channelo<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand2" name="cc" />
                                            <label for="brand2">
                                                <span class="button"></span>
                                                Mamypokon<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand3" name="cc" />
                                            <label for="brand3">
                                                <span class="button"></span>
                                                Pamperson<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand4" name="cc" />
                                            <label for="brand4">
                                                <span class="button"></span>
                                                Pumano<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="brand5" name="cc" />
                                            <label for="brand5">
                                                <span class="button"></span>
                                                AME<span class="count">(0)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter brand -->
                                <!-- ./filter size -->
                                <div class="layered_subtitle">Size</div>
                                <div class="layered-content filter-size">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="size1" name="cc" />
                                            <label for="size1">
                                                <span class="button"></span>X
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size2" name="cc" />
                                            <label for="size2">
                                                <span class="button"></span>XXL
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size3" name="cc" />
                                            <label for="size3">
                                                <span class="button"></span>XL
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size4" name="cc" />
                                            <label for="size4">
                                                <span class="button"></span>XXL
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size5" name="cc" />
                                            <label for="size5">
                                                <span class="button"></span>M
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size6" name="cc" />
                                            <label for="size6">
                                                <span class="button"></span>XXS
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size7" name="cc" />
                                            <label for="size7">
                                                <span class="button"></span>S
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size8" name="cc" />
                                            <label for="size8">
                                                <span class="button"></span>XS
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size9" name="cc" />
                                            <label for="size9">
                                                <span class="button"></span>34
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size10" name="cc" />
                                            <label for="size10">
                                                <span class="button"></span>36
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size11" name="cc" />
                                            <label for="size11">
                                                <span class="button"></span>35
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="size12" name="cc" />
                                            <label for="size12">
                                                <span class="button"></span>37
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter size -->
                            </div>
                            <!-- ./layered -->

                        </div>
                    </div>
                    <!-- ./block filter  -->

                    <!-- left silide -->
                    <div class="col-left-slide left-module">
                        <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                            <li><a href="#"><img src="public/main/assets/data/slide-left.jpg" alt="slide-left"></a></li>
                            <li><a href="#"><img src="public/main/assets/data/slide-left2.jpg" alt="slide-left"></a></li>
                            <li><a href="#"><img src="public/main/assets/data/slide-left3.png" alt="slide-left"></a></li>
                        </ul>

                    </div>
                    <!--./left silde-->
                    <!-- SPECIAL -->
                    <div class="block left-module">
                        <p class="title_block">SPECIAL PRODUCTS</p>
                        <div class="block_content">
                            <ul class="products-block">
                                <li>
                                    <div class="products-block-left">
                                        <a href="#">
                                            <img src="public/main/assets/data/product-100x122.jpg" alt="SPECIAL PRODUCTS">
                                        </a>
                                    </div>
                                    <div class="products-block-right">
                                        <p class="product-name">
                                            <a href="#">Woman Within Plus Size Flared</a>
                                        </p>
                                        <p class="product-price">$38,95</p>
                                        <p class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="products-block">
                                <div class="products-block-bottom">
                                    <a class="link-all" href="#">All Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./SPECIAL -->
                    <!-- TAGS -->
                    <div class="block left-module">
                        <p class="title_block">TAGS</p>
                        <div class="block_content">
                            <div class="tags">
                                <a href="#"><span class="level1">actual</span></a>
                                <a href="#"><span class="level2">adorable</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level4">consider</span></a>
                                <a href="#"><span class="level3">phenomenon</span></a>
                                <a href="#"><span class="level4">span</span></a>
                                <a href="#"><span class="level1">spanegs</span></a>
                                <a href="#"><span class="level5">spanegs</span></a>
                                <a href="#"><span class="level1">actual</span></a>
                                <a href="#"><span class="level2">adorable</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level4">consider</span></a>
                                <a href="#"><span class="level2">gives</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level2">gives</span></a>
                                <a href="#"><span class="level1">good</span></a>
                                <a href="#"><span class="level3">phenomenon</span></a>
                                <a href="#"><span class="level4">span</span></a>
                                <a href="#"><span class="level1">spanegs</span></a>
                                <a href="#"><span class="level5">spanegs</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- ./TAGS -->
                    <!-- Testimonials -->
                    <div class="block left-module">
                        <p class="title_block">Testimonials</p>
                        <div class="block_content">
                            <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="public/main/assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="public/main/assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="public/main/assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ./Testimonials -->
                </div>
                <!-- ./left colunm -->
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <!-- category-slider -->
                    <div class="category-slider">
                        <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                            <li>
                                <img src="public/main/assets/data/category-slide.jpg" alt="category-slider">
                            </li>
                            <li>
                                <img src="public/main/assets/data/slide-cart2.jpg" alt="category-slider">
                            </li>
                        </ul>
                    </div>
                    <!-- ./category-slider -->

                    <!-- category short-description -->
                    <div class="cat-short-desc">
                        <div class="desc-text text-right">
                            <h4>
                                . فروشگاه ما سعی دارد در خدمت رسانی به شما مشتریان گرامی مسیری نو در جهت خدمت رسانی ارائه دهد
                            </h4>
                        </div>
                        {{--<div class="cat-short-desc-products">--}}
                        {{--<ul class="row">--}}
                        {{--<li class="col-sm-3">--}}
                        {{--<div class="product-container">--}}
                        {{--<div class="product-thumb">--}}
                        {{--<a href="#"><img src="public/main/assets/data/sub-cat1.jpg" alt="Product"></a>--}}
                        {{--</div>--}}
                        {{--<h5 class="product-name">--}}
                        {{--<a href="#">Sub category 1</a>--}}
                        {{--<span>(90)</span>--}}
                        {{--</h5>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-sm-3">--}}
                        {{--<div class="product-container">--}}
                        {{--<div class="product-thumb">--}}
                        {{--<a href="#"><img src="public/main/assets/data/sub-cat2.jpg" alt="Product"></a>--}}
                        {{--</div>--}}
                        {{--<h5 class="product-name">--}}
                        {{--<a href="#">Sub category 2</a>--}}
                        {{--<span>(55)</span>--}}
                        {{--</h5>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-sm-3">--}}
                        {{--<div class="product-container">--}}
                        {{--<div class="product-thumb">--}}
                        {{--<a href="#"><img src="public/main/assets/data/sub-cat3.jpg" alt="Product"></a>--}}
                        {{--</div>--}}
                        {{--<h5 class="product-name">--}}
                        {{--<a href="#">Sub category 3</a>--}}
                        {{--<span>(100)</span>--}}
                        {{--</h5>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-sm-3">--}}
                        {{--<div class="product-container">--}}
                        {{--<div class="product-thumb">--}}
                        {{--<a href="#"><img src="public/main/assets/data/sub-cat4.jpg" alt="Product"></a>--}}
                        {{--</div>--}}
                        {{--<h5 class="product-name">--}}
                        {{--<a href="#">Sub category 4</a>--}}
                        {{--<span>(70)</span>--}}
                        {{--</h5>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                    <!-- ./category short-description -->
                    <!-- view-product-list-->
                    <div id="view-product-list" class="view-product-list">
                        <h2 class="page-heading">
                            <span class="page-heading-title">محصولات دسته   :   {{$categories->title}}</span>
                        </h2>
                        <ul class="display-product-option">
                            {{--<li class="view-as-grid selected">--}}
                            {{--<span>grid</span>--}}
                            {{--</li>--}}
                            {{--<li class="view-as-list">--}}
                            {{--<span>list</span>--}}
                            {{--</li>--}}
                        </ul>
                        <!-- PRODUCT LIST -->

                        <ul class="row product-list style2 grid">
                            @foreach($categories->products as $product)
                                <li class="col-sx-12 col-sm-4">
                                    <div class="product-container">
                                        <div align="center" >
                                            <a>
                                                <img  alt=" عنوان محصول"  style="text-decoration: underline;"/>
                                            </a>
                                            <div class="quick-view">
                                                {{--<a title="افزودن به علاقه مندی ها" class="heart" ></a>--}}
                                                {{--<a title="مقایسه" class="compare" ></a>--}}
                                                {{--<a title="نمایش چزئیات" class="search" ></a>--}}
                                            </div>
                                        </div>

                                        <div class="right-block ">


                                            <h5 class="product-name">
                                                @if(strlen($product->title) != mb_strlen($product->title, 'utf-8'))
                                                    <a  class="text-right">{{$product->title}}</a>
                                                @endif
                                                @if(strlen($product->title) == mb_strlen($product->title, 'utf-8'))
                                                    <a  class="text-left">{{$product->title}}</a>
                                                @endif
                                            </h5>

                                            <div class="content_price text-right">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        @foreach($product->productFlags as $flag)
                                                            @if($flag->active == 1)
                                                                <a class="price price" id="productFlag" data-toggle="" name="{{$flag->price}}" title="تومان">{{number_format($flag->price)}} </a>

                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-7">
                                                        <span class="price product-price"> : قیمت اصلی </span>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="">
                                            <div class="content_price text-right">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                    <span class="product-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="price product-price">  :امتیاز  </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="right-block">
                                            <div class="add-to-cart" >
                                                <button class="btn btn-success"
                                                @foreach($product->productFlags as $flag)
                                                    @if($flag->active == 1)
                                                        content = "{{$flag->price}}"
                                                    @endif
                                                @endforeach
                                                        id="addToBasket"  name="{{$product->id}}">
                                                        <span></span>افزودن به سبدخرید
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            @endforeach
                        </ul>

                        <!-- ./PRODUCT LIST -->
                    </div>
                    <!-- ./view-product-list-->
                    <div class="sortPagiBar">
                        <div class="bottom-pagination">
                            <nav>
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="show-product-item">
                            <select name="">
                                <option value="">Show 18</option>
                                <option value="">Show 20</option>
                                <option value="">Show 50</option>
                                <option value="">Show 100</option>
                            </select>
                        </div>
                        <div class="sort-product">
                            <select>
                                <option value="">Product Name</option>
                                <option value="">Price</option>
                            </select>
                            <div class="sort-product-icon">
                                <i class="fa fa-sort-alpha-asc"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>


    <script type="text/javascript" src="{{url('public/main/assets/lib/jquery/jquery-1.11.2.min.js')}}"></script>



@endsection