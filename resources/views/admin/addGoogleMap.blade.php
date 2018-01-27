@extends('layouts.adminLayout')
@section('content')
    <style>
        input, label {
            font-size: 15px;
        }
    </style>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-12 col-sm-6 col-xs-12 ">
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ثبت نقشه گوگل سایت</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-12" dir="rtl">
                                <label class="control-label col-md-12" for="file">آدرس گوگل مپ سایت خود را وارد نمائید: (نکته: فقط قسمت src تگ iframe  را درج نمائید.)
                                </label>
                            </div>
                            <div id="alerts"></div>
                            <div id="editor">
                            </div>
                            <textarea name="descr" id="descr" style="display:none;"></textarea>
                            <br/>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button id="send1" type="button" class="col-md-9 btn btn-primary">ثبت نهایی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12"></div>
    </div>
    <script>
        $(document).ready(function () {
            $("#send1").click(function () {
                var editorText = $("#editor").html();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('admin/addGoogleMapPost')}}",
                    data: {'iframe_tag': editorText},
                    dataType: "json",
                    method: "post",
                    success: function(response) {
                        swal({
                            title: "",
                            text: response.message,
                            type: "info"
                        });
                    }, error: function(response) {
                        swal({
                            title: "",
                            text: response.message,
                            type: "warning"
                        });
                    }
                });
            });
        });
    </script>
@endsection