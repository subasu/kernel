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
        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
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
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <a id="addInput" class="glyphicon glyphicon-plus btn btn-success" data-toggle="" title="افزودن زیر دسته" ></a>
                                </div>
                                <label class="control-label col-md-11 col-sm-11 col-xs-11 font-size-s" for="name">  <span
                                            class="required star" title="پر کردن این فیلد الزامی است">نکته:</span>شما حداکثر میتوانید تا سه سطح دسته بندی نمائید و سطح چهارم محصول شما خواهد بود.
                                </label>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div id="showCategories" style="display: none; !important;">
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <select id="categories"  class="form-control" name="categories">
                                        </select>
                                        <br/>
                                        <select id="subCategories"  class="form-control" name="subCategories" style="display: none;">
                                        </select>

                                        <br/>
                                        <select id="brands"  class="form-control" name="brands" style="display: none;">

                                        </select>


                                    </div>
                                <label class="control-label col-md-3 col-sm-4 col-xs-3" for="title"> دسته های موجود : <span
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
                                    <div class="col-md-4 col-sm-6 col-xs-9">
                                        <input id="file" class="form-control col-md-7 col-xs-12" name="file[]" placeholder=""
                                               required="required" type="file">
                                    </div>
                                <div class="col-md-5 col-sm-6 col-xs-9">
                                        <input id="category" class="form-control col-md-7 col-xs-12" name="category[]" placeholder=""
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-4 col-xs-3" for="name"> نام دسته بندی جدید : <span
                                                class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button id="reg" type="button" class="col-md-4 btn btn-primary">ثبت نهایی</button>
                                    <button id="add" type="button" class="col-md-12 btn btn-success" style="display: none;">اضافه کردن دسته جدید</button>
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

                            "<div class='col-md-4 col-sm-6 col-xs-9'>"+
                            '<input id="file" class="form-control col-md-7 col-xs-12" name="file[]"  type="file">'+
                            "</div>"+
                            "<div class='col-md-5 col-sm-6 col-xs-9'>"+
                            "<input id='category' class='form-control col-md-12 col-xs-12' name='category[]' placeholder='' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>نام زیر دسته:"+
                            "<span class='required star' title='پر کردن این فیلد الزامی است'>*</span>"+
                            "</label>"
                        );
                    }
                    else
                    {
                        $('#change').append
                        (
                            "<br/><br/><br/>"+

                            "<div class='col-md-4 col-sm-6 col-xs-9'>"+
                            '<input id="file" class="form-control col-md-7 col-xs-12" name="file[]"  type="file">'+
                            "</div>"+
                            "<div class='col-md-5 col-sm-6 col-xs-9'>"+
                            "<input id='category' class='form-control col-md-12 col-xs-12' name='category[]' placeholder='' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>برند:"+
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
                var option = '';
                $.ajax({

                    cache    :false,
                    url      :"{{url('api/v1/getMainCategories')}}",
                    type     :'get',
                    dataType :'json',
                    success  :function (response) {
                        console.log(response);
                        if(response != 0)
                        {
                            $('#showCategories').css('display','block');
                            $('#reg').css('display','none');
                            $('#add').css('display','block');

                            $.each(response,function (key,value) {
                                var item = $('#categories');
                                item.empty();
                                item.append
                                (
                                     option +="<option id='"+value.id+"' name='"+value.depth+"' >"+value.title+"</option>"
                                );
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
                var option = '';
                var formData = $('#categoryForm').serialize();
                $.ajax
                ({
                   cache    : "false",
                   url      : "{{url('addNewCategory')}}",
                   type     : "post",
                   //dataType : "JSON",
                   data     : formData,
                   success  : function(response)
                   {
                       swal({
                           title: "",
                           text: response,
                           type: "info",
                           confirmButtonText: "بستن"
                       });
                       $.ajax({

                           cache:false,
                           url:"{{url('api/v1/getMainCategories')}}",
                           type:'get',
                           dataType:"json",
                           success:function (response) {
                               console.log(response);
                               if(response != 0)
                               {
                                   $('#showCategories').css('display','block');
                                   $('#reg').css('display','none');
                                   $.each(response,function (key,value) {
                                       var item = $('#categories');
                                       item.empty();
                                       item.append
                                       (
                                           option += "<option id='"+value.id+"' name='"+value.depth+"'>"+value.title+"</option>"
                                       );
                                   });

                                   $('#change').css('display','none');
                                   $('#change').empty();
                                   $('#add').css('display','block');
                               }

                           }

                       })
                   },error:function(error)
                    {
                        console.log(error);
                        swal({
                            title: "",
                            text: 'خطایی رخ داده است، با بخش پشتیبانی تماس بگیرید',
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                });
            })
        </script>
        <script>
            $(document).on('click','#add',function () {
                $('#add').fadeOut(2000);
                $('#showCategories').fadeOut(2000);
                $('#change').empty();
                $('#change').css('display','block');
                setTimeout(function () {
                    $('#change').append
                    (
                        '<div class="col-md-1" style="margin-left: 6.333333%;margin-right: 2%;">'+
                        '<a id="addInput" class="glyphicon glyphicon-plus btn btn-success" data-toggle="" title="افزودن زیر دسته" ></a>'+
                        '</div>'+

                        '<div class="col-md-5 col-sm-6 col-xs-9">'+
                        '<input id="category" class="form-control col-md-7 col-xs-12" name="category[]" placeholder="" required="required" type="text">'+
                        '</div>'+
                        '<label class="control-label col-md-3 col-sm-4 col-xs-3" for="name"> نام دسته بندی جدید :' +
                        ' <span class="required star" title="پر کردن این فیلد الزامی است">*</span>'+
                        '</label>'
                    );
                    $('#reg').fadeIn(3000);
                },2000);
            })
        </script>

        <!-- below script to get sub category -->
        <script>
            $(function(){
                var option = '';
                $('#categories').click(function () {
                    $("[name = 'categories'] option:selected").each(function(){
                        var id = $(this).attr('id');
                        var depth = $(this).attr('name');
                        if(depth != 0)
                        {
                            swal({
                                    title: "دسته انتخاب شده دارای زیر دسته میباشد،آیا تمایل دارید زیر دسته ها را مشاهده نمایید؟",
                                    text: "",
                                    type: "info",
                                    showCancelButton: true,
                                    confirmButtonColor: "	#5cb85c",
                                    cancelButtonText: "خیر ، منصرف شدم",
                                    confirmButtonText: "بله ، زیر دسته ها نمایش داده شود",
                                    closeOnConfirm: true,
                                    closeOnCancel: false
                                },
                                function (isConfirm) {
                                    if (isConfirm)
                                    {
                                        getSubCategory(id);

                                        function getSubCategory (id) {
                                            var option="";
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                                }
                                            })
                                            $.ajax
                                            ({
                                                cache :false,
                                                url: "{{Url('api/v1/getSubCategories')}}/" + id,
                                                dataType: "json",
                                                type: "get",
                                                success: function (response)
                                                {

                                                    console.log(response);

                                                    $.each(response, function (key, value) {
                                                        var item = $('#subCategories');
                                                        item.empty();
                                                        item.append
                                                        (
                                                            option +="<option id='"+value.id+"' name='"+value.depth+"'>"+value.title+"</option>"

                                                        );

                                                    });
                                                    $('#subCategories').css('display','block');
                                                }
                                            });
                                        }
                                    }


                                })
                        }


                    })
                })
            })
        </script>

        <!-- below script ot get brands -->
        <script>
            $(function(){
                var option = '';
                    $('#subCategories').click(function () {
                        $("[name = 'subCategories'] option:selected ").each(function () {
                            var id = $(this).attr('id');
                            var depth = $(this).attr('name');
                            if(depth != 0)
                            {
                                swal({
                                        title: "دسته انتخاب شده دارای زیر دسته میباشد،آیا تمایل دارید زیر دسته ها را مشاهده نمایید؟",
                                        text: "",
                                        type: "info",
                                        showCancelButton: true,
                                        confirmButtonColor: "	#5cb85c",
                                        cancelButtonText: "خیر ، منصرف شدم",
                                        confirmButtonText: "بله ، زیر دسته ها نمایش داده شود",
                                        closeOnConfirm: true,
                                        closeOnCancel: false
                                    },
                                    function (isConfirm) {
                                        if (isConfirm)
                                        {
                                            getBrands(id);

                                            function getBrands (id) {
                                                var option="";
                                                $.ajaxSetup({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                                    }
                                                })
                                                $.ajax
                                                ({
                                                    cache :false,
                                                    url: "{{Url('api/v1/getBrands')}}/" + id,
                                                    dataType: "json",
                                                    type: "get",
                                                    success: function (response)
                                                    {

                                                        console.log(response);

                                                        $.each(response, function (key, value) {
                                                            var item = $('#brands');
                                                            item.empty();
                                                            item.append
                                                            (
                                                                option +="<option id='"+value.id+"' name='"+value.depth+"'>"+value.title+"</option>"

                                                            );

                                                        });
                                                        $('#brands').css('display','block');
                                                    }
                                                });
                                            }
                                        }


                                    })
                            }
                        })
                })
            })
        </script>
@endsection
