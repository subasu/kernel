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
    </style>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ایجاد دسته
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
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
                <div class="col-md-12 col-sm-6 col-xs-12 ">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" id="categoryForm" method="POST" style="direction: rtl !important;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-4 col-xs-3 font-size-s" for="name">  <span
                                            class="required star" title="پر کردن این فیلد الزامی است">نکته:</span>شما حداکثر میتوانید تا سه سطح دسته بندی نمائید و سطح چهارم محصول شما خواهد بود.
                                </label>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group" id="categories">
                                <div id="showCategories" style="display: none; !important;">
                                    <div class="col-md-8 col-sm-6 col-xs-9">
                                        <select  id="categories" class="form-control col-md-7 col-xs-12" name="categories">

                                        </select>

                                    </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-3" for="title"> دسته های موجود : <span
                                            class="required star" title="پر کردن این فیلد الزامی است"></span>
                                </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="item form-group" id="change" style="display:none;!important;">

                                <div class="col-md-1" style="margin-left: 6.333333%;margin-right: 2%;">
                                    <a id="addInput" class="glyphicon glyphicon-plus btn btn-success" data-toggle="" title="افزودن زیر دسته" ></a>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-9">
                                    <input id="category" class="form-control col-md-7 col-xs-12" name="category[]" placeholder=""
                                           required="required" type="text">
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-3" for="name"> نام دسته بندی جدید : <span
                                            class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <button id="reg" type="button" class="col-md-12 btn btn-primary">ثبت نهایی</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>

        <script>
            var depth = 0;
            $(document).on('click','#addInput',function(){
                ++depth;
                if(depth <= 2)
                {
                    if(depth <= 1)
                    {
                        $('#change').append
                        (
                            "<br/><br/><br/>"+
                            "<div class='col-md-1' style='margin-left: 6.333333%;margin-right: 2%;'>"+

                            "</div>"+
                            "<div class='col-md-6 col-sm-6 col-xs-9'>"+
                            "<input id='category' class='form-control col-md-12 col-xs-12' name='category[]' placeholder='' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-4 col-sm-4 col-xs-3' for='name'>نام زیر دسته:"+
                            "<span class='required star' title='پر کردن این فیلد الزامی است'>*</span>"+
                            "</label>"
                        );
                    }
                    else
                    {
                        $('#change').append
                        (
                            "<br/><br/><br/>"+
                            "<div class='col-md-1' style='margin-left: 6.333333%;margin-right: 2%;'>"+

                            "</div>"+
                            "<div class='col-md-6 col-sm-6 col-xs-9'>"+
                            "<input id='category' class='form-control col-md-12 col-xs-12' name='category[]' placeholder='' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-4 col-sm-4 col-xs-3' for='name'>برند:"+
                            "<span class='required star' title='پر کردن این فیلد الزامی است'>*</span>"+
                            "</label>"
                        );
                    }

                }else
                    {
                        swal({
                            title: "",
                            text: 'امکان اضافه کردن بیش از سه سطح برای دسته بندی ها وجود ندارد، در صورت نیاز به تغییر محدودیت  با بخش پشتیبانی گروه مهندسی آرتان تماس بگیرید',
                            type: "info",
                            confirmButtonText: "بستن"
                        });
                        return false;
                    }

            })
        </script>
        {{--create user by AJAX and show result alert and redirect to usersList page --}}
        <script>
            $(function () {
                $.ajax({
                    cache:false,
                    url:"{{url('api/v1/getMainCategories')}}",
                    type:'get',
                    success:function (response) {
                        console.log(response);
                        if(response != 0)
                        {
                            $('#showCategories').css('display','block');
                            var item=$("#categories");
                            item.empty();
                            $.each(response,function (key,value) {
                                item.append('<option>'+value+'</option>');
                            })
                        }else if(response == 0)
                            {
                                $('#change').css('display','block');
                            }

                    }

                })
            })

        </script>
        <script>
            $(document).on('click','#reg',function(){
                var formData = $('#categoryForm').serialize();
                $.ajax
                ({
                   url  : "{{url('addNewCategory')}}",
                   type : "post",
                   data : formData,
                   success : function(response)
                   {
                       alert(response);
                   },error:function(error)
                    {
                        console.log(error);
                       alert(error);
                    }
                });
            })
        </script>
@endsection
