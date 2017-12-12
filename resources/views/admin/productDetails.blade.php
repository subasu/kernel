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


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" dir="rtl">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">ویرایش دسته بندی محصول</h2>
                </div>
                <div id="change">

                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-dark col-md-6 col-md-offset-3" data-dismiss="modal">بستن</button>
                </div>
            </div>

        </div>
    </div>

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
                    @if(!empty($products))
                        <div>
                            <div id="step-1" class="">
                                <br>
                                <div class="container">
                                    <br>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                            <div class="col-md-2">
                                                <a type="button" name="editCategory" id="editCategory"
                                                   content = "{{$products[0]->categories[0]->id}}"
                                                   class="glyphicon glyphicon-edit btn btn-success"
                                                   products-toggle=""
                                                   title="ویرایش "></a>
                                            </div>
                                            <div class="col-md-10">
                                            <input disabled id="lastCategory" class="form-control col-md-12"
                                                   name="lastCategory" value="{{$products[0]->categories[0]->title}}">
                                            </div>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> آخرین دسته
                                            مربوطه :
                                        </label>
                                    </div>

                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                <input disabled id="editable"
                                                       class="form-control col-md-10 col-xs-12 editable" name="title"
                                                       type="text" value="{{$products[0]->title}}">
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> عنوان
                                                محصول :

                                            </label>
                                        </div>
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                <textarea style="text-align: right; direction: ltr;" disabled
                                                          id="editable"
                                                          class="form-control col-md-12 col-xs-12 overflow-x editable"
                                                          name="description" required="required">
                                                @if($products[0]->description != null)
                                                        {{$products[0]->description}}
                                                    @endif
                                                    @if($products[0]->description == null)
                                                        توضیحی وجود ندارد
                                                    @endif
                                            </textarea>
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="description">
                                                توضیح
                                                محصول :
                                            </label>
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->unit_count != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id" value="{{$products[0]->unit_count}}">
                                                @endif
                                                @if($products[0]->unit_count == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="unit"> واحد
                                                شمارش :

                                            </label>
                                        </div>
                                        @if ($errors->has('unit'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 ">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->sub_unit_count != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id"
                                                           value="{{$products[0]->sub_unit_count}}">
                                                @endif
                                                @if($products[0]->sub_unit_count == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="subunit"> زیر
                                                واحد
                                                شمارش

                                            </label>
                                        </div>
                                        @if ($errors->has('subunit'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('subunit') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->productFlags[0]->title  == 'price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id"
                                                           value="{{number_format($products[0]->productFlags[0]->price)}}">
                                                @endif
                                                @if($products[0]->productFlags[0]->title != 'price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="price"> قیمت
                                                اصلی
                                                (تومان) :

                                            </label>
                                        </div>
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
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->produceDate != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="produce_date" value="{{$products[0]->produceDate}}">
                                                @endif
                                                @if($products[0]->produceDate == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="produce_date">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for=""> تاریخ
                                                تولید :

                                            </label>
                                        </div>
                                        @if ($errors->has('produce_date'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('produce_date') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->expireDate != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="expire_date" value="{{$products[0]->expireDate}}">
                                                @endif
                                                @if($products[0]->expireDate == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="expire_date">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="expire_date">
                                                تاریخ
                                                انقضا :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('expire_date'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('expire_date') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->produce_place != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id" value="{{$products[0]->produce_place}}">
                                                @endif
                                                @if($products[0]->produce_place == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>

                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="produce_place">
                                                محل
                                                تولید :

                                            </label>
                                        </div>
                                        @if ($errors->has('produce_place'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('produce_place') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->warehouse_count != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id"
                                                           value="{{$products[0]->warehouse_count}}">
                                                @endif
                                                @if($products[0]->warehouse_count == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3"
                                                   for="warehouse_count"> تعداد
                                                موجود در
                                                انبار :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('warehouse_count'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('warehouse_count') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 ">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->warehouse_place != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id"
                                                           value="{{$products[0]->warehouse_place}}">
                                                @endif
                                                @if($products[0]->warehouse_place == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3"
                                                   for="warehouse_place"> محل
                                                فیزیکی در
                                                انبار :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('warehouse_place'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('warehouse_place') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->ready_time != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id" value="{{$products[0]->ready_time}}">
                                                @endif
                                                @if($products[0]->ready_time == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="ready_time">
                                                زمان آماده
                                                شدن بر حسب ساعت :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('ready_time'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('ready_time') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->barcode != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id" value="{{$products[0]->barcode}}">
                                                @endif
                                                @if($products[0]->barcode == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="barcode"> بارکد
                                                :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
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
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->productFlags[0]->title == 'sales_price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id"
                                                           value="{{number_format($products[0]->productFlags[0]->price)}}">
                                                @endif
                                                @if($products[0]->productFlags[0]->title != 'sales_price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="sales_price">
                                                قیمت حراج
                                                (تومان):
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('sales_price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('sales_price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2 ">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->productFlags[0]->title == 'special_price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id"
                                                           value="{{number_format($products[0]->productFlags[0]->price)}}">
                                                @endif
                                                @if($products[0]->productFlags[0]->title != 'special_price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="special_price">
                                                قیمت
                                                ویژه (تومان):
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('special_price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('special_price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->productFlags[0]->title == 'wholesale_price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id"
                                                           value="{{number_format($products[0]->productFlags[0]->price)}}">
                                                @endif
                                                @if($products[0]->productFlags[0]->title != 'wholesale_price')
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable pr"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3"
                                                   for="wholesale_price"> قیمت
                                                عمده (تومان):
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('wholesale_price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('wholesale_price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->discount_volume != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id"
                                                           value="{{$products[0]->discount_volume}}">
                                                @endif
                                                @if($products[0]->discount_volume == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3"
                                                   for="discount_volume">
                                                حجم/تعداد مشمول
                                                تخفیف :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('discount_volume'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('discount_volume') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2 ">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->discount != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id" value="{{$products[0]->discount}}">
                                                @endif
                                                @if($products[0]->discount == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="discount"> درصد
                                                تخفیف :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
                                        @if ($errors->has('discount'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                        <div id="grandparent">
                                            <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                                <div class="col-md-2">
                                                    <a type="button" name="edit" id="edit"
                                                       class="glyphicon glyphicon-edit btn btn-success edit"
                                                       products-toggle=""
                                                       title="ویرایش "></a>
                                                </div>
                                                <div class="col-md-10">
                                                @if($products[0]->delivery_volume != null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-10 editable"
                                                           name="unit_count_id"
                                                           value="{{$products[0]->delivery_volume}}">
                                                @endif
                                                @if($products[0]->delivery_volume == null)
                                                    <input disabled id="editable"
                                                           class="form-control col-md-7 col-xs-10 editable"
                                                           name="unit_count_id">
                                                @endif
                                                </div>
                                            </div>
                                            <label class="control-label col-md-2 col-sm-4 col-xs-3"
                                                   for="delivery_volume">
                                                حجم/تعداد مشمول
                                                پیک رایگان :
                                                <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                            </label>
                                        </div>
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
                                    <div id="addPic" class="grandparent">

                                        @foreach($products[0]->productImages as $image)
                                            <div class="parent" name="parent">
                                                <div class="col-md-10 margin-1">

                                                    <div class="col-md-2 col-md-offset-3">
                                                        <a class="glyphicon glyphicon-edit btn btn-success editPic"
                                                           products-toggle=""
                                                           title="ویرایش "></a>
                                                    </div>
                                                    <div class="col-md-5 col-sm-6 col-xs-9 newFile" id="newFile"
                                                         style="display: none;">
                                                        <input class="form-control col-md-7 col-xs-12 editable"
                                                               id="editable" name="unit_count_id" type="file">
                                                    </div>
                                                    <div class="col-md-5 col-sm-6 col-xs-9 showPic" id="showPic"
                                                         style="display: block;">
                                                        <img class="image" id="editable"
                                                             style="height: 100px; width: 100px; margin-left: 80%;"
                                                             src="{{url('public/dashboard/productFiles/picture')}}/{{$image->image_src}}">
                                                    </div>

                                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="pic">
                                                        تصویر محصول :
                                                        <span class="required star"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-10 ">
                                        <hr>
                                    </div>
                                    <div class="grandparent" id="grandparent">
                                        <div class="col-md-10 margin-bot-1 parent">
                                            <div class="col-md-2 col-md-offset-3">
                                                <a type="button" name="edit" id="edit"
                                                   class="glyphicon glyphicon-edit btn btn-success edit"
                                                   products-toggle=""
                                                   title="ویرایش "></a>
                                            </div>
                                            <div class="col-md-5 col-sm-6 col-xs-9 ">
                                                @if($products[0]->video_src != null)
                                                    <video disabled="disabled"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           id="editable" name="unit_count_id">
                                                        <source src="{{url('public/dashboard/productFiles/video')}}/{{$products[0]->video_src}}">
                                                    </video>
                                                @endif
                                                @if($products[0]->video_src == null)
                                                    <input disabled="disabled"
                                                           class="form-control col-md-7 col-xs-12 editable"
                                                           id="editable" name="unit_count_id" type="file">
                                                @endif
                                            </div>

                                            <label class="control-label col-md-2 col-sm-4 col-xs-3" for="video_src">
                                                ویدئوی
                                                محصول :
                                                <span class="required star"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                var btnFinish = $('<button></button>').text('ویرایش')
                    .addClass('btn btn-info')
                    .on('click', function () {
                        var formproducts = new FormData($("#productForm")[0])
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
                    .addClass('btn btn-danger').css("display", "none")
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
        </script>
        <!-- below script is to zoom in/out picture  -->
        <script>
            $(document).ready(function () {
                $('.image').hover(
                    function () {
                        $(this).animate({'zoom': 1.4}, 400);
                    },
                    function () {
                        $(this).animate({'zoom': 1}, 400);
                    });
            });
        </script>

        <!-- below script is to make inputs editable -->
        <script>
            $(function () {
                $('.edit').each(function () {
                    $(this).click(function () {
                        var DOM = $(this).parentsUntil('#grandparent');
                        var editable = $(DOM).find('#editable');
                        // console.log(DOM);
                        // console.log(editable);
                        $(editable).prop('disabled', false);
                    })
                })

            })

        </script>
        <!-- below script is to make picture hidden and display7 an another input type file -->
        <script>
            $(function () {
                $('.editPic').each(function () {
                    $(this).click(function () {
                        var DOM = $(this).parentsUntil('.grandparent');
                        var showPic = $(DOM).find('.showPic');
                        $(showPic).css('display', 'none');
                        var newFile = $(DOM).find('.newFile');
                        $(newFile).css('display', 'block');
                    })
                })

            })
        </script>

        <!-- below script is to handle category management -->
        <script>
            $(document).on('click','#editCategory',function(){
                    var categoryId = $(this).attr('content');
                    //alert(categoryId);
                    $('#myModal').modal('show');
            })
        </script>


        <script src="{{ URL::asset('public/js/persianDatepicker.js')}}"></script>
        {{--persianDatepicker--}}
        <script>
            $(function () {
                $("[name = 'produce_date']").each(function(){
                    $(this).persianDatepicker();
                })

                $("[name = 'expire_date']").each(function () {
                    $(this).persianDatepicker();
                })
            })
        </script>
        <script>
            $(function(){
                function formatNumber (num) {
                    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                }

                $(".pr").on('keyup',function () {
                    var price= $(this);
                    var v0=price.val();
                    var v1 = v0.split(',').join('');
                    var v2=formatNumber(v1);
                    price.val(v2)
                })

            })

        </script>
@endsection
