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
            <div class="page-content checkout-page">
                <h3 class="checkout-sep">اطلاعات مشتری</h3>
                <div class="box-border">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <label>شماره تلفن</label>
                            <input type="text" class="form-control input">
                            <label>آدرس تحویل محصول</label>
                            <textarea class="form-control input overflow_hidden_x"></textarea>
                        </div>
                    </div>
                </div>
                <h3 class="checkout-sep">نوع پست</h3>
                <div class="box-border">
                    <ul class="shipping_method">
                        <li>
                            <p class="subcaption bold">Free Shipping</p>
                            <label for="radio_button_3"><input type="radio" checked name="radio_3" id="radio_button_3">Free $0</label>
                        </li>

                        <li>
                            <p class="subcaption bold">Free Shipping</p>
                            <label for="radio_button_4"><input type="radio" name="radio_3" id="radio_button_4"> Standard Shipping $5.00</label>
                        </li>
                    </ul>
                    <button class="button">Continue</button>
                </div>
                <h3 class="checkout-sep">5. نوع پرداخت</h3>
                <div class="box-border">
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
                <h3 class="checkout-sep">6. Order Review</h3>
                <div class="box-border">
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Avail.</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="assets/data/product-100x122.jpg" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">Frederique Constant </a></p>
                                <small class="cart_ref">SKU : #123654999</small><br>
                                <small><a href="#">Color : Beige</a></small><br>
                                <small><a href="#">Size : S</a></small>
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price"><span>61,19 €</span></td>
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
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="assets/data/product-100x122.jpg" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">Frederique Constant </a></p>
                                <small class="cart_ref">SKU : #123654999</small><br>
                                <small><a href="#">Color : Beige</a></small><br>
                                <small><a href="#">Size : S</a></small>
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price"><span>61,19 €</span></td>
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
                    <button class="button pull-right">Place Order</button>
                </div>
            </div>
        </div>
    </div>

@endsection

