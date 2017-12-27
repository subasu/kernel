@extends('layouts.mainLayout')
@section('content')
    <style>
        .overflow_hidden_x{overflow-x: hidden;}
    </style>
    <div class="columns-container">
        <div class="container" id="columns" dir="rtl">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">خانه</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">پرداخت نهایی</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- page heading-->
            <h2 class="page-heading">
                <span class="page-heading-title2">پرداخت نهایی</span>
            </h2>
            <!-- ../page heading-->
            <form id="orderDetailForm">
                {{csrf_field()}}
            <div class="page-content checkout-page">
                <h3 class="checkout-sep">اطلاعات مشتری</h3>
                <div class="box-border" style="border-color: #0a0a0a;">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6" >
                            <label>شماره تلفن</label>
                            <input type="text" maxlength="11" name="userCellphone" id="userCellphone" class="form-control input" style="border-color: #0a0a0a;">
                            <label>آدرس تحویل محصول</label>
                            <textarea name="userCoordination" id="userCoordination" class="form-control input overflow_hidden_x" style="border-color: #0a0a0a;"></textarea>
                        </div>
                    </div>
                </div>
                <h3 class="checkout-sep">توضیحات سفارش</h3>
                <div class="box-border" style="border-color: #0a0a0a;">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6" >
                            <label>توضیحات</label>
                            <textarea name="comments" id="comments" class="form-control input overflow_hidden_x" style="border-color: #0a0a0a;"></textarea>
                        </div>
                    </div>
                </div>
                {{--<h3 class="checkout-sep">نوع پست</h3>--}}
                {{--<div class="box-border" style="border-color: #0a0a0a;">--}}
                    {{--<ul class="shipping_method">--}}
                        {{--<li>--}}
                            {{--<p class="subcaption bold">Free Shipping</p>--}}
                            {{--<label for="radio_button_3"><input type="radio" checked name="radio_3" id="radio_button_3">Free $0</label>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<p class="subcaption bold">Free Shipping</p>--}}
                            {{--<label for="radio_button_4"><input type="radio" name="radio_3" id="radio_button_4"> Standard Shipping $5.00</label>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<button class="button">Continue</button>--}}
                {{--</div>--}}
                <h3 class="checkout-sep">نوع پرداخت</h3>
                <div class="box-border" style="border-color: #0a0a0a;">
                    <ul>
                        @if(!empty($paymentTypes))
                            @foreach($paymentTypes as $paymentType)
                                <li>
                                    <label for="radio_button_5"><input type="radio" checked value="{{$paymentType->title}}" name="paymentType" id="radio">{{$paymentType->title}}</label>
                                </li>
                            @endforeach
                        @endif


                    </ul>
                    {{--<button class="button">Continue</button>--}}
                </div>
                <h3 class="checkout-sep">بررسی جزئیات سفارشات</h3>
                <div class="box-border" style="border-color: #0a0a0a;">
                    @if(!empty($baskets))
                        <table id="orderTable" class="table table-bordered table-responsive cart_summary rtl">
                            <thead>
                            <tr>
                                <th class="text-center cart_product">عنوان محصول</th>
                                <th class="text-center"> توضیحات</th>
                                <th class="text-center">قیمت واحد</th>
                                <th class="text-center" align="center">تعداد/مقدار</th>
                                <th class="text-center">جمع کل (تومان)</th>
                                <th class="text-center">تخفیف محصول (درصد)</th>
                                <th class="text-center">هزینه ی پست (تومان)</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($baskets->products as $basket)
                                <tr class="text-center">
                                    <td class="cart_product">{{$basket->title}}</td>
                                    <td class="cart_description">
                                        <textarea class="form-control" disabled="">{{$basket->description}}</textarea>
                                    </td>
                                    <td id="unitPrice" content="{{$basket->price}}">{{number_format($basket->price)}}</td>
                                    <td class="qty">
                                        <input disabled="disabled" class="form-control input-sm" id="count" name="count" type="text" value="{{$basket->count}}">
                                    </td>
                                    <td id="oldSum" content="{{$basket->sum}}">{{number_format($basket->sum)}}</td>
                                    <td class="col-md-2">@if($basket->discount_volume != null){{$basket->discount_volume}}@endif @if($basket->discount_volume == null) تخفیف ندارد @endif</td>
                                    <td class="col-md-2">{{number_format($basket->post_price)}}</td>
                                    <input type="hidden" name="basketId" value="{{$basket->basket_id}}">
                                    <input type="hidden" name="productId[]" value="{{$basket->product_id}}">
                                </tr>
                            @endforeach
                            </tbody>
                            <tr>
                                <td colspan="5"> جمع کل قیمت ها (تومان)</td>
                                <td colspan="5" >{{number_format($total)}}</td>
                                <input type="hidden" name="totalPrice" value="{{$total}}">
                            </tr>
                            <tr>
                                <td colspan="5">مجموع تخفیف ها (تومان)</td>
                                <td colspan="5" >{{number_format($basket->sumOfDiscount)}}</td>
                                <input type="hidden" name="discountPrice" value="{{$basket->sumOfDiscount}}">
                            </tr>
                            <tr>
                                <td colspan="5">مجموع هزینه های پست (تومان)</td>
                                <td colspan="5" >{{number_format($totalPostPrice)}}</td>
                                <input type="hidden" name="postPrice" value="{{$totalPostPrice}}">
                            </tr>
                            <tr>
                                <td colspan="5">قیمت نهایی (تومان)</td>
                                <td colspan="5" >{{number_format($finalPrice)}}</td>
                                <input type="hidden" name="factorPrice" value="{{$finalPrice}}">
                            </tr>

                        </table>
                    @endif
                    <button type="button" class="col-md-6 button pull-right" style="margin-right: 25%;" id="orderRegistration">ثبت سفارش</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

