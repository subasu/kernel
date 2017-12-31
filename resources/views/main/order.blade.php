@extends('layouts.mainLayout')
@section('content')

<div id="header" class="header">

    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">

    </div>
    <!-- END MANIN HEADER -->

</div>
<!-- end header -->
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        {{--<div class="breadcrumb clearfix">--}}
            {{--<a class="home" href="#" title="Return to Home">Home</a>--}}
            {{--<span class="navigation-pipe">&nbsp;</span>--}}
            {{--<span class="navigation_page">Your shopping cart</span>--}}
        {{--</div>--}}
        {{--<!-- ./breadcrumb -->--}}
        {{--<!-- page heading-->--}}
        {{--<h2 class="page-heading no-line">--}}
            {{--<span class="page-heading-title2">Shopping Cart Summary</span>--}}
        {{--</h2>--}}
        <!-- ../page heading-->
        <div class="page-content page-order">
            {{--<ul class="step">--}}
                {{--<li class="current-step"><span>01. Summary</span></li>--}}
                {{--<li><span>02. Sign in</span></li>--}}
                {{--<li><span>03. Address</span></li>--}}
                {{--<li><span>04. Shipping</span></li>--}}
                {{--<li><span>05. Payment</span></li>--}}
            {{--</ul>--}}
            {{--<div align="center" class="heading-counter warning">--}}
                {{--<h2>سبد خرید شما حاوی  {{$count}} نوع محصول است </h2>--}}
            {{--</div>--}}
            <div class="order-detail-content " align="center">
                @if(!empty($baskets))
                <table id="orderTable" class="table table-bordered table-responsive cart_summary rtl">
                    <thead>
                    <tr>
                        <th class="cart_product text-center">عنوان محصول</th>
                        <th class="text-center"> توضیحات</th>
                        <th class="text-center">واحد شمارش</th>
                        <th class="text-center">قیمت واحد</th>
                        <th class="text-center">تعداد/مقدار</th>
                        <th class="text-center">مجموع</th>
                        <th  class="action">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($baskets->products as $basket)
                        <tr class="text-center">
                            <td class="cart_product">{{$basket->title}}</td>
                            <td class="cart_description">
                                <textarea class="form-control" disabled="">{{$basket->description}}</textarea>
                            </td>
                            <td>
                                {{$basket->unit_count}}
                            </td>
                            <td id="unitPrice" content="{{$basket->price}}" class=" text-center">{{number_format($basket->price)}} تومان</td>
                            <td class="qty">
                                <input class="form-control input-sm" id="count" name="count" onkeydown="return false" type="text" value="{{$basket->count}}">
                                <a class="addToCount" content="{{$basket->id}}" name="{{$basket->basket_id}}"><i class="fa fa-caret-up"></i></a>
                                <a class="subFromCount" content="{{$basket->id}}" name="{{$basket->basket_id}}"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td id="oldSum" content="{{$basket->sum}}" class=" text-center">
                                {{number_format($basket->sum)}} تومان
                            </td>
                            <td class="col-md-2">
                                <a class="fa fa-trash-o" id="removeItem" name="{{$basket->id}}" data-target="{{$basket->price}}" content="{{$basket->basket_id}}" title="پاک کردن" data-toggle=""  ></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" rowspan="2"></td>
                        <td colspan="3">مجموع هزینه ها</td>
                        <td colspan="2" id="orderTotal" content="{{$total}}">{{number_format($total)}} تومان</td>
                    </tr>
                    </tfoot>
                </table>
                @endif
                <div class="cart_navigation">
                    <a class="prev-btn"  onclick="window.history.back();">ادامه خرید</a>
                    <a class="next-btn" href="{{url('order/orderDetail')}}">مشاهده جزئیات سفارش</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

