<ul class="row product-list style2 grid">
    @foreach($products as $product)
        @if($product->active == 1)
            <li class="col-sx-12 col-sm-4">
                <div class="product-container">
                    <div align="center" >
                        <a>
                            @if(!empty($product->productImages[0]))
                                <img src="{{url('public/dashboard/productFiles/picture/'.$product->productImages[0]->image_src)}}"  alt="عنوان محصول" width="200" height="250"  style="text-decoration: underline;"/>
                            @endif
                        </a>
                        <div class="quick-view">
                            <a title="افزودن به علاقه مندی ها" class="heart" ></a>
                            <a title="مقایسه" class="compare" ></a>
                            <a title="نمایش جزئیات" class="search" id="goToDetail" content="{{$product->id}}" href="{{url('productDetail/'.$product->id)}}"></a>
                        </div>
                    </div>

                    <div class="right-block margin-top-20">
                        <h3 class="product-name text-right col-md-12">
                            @if(strlen($product->title) != mb_strlen($product->title, 'utf-8'))
                                <a  class="text-right">{{$product->title}}</a>
                            @endif
                            @if(strlen($product->title) == mb_strlen($product->title, 'utf-8'))
                                <a  class="text-left">{{$product->title}}</a>
                            @endif
                        </h3>
                        <div class="text-left">
                            <div class="">
                                <div class="col-md-6">
                                    @foreach($product->productFlags as $flag)
                                        @if($flag->active == 1)
                                            <b><a class="price" id="productFlag" data-toggle="" name="{{$flag->price}}" title="تومان"> &nbsp;{{number_format($flag->price)}}&nbsp; </a>
                                            </b>&nbsp;<b style="float: left"> تومان </b> &nbsp;
                                        @endif
                                    @endforeach
                                </div>
                                <div class=" col-md-6">
                                    <span class="price product-price pull-right"> : قیمت اصلی </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class=" text-right">
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
                    {{--<div class="right-block display-inline">--}}
                    {{--<div class="add-to-cart" >--}}
                    {{--<button class="btn btn-success"--}}
                    {{--@foreach($product->productFlags as $flag)--}}
                    {{--@if($flag->active == 1)--}}
                    {{--content = "{{$flag->price}}"--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                    {{--id="addToBasket"  name="{{$product->id}}">--}}
                    {{--<span></span>افزودن به سبدخرید--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </li>
        @endif
    @endforeach
</ul>
{!! $products->render() !!}
