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
            <div class="page-content checkout-page">
                <h3 class="checkout-sep">اطلاعات مشتری</h3>
                <div class="box-border" style="border-color: #0a0a0a;">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6" >
                            <label>شماره تلفن</label>
                            <input type="text" class="form-control input" style="border-color: #0a0a0a;">
                            <label>آدرس تحویل محصول</label>
                            <textarea class="form-control input overflow_hidden_x" style="border-color: #0a0a0a;"></textarea>
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
                        <li>
                            <label for="radio_button_5"><input type="radio" checked name="radio_4" id="radio_button_5"> Check / Money order</label>
                        </li>

                        <li>

                            <label for="radio_button_6"><input type="radio" name="radio_4" id="radio_button_6"> Credit card (saved)</label>
                        </li>

                    </ul>
                    <button class="button">Continue</button>
                </div>
                <h3 class="checkout-sep">بررسی جزئیات سفارشات</h3>
                <div class="box-border" style="border-color: #0a0a0a;">
                    @if(!empty($baskets))
                        <table id="orderTable" class="table table-bordered table-responsive cart_summary rtl">
                            <thead>
                            <tr>
                                <th class="cart_product" align="center">عنوان محصول</th>
                                <th class="rtl" align="center"> توضیحات</th>
                                <th class="rtl" align="center">قیمت واحد</th>
                                <th class="rtl" align="center">  تعداد</th>
                                <th class="rtl">جمع کل (تومان)</th>
                                <th class="rtl">تخفیف محصول (درصد)</th>
                                <th class="rtl">هزینه ی پست (تومان)</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($baskets->products as $basket)
                                <tr>
                                    <td class="cart_product">{{$basket->title}}</td>
                                    <td class="cart_description">
                                        <textarea class="form-control" disabled="">{{$basket->description}}</textarea>
                                    </td>
                                    <td id="unitPrice" content="{{$basket->price}}" class="price">{{number_format($basket->price)}}</td>
                                    <td class="qty">
                                        <input disabled="disabled" class="form-control input-sm" id="count" name="count" type="text" value="{{$basket->count}}">
                                    </td>
                                    <td id="oldSum" content="{{$basket->sum}}" class="price">{{number_format($basket->sum)}}</td>
                                    <td class="col-md-2">@if($basket->discount_volume != null){{$basket->discount_volume}}@endif @if($basket->discount_volume == null) تخفیف ندارد @endif</td>
                                    <td class="col-md-2">{{number_format($basket->post_price)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tr>
                                <td colspan="5"> جمع کل قیمت ها (تومان)</td>
                                <td colspan="5" id="orderTotal" content="{{$total}}">{{number_format($total)}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">مجموع تخفیف ها (تومان)</td>
                                <td colspan="5" id="orderTotal" content="{{number_format($basket->sumOfDiscount)}}">{{number_format($basket->sumOfDiscount)}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">مجموع هزینه های پست (تومان)</td>
                                <td colspan="5" id="orderTotal" content="{{number_format($totalPostPrice)}}">{{number_format($totalPostPrice)}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">قیمت نهایی (تومان)</td>
                                <td colspan="5" id="orderTotal" content="{{number_format($finalPrice)}}">{{number_format($finalPrice)}}</td>
                            </tr>

                        </table>
                    @endif
                    <button class="button pull-right">Place Order</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

