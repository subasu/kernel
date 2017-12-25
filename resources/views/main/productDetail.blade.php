@extends('layouts.mainLayout')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">خانه</a>
                <a href="#" title="Return to Home">{{$cat}}</a>
                <span class="navigation-pipe">&nbsp;</span>
                <a href="#" title="Return to Home">{{$subcat}}</a>
                <span class="navigation-pipe">&nbsp;</span>
                <a href="#" title="Return to Home">{{$product->categories[0]->title}}</a>
                <span class="navigation-pipe">&nbsp;</span>
                <a href="#" title="Return to Home">{{$product->title}}</a>
            </div>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">

                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-12" id="center_column">
                    <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-right-column col-xs-12 col-sm-7 ">
                                <h1 class="product-name" dir="rtl">{{$product->title}}</h1>
                                <br>
                                <div class="product-comments " dir="rtl">
                                    <div class="comments-advices">
                                        <span href="#" class="margin-r-0">امتیاز:</span>
                                    </div>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <div class="product-price-group" dir="rtl">
                                    <span class="price margin-r-0" dir="rtl">
                                        @foreach($product->productFlags as $flag)
                                            @if($flag->active == 1)
                                                <b><a class="price margin-r-0" id="productFlag" data-toggle=""
                                                      name="{{$flag->price}}"
                                                      title="تومان">{{number_format($flag->price)}} </a>
                                                                </b><b style="float: left"> تومان </b>
                                            @endif
                                        @endforeach</span>
                                    {{--<span class="old-price">$52.00</span>--}}
                                    {{--<span class="discount">-30%</span>--}}
                                </div>
                                <div class="info-orther" dir="rtl">
                                    {{--<p>کد: #453217907</p>--}}
                                    <p>وضعیت: <span class="in-stock">
                                            @if($product->warehouse_count>0)
                                                <b class="text-success">
                                                موجود در انبار
                                                </b>
                                            @else
                                                <b class="text-danger">
                                                ناموجود
                                                </b>@endif</span></p>
                                </div>
                                <div class="product-desc text-justify" dir="rtl">
                                    {{$product->description}}
                                </div>
                                <div class="form-option">
                                    {{--<p class="form-option-title">Available Options:</p>--}}
                                    @if(count($product->sizes)>0)
                                        <div class="attributes">
                                            <div class="attribute-label" dir="rtl">اندازه:</div>

                                            <div class="attribute-list float-r">
                                                <select>
                                                    @foreach ($product->sizes as $size)
                                                        <option value="">{{$size->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    @endif
                                    @if(count($product->colors)>0)
                                        <div class="attributes">
                                            <div class="attribute-label" dir="rtl">رنگ بندی:</div>
                                            <div class="attribute-list float-r">
                                                <select>
                                                    @foreach ($product->colors as $color)
                                                        <option value="">{{$color->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-action" dir="rtl">
                                    <div class="button-group">
                                        <div class="right-block display-inline" dir="rtl">
                                            <div class="add-to-cart">
                                                <button class="btn btn-success"
                                                        @foreach($product->productFlags as $flag)
                                                        @if($flag->active == 1)
                                                        content="{{$flag->price}}"
                                                        @endif
                                                        @endforeach
                                                        id="addToBasket" name="{{$product->id}}">
                                                    <span></span>افزودن به سبدخرید
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="button-group float-r">
                                        <a class="wishlist" href="#"><i class="fa fa-heart-o"></i>
                                            <br>افزودن به علاقه مندی ها</a>
                                        <a class="compare" href="#"><i class="fa fa-signal"></i><br>
                                            مقایسه</a>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-left-column col-xs-12 col-sm-5">
                                <div class="product-image">
                                    <div class="product-full product-image-size" >
                                        <!-- product-image-->
                                        <img id="product-zoom"
                                             src="{{url('public/dashboard/productFiles/picture/'.$product->productImages[0]->image_src)}}"
                                             data-zoom-image="{{url('public/dashboard/productFiles/picture/'.$product->productImages[0]->image_src)}}"/>
                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false"
                                            data-margin="21" data-loop="true">
                                            @foreach($product->productImages as $img)
                                                <li>
                                                    <a href="#"
                                                       data-image="{{url('public/dashboard/productFiles/picture/'.$img->image_src)}}"
                                                       data-zoom-image="{{url('public/dashboard/productFiles/picture/'.$img->image_src)}}">
                                                        <img id="product-zoom"
                                                             src="{{url('public/dashboard/productFiles/picture/'.$img->image_src)}}"/>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- product-image-->
                            </div>
                        </div>
                        <!-- tab product -->
                    {{--<div class="product-tab">--}}
                    {{--<ul class="nav-tab">--}}
                    {{--<li class="active">--}}
                    {{--<a aria-expanded="false" data-toggle="tab" href="#product-detail">Product--}}
                    {{--Details</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a aria-expanded="true" data-toggle="tab" href="#information">information</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a data-toggle="tab" href="#reviews">reviews</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a data-toggle="tab" href="#extra-tabs">Extra Tabs</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a data-toggle="tab" href="#guarantees">guarantees</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="tab-container">--}}
                    {{--<div id="product-detail" class="tab-panel active">--}}
                    {{--<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit--}}
                    {{--viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>--}}

                    {{--<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae,--}}
                    {{--vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora--}}
                    {{--torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis--}}
                    {{--diam.</p>--}}

                    {{--<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae--}}
                    {{--euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non,--}}
                    {{--auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis.--}}
                    {{--Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend--}}
                    {{--augue, ac auctor orci leo non est.</p>--}}
                    {{--</div>--}}
                    {{--<div id="information" class="tab-panel">--}}
                    {{--<table class="table table-bordered">--}}
                    {{--<tr>--}}
                    {{--<td width="200">Compositions</td>--}}
                    {{--<td>Cotton</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Styles</td>--}}
                    {{--<td>Girly</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Properties</td>--}}
                    {{--<td>Colorful Dress</td>--}}
                    {{--</tr>--}}
                    {{--</table>--}}
                    {{--</div>--}}
                    {{--<div id="reviews" class="tab-panel">--}}
                    {{--<div class="product-comments-block-tab">--}}
                    {{--<div class="comment row">--}}
                    {{--<div class="col-sm-3 author">--}}
                    {{--<div class="grade">--}}
                    {{--<span>Grade</span>--}}
                    {{--<span class="reviewRating">--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="info-author">--}}
                    {{--<span><strong>Jame</strong></span>--}}
                    {{--<em>04/08/2015</em>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-9 commnet-dettail">--}}
                    {{--Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet--}}
                    {{--convallis pulvinar--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="comment row">--}}
                    {{--<div class="col-sm-3 author">--}}
                    {{--<div class="grade">--}}
                    {{--<span>Grade</span>--}}
                    {{--<span class="reviewRating">--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="info-author">--}}
                    {{--<span><strong>Author</strong></span>--}}
                    {{--<em>04/08/2015</em>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-9 commnet-dettail">--}}
                    {{--Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet--}}
                    {{--convallis pulvinar--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<p>--}}
                    {{--<a class="btn-comment" href="#">Write your review !</a>--}}
                    {{--</p>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--<div id="extra-tabs" class="tab-panel">--}}
                    {{--<p>Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis--}}
                    {{--pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Sed lectus.--}}
                    {{--Sed a libero. Vestibulum eu odio.</p>--}}

                    {{--<p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at--}}
                    {{--lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam--}}
                    {{--eget dui.</p>--}}

                    {{--<p>Maecenas nec odio et ante tincidunt tempus. Vestibulum suscipit nulla quis orci.--}}
                    {{--Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Aenean ut eros--}}
                    {{--et nisl sagittis vestibulum. Aliquam eu nunc.</p>--}}
                    {{--</div>--}}
                    {{--<div id="guarantees" class="tab-panel">--}}
                    {{--<p>Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis--}}
                    {{--pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Sed lectus.--}}
                    {{--Sed a libero. Vestibulum eu odio.</p>--}}

                    {{--<p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at--}}
                    {{--lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam--}}
                    {{--eget dui.</p>--}}

                    {{--<p>Maecenas nec odio et ante tincidunt tempus. Vestibulum suscipit nulla quis orci.--}}
                    {{--Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Aenean ut eros--}}
                    {{--et nisl sagittis vestibulum. Aliquam eu nunc.</p>--}}
                    {{--<p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at--}}
                    {{--lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam--}}
                    {{--eget dui.</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- ./tab product -->--}}
                    {{--<!-- box product -->--}}
                    {{--<div class="page-product-box">--}}
                    {{--<h3 class="heading">Related Products</h3>--}}
                    {{--<ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true"--}}
                    {{--data-margin="30" data-autoplayTimeout="1000" data-autoplayHoverPause="true"--}}
                    {{--data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>--}}
                    {{--<li>--}}
                    {{--<div class="product-container">--}}
                    {{--<div class="left-block">--}}
                    {{--<a href="#">--}}
                    {{--<img class="img-responsive" alt="product"--}}
                    {{--src="{{url('public/main/assets/data/p40.jpg')}}"/>--}}
                    {{--</a>--}}
                    {{--<div class="quick-view">--}}
                    {{--<a title="Add to my wishlist" class="heart" href="#"></a>--}}
                    {{--<a title="Add to compare" class="compare" href="#"></a>--}}
                    {{--<a title="Quick view" class="search" href="#"></a>--}}
                    {{--</div>--}}
                    {{--<div class="add-to-cart">--}}
                    {{--<a title="Add to Cart" href="#add">Add to Cart</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="right-block">--}}
                    {{--<h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>--}}
                    {{--<div class="product-star">--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star-half-o"></i>--}}
                    {{--</div>--}}
                    {{--<div class="content_price">--}}
                    {{--<span class="price product-price">$38,95</span>--}}
                    {{--<span class="price old-price">$52,00</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<div class="product-container">--}}
                    {{--<div class="left-block">--}}
                    {{--<a href="#">--}}
                    {{--<img class="img-responsive" alt="product"--}}
                    {{--src="{{url('public/main/assets/data/p35.jpg')}}"/>--}}
                    {{--</a>--}}
                    {{--<div class="quick-view">--}}
                    {{--<a title="Add to my wishlist" class="heart" href="#"></a>--}}
                    {{--<a title="Add to compare" class="compare" href="#"></a>--}}
                    {{--<a title="Quick view" class="search" href="#"></a>--}}
                    {{--</div>--}}
                    {{--<div class="add-to-cart">--}}
                    {{--<a title="Add to Cart" href="#add">Add to Cart</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="right-block">--}}
                    {{--<h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>--}}
                    {{--<div class="product-star">--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star-half-o"></i>--}}
                    {{--</div>--}}
                    {{--<div class="content_price">--}}
                    {{--<span class="price product-price">$38,95</span>--}}
                    {{--<span class="price old-price">$52,00</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<div class="product-container">--}}
                    {{--<div class="left-block">--}}
                    {{--<a href="#">--}}
                    {{--<img class="img-responsive" alt="product"--}}
                    {{--src="{{url('public/main/assets/data/p37.jpg')}}"/>--}}
                    {{--</a>--}}
                    {{--<div class="quick-view">--}}
                    {{--<a title="Add to my wishlist" class="heart" href="#"></a>--}}
                    {{--<a title="Add to compare" class="compare" href="#"></a>--}}
                    {{--<a title="Quick view" class="search" href="#"></a>--}}
                    {{--</div>--}}
                    {{--<div class="add-to-cart">--}}
                    {{--<a title="Add to Cart" href="#add">Add to Cart</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="right-block">--}}
                    {{--<h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>--}}
                    {{--<div class="product-star">--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star-half-o"></i>--}}
                    {{--</div>--}}
                    {{--<div class="content_price">--}}
                    {{--<span class="price product-price">$38,95</span>--}}
                    {{--<span class="price old-price">$52,00</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<div class="product-container">--}}
                    {{--<div class="left-block">--}}
                    {{--<a href="#">--}}
                    {{--<img class="img-responsive" alt="product"--}}
                    {{--src="{{url('public/main/assets/data/p39.jpg')}}"/>--}}
                    {{--</a>--}}
                    {{--<div class="quick-view">--}}
                    {{--<a title="Add to my wishlist" class="heart" href="#"></a>--}}
                    {{--<a title="Add to compare" class="compare" href="#"></a>--}}
                    {{--<a title="Quick view" class="search" href="#"></a>--}}
                    {{--</div>--}}
                    {{--<div class="add-to-cart">--}}
                    {{--<a title="Add to Cart" href="#add">Add to Cart</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="right-block">--}}
                    {{--<h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>--}}
                    {{--<div class="product-star">--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star"></i>--}}
                    {{--<i class="fa fa-star-half-o"></i>--}}
                    {{--</div>--}}
                    {{--<div class="content_price">--}}
                    {{--<span class="price product-price">$38,95</span>--}}
                    {{--<span class="price old-price">$52,00</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<!-- ./box product -->--}}
                    <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">محصولات مشابه</h3>
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true"
                                data-margin="30" data-autoplayTimeout="1000" data-autoplayHoverPause="true"
                                data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                <li>
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product"
                                                     src="{{url('public/main/assets/data/p97.jpg')}}"/>
                                            </a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#add">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product"
                                                     src="{{url('public/main/assets/data/p34.jpg')}}"/>
                                            </a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#add">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product"
                                                     src="{{url('public/main/assets/data/p36.jpg')}}"/>
                                            </a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#add">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="#">
                                                <img class="img-responsive" alt="product"
                                                     src="{{url('public/main/assets/data/p36.jpg')}}"/>
                                            </a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#add">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="content_price">
                                                <span class="price product-price">$38,95</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- ./box product -->
                    </div>
                    <!-- Product -->
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection