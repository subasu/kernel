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
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Your shopping cart</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Shopping Cart Summary</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
            {{--<ul class="step">--}}
                {{--<li class="current-step"><span>01. Summary</span></li>--}}
                {{--<li><span>02. Sign in</span></li>--}}
                {{--<li><span>03. Address</span></li>--}}
                {{--<li><span>04. Shipping</span></li>--}}
                {{--<li><span>05. Payment</span></li>--}}
            {{--</ul>--}}
            <div align="center" class="heading-counter warning">
                <h2>سبد خرید شما حاوی  N   محصول است</h2>
            </div>
            <div class="order-detail-content rtl" align="center">
                <table class="table table-bordered table-responsive cart_summary rtl">
                    <thead>
                    <tr>
                        <th class="cart_product" align="center">عنوان محصول</th>
                        <th class="rtl" align="center"> توضیحات</th>
                        <th class="rtl" align="center"> دسترسی</th>
                        <th class="rtl" align="center"> قیمت</th>
                        <th class="rtl" align="center">  تعداد</th>
                        <th class="rtl" align="center">مجموع</th>
                        <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($baskets->products as $basket)
                        <tr>
                            <td class="cart_product">{{$basket->title}}</td>
                            <td class="cart_description">
                                <textarea class="form-control" disabled="">{{$basket->description}}</textarea>
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price">{{number_format($basket->product_price)}}</td>
                            <td class="qty">
                                <input class="form-control input-sm" type="text" value="1">
                                <a href="#"><i class="fa fa-caret-up"></i></a>
                                <a href="#"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td class="price">
                                <span>61,19 €</span>
                            </td>
                            <td class="action">
                                <a href="#">Delete item</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" rowspan="2"></td>
                        <td colspan="3">Total products (tax incl.)</td>
                        <td colspan="2">122.38 €</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td colspan="2"><strong>122.38 €</strong></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="cart_navigation">
                    <a class="prev-btn" href="#">Continue shopping</a>
                    <a class="next-btn" href="#">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

