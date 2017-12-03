@extends('layouts.adminLayout')
@section('content')
    <style>
        .star {
            color: #ff0000;
            float: right;
            padding-right: 4px;
            padding-left: 4px;
        }

        input, label {
            font-size: 15px;
        }

        .margin-1 {
            margin-top: 1%;
        }

        .margin-bot-1 {
            margin-bottom: 1%;
        }

        .overflow-x {
            overflow-x: hidden;
        }
    </style>
    <!-- Include SmartWizard CSS -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Optional SmartWizard theme -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet"
          type="text/css"/>
    <div class="clearfix"></div>
    <div class="row">
        <div class="container">
            <form class="form-horizontal form-label-left" id="productForm" method="POST" enctype="multipart/form-data"
                  style="direction: rtl !important;">
                <!-- SmartWizard 1 html -->
                <div id="smartwizard">
                    <ul>
                        <li><a href="#step-1">اطلاعات اصلی محصول<br/>
                                <small><!-- This is step description --></small>
                            </a></li>
                        <li><a href="#step-2">اطلاعات تکمیلی محصول<br/>
                                <small></small>
                            </a></li>
                        <li><a href="#step-3">قیمت / تخفیف / پیک<br/>
                                <small></small>
                            </a></li>
                        <li><a href="#step-4">تصاویر / ویدئوی محصول<br/>
                                <small></small>
                            </a></li>
                    </ul>
                    <div>
                        <div id="step-1" class="">
                            <br>
                            <div class="container">
                                <br>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="categories" class="form-control col-md-12"
                                                name="categories">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> دسته ی اصلی :
                                        <span class="required star" title=" فیلد دسته بندی الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1" id="subCategoriesDiv"
                                     style="display: none;">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="subCategories" class="form-control col-md-12" name="subCategories">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> زیردسته ی دسته اصلی :
                                        <span class="required star" title=" فیلد دسته بندی الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1" id="BrandsDiv" style="display: none;">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="brands" class="form-control col-md-12" name="brands">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> زیردسته دسته ی فوق :
                                        <span class="required star" title=" فیلد دسته بندی الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1" id="oldProduct" >
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="oldProduct" class="form-control col-md-12" name="oldProduct">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> محصولات موجود در دسته :
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="title" class="form-control col-md-12 col-xs-12" name="title"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> نام محصول :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    {{--<div class="col-md-1" style="margin-left: 6.333333%;margin-right: 2%;"></div>--}}
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <textarea id="description" class="form-control col-md-12 col-xs-12 overflow-x"
                                                  name="description"
                                                  required="required" type="text"></textarea>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="description"> توضیح
                                        محصول :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="unit" class="form-control col-md-7 col-xs-12" name="unit_count_id">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="unit"> واحد شمارش :
                                        <span
                                                class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('unit'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 ">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="subunit" class="form-control col-md-7 col-xs-12"
                                                name="sub_unit_count_id">
                                        </select>

                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="subunit"> زیر واحد
                                        شمارش
                                        : <span
                                                class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('subunit'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('subunit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="price" class="form-control col-md-12 col-xs-12" name="price"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="price"> قیمت اصلی
                                        (تومان) :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="">
                            <div class="container">
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="produce_date" class="form-control col-md-12 col-xs-12"
                                               name="produce_date" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for=""> تاریخ
                                        تولید :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('produce_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('produce_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="expire_date" class="form-control col-md-12 col-xs-12"
                                               name="expire_date" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="expire_date"> تاریخ
                                        انقضا :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('expire_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('expire_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="produce_place" class="form-control col-md-12 col-xs-12"
                                               name="produce_place" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="produce_place"> محل
                                        تولید :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('produce_place'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('produce_place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="warehouse_count" class="form-control col-md-12 col-xs-12"
                                               name="warehouse_count" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="warehouse_count"> تعداد
                                        موجود در
                                        انبار :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('warehouse_count'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('warehouse_count') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 ">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="warehouse_place" class="form-control col-md-12 col-xs-12"
                                               name="warehouse_place"
                                                type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="warehouse_place"> محل
                                        فیزیکی در
                                        انبار :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('warehouse_place'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('warehouse_place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="ready_time" class="form-control col-md-12 col-xs-12"
                                               name="ready_time"
                                                type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="ready_time"> زمان آماده
                                        شدن بر حسب ساعت :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('ready_time'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ready_time') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="barcode" class="form-control col-md-12 col-xs-12" name="barcode"
                                                type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="barcode"> بارکد :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('barcode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('barcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="">
                            <div class="container">
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="sales_price" class="form-control col-md-12 col-xs-12"
                                               name="sales_price" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="sales_price"> قیمت حراج
                                        (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('sales_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sales_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="special_price" class="form-control col-md-12 col-xs-12" name="special_price">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="special_price"> قیمت
                                        ویژه (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('special_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('special_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="wholesale_price" class="form-control col-md-12 col-xs-12"
                                               name="wholesale_price" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="wholesale_price"> قیمت
                                        عمده (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('wholesale_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('wholesale_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="discount_volume" class="form-control col-md-12 col-xs-12"
                                               name="discount_volume"
                                                type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="discount_volume">
                                        حجم/تعداد مشمول
                                        تخفیف :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('discount_volume'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('discount_volume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="discount" class="form-control col-md-12 col-xs-12" name="discount"
                                                type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="discount"> درصد تخفیف :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('discount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="delivery_volume" class="form-control col-md-12 col-xs-12"
                                               name="delivery_volume">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="delivery_volume">
                                        حجم/تعداد مشمول
                                        پیک رایگان :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('delivery_volume'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('delivery_volume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="step-4" class="">
                            <div class="container">
                                <div id="addPic">
                                    <div class="col-md-12 margin-1">
                                        <div class="col-md-1 col-sm-1 col-xs-1 col-md-offset-2">
                                            <a id="addInput" class="glyphicon glyphicon-plus btn btn-success"
                                               data-toggle=""
                                               title="افزودن تصویر"></a>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-9 ">
                                            <input class="form-control col-md-12 col-xs-12"
                                                   type="file" name="pic[]" id="pic"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-4 col-xs-3" for="pic"> تصویر محصول :
                                            <span class="required star"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10 ">
                                    <hr>
                                </div>
                                <div class="col-md-12 margin-bot-1">
                                    <div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-3">
                                        <input class="form-control col-md-12 col-xs-12"
                                               type="file" name="video_src" id="video_src"/>
                                    </div>

                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="video_src"> ویدئوی
                                        محصول :
                                        <span class="required star"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </form>
        </div>
        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript"
                src="{{url('public/dashboard/stepWizard/js/jquery.smartWizard.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                // Toolbar extra buttons
                var btnFinish = $('<button></button>').text('ثبت محصول')
                    .addClass('btn btn-info')
                    .on('click', function () {
                        var formData = new FormData($("#productForm")[0])
                        $.ajax({
                            url: '{{url('api/v1/addNewProduct')}}',
                            type: 'post',
                            cashe: false,
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                var x = '';
                                $.each(data, function (key, val) {
                                    x += val + '\n'
                                });
                                swal({
                                    title: '',
                                    text: x,
                                    type: "info",
                                })
                            },
                            error: function (xhr) {
                                console.log(xhr)
                                swal({
                                    title: '',
                                    text: xhr,
                                    type: "info",
                                })
                            }
                        })
                    });
                var btnCancel = $('<button></button>').text('شروع مجدد')
                    .addClass('btn btn-danger')
                    .on('click', function () {
                        $('#smartwizard').smartWizard("reset");
                        $('#productForm')[0].reset();

                    });

                $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect: 'fade',
                    showStepURLhash: false,
                    toolbarSettings: {
                        toolbarPosition: 'bottom',
                        toolbarExtraButtons: [btnFinish, btnCancel]
                    }
                });
                // External Button Events
                $("#reset-btn").on("click", function () {
                    // Reset wizard
                    $('#smartwizard').smartWizard("reset");
                    return true;
                });

                $("#prev-btn").on("click", function () {
                    // Navigate previous
                    $('#smartwizard').smartWizard("قبلی");
                    return true;
                });

                $("#next-btn").on("click", function () {
                    // Navigate next
                    $('#smartwizard').smartWizard("بعدی");
                    return true;
                });
                $(".sw-btn-next").text('بعدی');
                $(".sw-btn-prev").text('قبلی');
//
            });
        </script>
        <!-- send product form -->
        <script>
            $(document).ready(function () {
                //add input type file for add pic for product
                var counter = 0
                $('#addInput').on('click', function () {
                    if (counter < 3) {
                        $('#addPic').append
                        (
                            '<div class="col-md-12 margin-1">' +
                            '<div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-3">' +
                            '<input class="form-control col-md-12 col-xs-12" type="file" name="pic[]" id="pic"/>' +
                            '</div>' +
                            '<label class="control-label col-md-2 col-sm-4 col-xs-3" for="pic"> تصویر محصول :' +
                            '<span class="required star"></span>' +
                            '</label></div>'
                        );
                        counter++;
                    }
                    else {
                    }
                })
                //load all main category in select box in addProductForm
                $.ajax({
                    cache: false,
                    url: "{{url('api/v1/getMainCategories')}}",
                    type: 'get',
                    dataType: "json",
                    success: function (response) {
                        if (response != 0) {
                            var item = $('#categories');
                            item.empty();
                            item.append
                            (
                                "<option selected='true' disabled='disabled'>لطفا دسته مورد نظر خود را انتخاب نمایید</option>"
                            )
                            item.append
                            (
                                "<option value='000'>اگر دسته مورد نظر در این لیست وجود ندارد این گزینه را انتخاب نمایید</option>"
                            )
                            $.each(response, function (key, value) {
                                item.append
                                (
                                    "<option value='" + value.id + "'>" + value.title + "</option>"
                                );
                            });
                        }
                        else {
                            {{--                            location.href = '{{url("addCategory")}}';--}}
                        }
                    }
                })

                //load subcategory
                $('#categories').on("change", function () {
                    var id = $(this).val();
                    if (id == 000) {
                        location.href = '{{url("addCategory")}}';
                    }
                    else {
                        swal({
                                title: '',
                                text: 'آیا میخواهید زیردسته های دسته ی منتخب را ببینید و محصول را در یکی از زیر دسته ها ذخیره کنید؟',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "  #5cb85c",
                                cancelButtonText: "خیر",
                                confirmButtonText: "آری",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    //load all subCategory in select box in addProductForm
                                    $.ajax
                                    ({
                                        cache: false,
                                        url: "{{Url('api/v1/getSubCategories')}}/" + id,
                                        dataType: "json",
                                        type: "get",
                                        success: function (response) {
                                            var item = $('#subCategories');
                                            item.empty();
                                            item.append
                                            (
                                                "<option selected='true' disabled='disabled'>لطفا زیر دسته مورد نظر را انتخاب نمایید</option>"
                                            )
                                            item.append
                                            (
                                                "<option value='000'>اگر زیر دسته مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید</option>"
                                            )
                                            $.each(response, function (key, value) {
                                                item.append
                                                (
                                                    "<option value='" + value.id + "'>" + value.title + "</option>"
                                                );
                                            });
                                            $('#subCategoriesDiv').css('display', 'block');
                                        }
                                    });
                                }
                                else {
                                    $('#subCategoriesDiv').css('display', 'none');
                                }
                            });
                    }
                })

                //load brands
                $('#subCategories').on("change", function () {
                    var id = $(this).val();
                    if (id == 000) {
                        location.href = '{{url("addCategory")}}';
                    }
                    else {
                        swal({
                                title: '',
                                text: 'آیا میخواهید زیردسته های دسته ی منتخب را ببینید و محصول را در یکی از برندها ذخیره کنید؟',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "  #5cb85c",
                                cancelButtonText: "خیر",
                                confirmButtonText: "آری",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    //load all subCategory in select box in addProductForm
                                    $.ajax
                                    ({
                                        cache: false,
                                        url: "{{Url('api/v1/getBrands')}}/" + id,
                                        dataType: "json",
                                        type: "get",
                                        success: function (response) {
                                            var item = $('#brands');
                                            item.empty();
                                            item.append
                                            (
                                                "<option selected='true' disabled='disabled'>لطفا زیردسته ی مورد نظر را انتخاب نمایید</option>"
                                            )
                                            item.append
                                            (
                                                "<option value='000'>اگر زیردسته ی مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید</option>"
                                            )
                                            $.each(response, function (key, value) {
                                                item.append
                                                (
                                                    "<option value='" + value.id + "'>" + value.title + "</option>"
                                                );
                                            });
                                            $('#BrandsDiv').css('display', 'block');
                                        }
                                    });
                                }
                                else {
                                    $('#BrandsDiv').css('display', 'none');
                                }
                            });
                    }
                })

                $('#brands').on("change", function () {
                    var id = $(this).val();
                    if (id == 000) {
                        location.href = '{{url("addCategory")}}';
                    }
                })

                //load units
                $('#unit').on("change", function () {
                    var id = $(this).val();
                    if (id == 0000) {
                        location.href = '{{url("addUnit")}}';
                    }
                })

                //load MainUnitsCount
                $.ajax
                ({
                    cache: false,
                    url: "{{Url('api/v1/getMainUnits')}}",
                    dataType: "json",
                    type: "get",
                    success: function (response) {
                        if (response != 0) {
                            var item = $('#unit');
                            item.empty();
                            item.append
                            (
                                "<option selected='true' disabled='disabled'>لطفا واحد شمارش مورد نظر خود را انتخاب نمایید</option>"
                            )
                            item.append
                            (
                                "<option value='0000'>اگر واحد شمارش مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید</option>"
                            )
                            $.each(response, function (key, value) {
                                item.append
                                (
                                    "<option value='" + value.id + "'>" + value.title + "</option>"
                                );
                            });
                        }
                        else {
                            location.href = '{{url("addCategory")}}';
                        }
                    }
                });
                //load brands
                $('#unit').on("change", function () {
                    var id = $(this).val();
                    if (id == 0000) {
                        location.href = '{{url("addUnit")}}';
                    }
                    else {
                        $.ajax
                        ({
                            cache: false,
                            url: "{{Url('api/v1/getSubunits')}}/" + id,
                            dataType: "json",
                            type: "get",
                            success: function (response) {
                                var item = $('#subunit ');
                                item.empty();
                                item.append
                                (
                                    "<option selected='true' disabled='disabled'>لطفا واحد شمارش مورد نظر خود را انتخاب نمایید</option>"
                                )
                                item.append
                                (
                                    "<option value='001'>اگر واحد شمارش مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید</option>"
                                )
                                $.each(response, function (key, value) {
                                    item.append
                                    (
                                        "<option value='" + value.id + "'>" + value.title + "</option>"
                                    );
                                });

                            }
                        });
                    }
                })
            });
        </script>
        <script src="{{ URL::asset('public/js/persianDatepicker.js')}}"></script>
        {{--persianDatepicker--}}
        <script>
            $('#produce_date').persianDatepicker();
            $('#expire_date').persianDatepicker();
        </script>
@endsection
