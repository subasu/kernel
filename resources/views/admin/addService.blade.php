@extends('layouts.adminLayout')
@section('content')
    <style>
        input, label {
            font-size: 15px;
        }
    </style>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ایجاد کاربر
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                {{-- table --}}
                <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" id="serviceForm" dir="rtl">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select class="col-md-7 col-xs-12 form-control"
                                            name="icon" style="font-family: FontAwesome;">
                                        @foreach($icons as $icon)
                                            <option value="fa {{$icon->icon}}">{{$icon->icon}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="icon"> آیکن : <span
                                            class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input id="title" class="form-control col-md-7 col-xs-12" name="title"
                                           required="required" type="text">
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="title"> عنوان : <span
                                            class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <textarea id="description" class="form-control col-md-7 col-xs-12"
                                              name="description"
                                              required="required"></textarea>
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="description"> توضیحات :
                                    <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button id="sendInfo" type="button" class="col-md-9 btn btn-primary">ثبت نهایی
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#sendInfo").click(function () {
                    var formData = new FormData($('#serviceForm')[0]);
                    console.log(formData);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('admin/addServicePost')}}",
                        type: 'post',
                        cache: false,
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            swal({
                                title: "",
                                text: response,
                                type: "info"
                            });
                        }, error: function (response) {
                            swal({
                                title: "",
                                text: response,
                                type: "warning"
                            });
                        }
                    });
                });
            });
        </script>
@endsection