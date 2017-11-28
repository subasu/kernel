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
        .overflow-x
        {
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
            <form class="form-horizontal form-label-left" id="categoryForm" method="POST"
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
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="col-md-1" style="margin-left: 6.333333%;margin-right: 2%;">
                                        <a id="addInput" class="glyphicon glyphicon-plus btn btn-success" data-toggle=""
                                           title="افزودن زیر دسته"></a>
                                    </div>

                                    <div class="col-md-7 col-sm-6 col-xs-9">
                                        <input id="category" class="form-control col-md-12 col-xs-12" name="category[]"
                                               placeholder=""
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="category"> نام دسته بندی
                                        جدید : <span
                                                class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="title" class="form-control col-md-12 col-xs-12" name="name"
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
                                        <textarea id="description" class="form-control col-md-12 col-xs-12 overflow-x" name="name"
                                                  required="required" type="text"></textarea>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="description"> توضیح محصول :
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
                                        <select id="unit" class="form-control col-md-7 col-xs-12" name="unit">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
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
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="subunit" class="form-control col-md-7 col-xs-12" name="subunit">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>

                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="subunit"> زیر واحد شمارش
                                        : <span
                                                class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('subunit'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('subunit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="">
                            <div class="container">
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="produce_date" class="form-control col-md-12 col-xs-12" name="produce_date"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="produce_date"> تاریخ تولید :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('produce_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('produce_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="expire_date" class="form-control col-md-12 col-xs-12" name="expire_date"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="expire_date"> تاریخ انقضا :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('expire_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('expire_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="produce_place" class="form-control col-md-12 col-xs-12" name="produce_place"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="produce_place"> محل تولید :
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
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> تعداد موجود در
                                        انبار :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 ">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> محل فیزیکی در
                                        انبار :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> زمان آماده شدن :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> بارکد :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="">
                            <div class="container">

                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="price" class="form-control col-md-12 col-xs-12" name="price"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="price"> قیمت اصلی :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="price" class="form-control col-md-12 col-xs-12" name="price"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="price"> قیمت حراج :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> قیمت ویژه :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> قیمت عمده :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> حجم/تعداد مشمول
                                        تخفیف :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name"
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="name"> حجم/تعداد مشمول
                                        پیک رایگان :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="step-4" class="">
                            <div class="container">
                                <h2>تصاویر محصول</h2>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div action="choices/form_upload.html" class="dropzone" style="border: 1px solid #e5e5e5; height: 300px; "></div>
                                    </div>
                                </div>
                            <!-- /*
                                <div class="input-group image-preview col-md-8 col-md-offset-2"
                                     style="padding:0px 10px !important;float: left;">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                    <!-- don't give a name === doesn't send on POST/GET
                                    <span class="input-group-btn">
                                        <!-- image-preview-clear button
                                        <button type="button" class="btn btn-default image-preview-clear"
                                                style="display:none;">
                                            <span class="glyphicon glyphicon-remove"></span> پاک کردن
                                        </button>
                                        <!-- image-preview-input
                                        <div class="btn btn-default image-preview-input ">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title2" id="pic">انتخاب تصویر محصول</span>
                                            <input type="file" id="pic" accept="image/png, image/jpeg, image/gif"
                                                   name="image"/>
                                            <!-- rename it
                                        </div>
                                        </span>
                                </div><!-- /input-group image-preview [TO HERE]-->
                                <br>
                                <br>
                                <br>
                                <h2 style="display: block;">ویدئوی محصول</h2>
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
                var btnFinish = $('<button></button>').text('پایان')
                    .addClass('btn btn-info')
                    .on('click', function () {
                        alert('Finish Clicked');
                    });
                var btnCancel = $('<button></button>').text('ریست')
                    .addClass('btn btn-danger')
                    .on('click', function () {
                        $('#smartwizard').smartWizard("reset");
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
@endsection
