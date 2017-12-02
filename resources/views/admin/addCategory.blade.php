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
        .myAlertColor{
            background-color: #28a745!important
        }
    </style>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ایجاد دسته</h2>
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
                        <form enctype="multipart/form-data" class="form-horizontal form-label-left" id="categoryForm"  method="POST" style="direction: rtl !important;">
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
                                <label class="control-label col-md-3 col-sm-4 col-xs-3" for="title"> دسته های اصلی  موجود : <span
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


                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button id="reg" type="button" class="col-md-4 btn btn-primary">ثبت نهایی</button>
                                    <button id="addMainCategory" type="button" class="col-md-3 btn btn-success" style="display: none;">اضافه کردن دسته اصلی جدید</button>
                                    <button id="addSubCategory" type="button" class="col-md-3 btn btn-info" style="display: none;!important;"> اضافه کردن زیر دسته جدید</button>
                                    <button id="addBrands" type="button" class="col-md-3 btn btn-primary" style="display: none;!important;"> اضافه کردن برند جدید</button>
                                </div>
                            </div>
                            <input type="hidden" id="mainId" name="mainId" value="">
                            <input type="hidden" id="subId" name="subId" value="">
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>

        <!-- below script is to append html element to change tag -->
        <script>
            function appendToChange()
            {
                $('#change').append
                (
                    "<br/><br/>"+

                    "<div class='col-md-4 col-sm-6 col-xs-9'>"+
                    '<input id="file" class="form-control col-md-7 col-xs-12" name="file[]"  type="file">'+
                    "</div>"+
                    "<div class='col-md-5 col-sm-6 col-xs-9'>"+
                    "<input id='category' class='form-control col-md-12 col-xs-12' name='category[]' placeholder='' required='required' type='text'>"+
                    "</div>"+
                    "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>نام دسته  :"+
                    "<span class='required star' title='پر کردن این فیلد الزامی است'>*</span>"+
                    "</label>"
                );
            }

        </script>

        <!-- below script is to handle when we want to add main category or sub category -->
        <script>
            function untimelyAddCategory(title) {
                swal({
                        title:  " آیا شما دسته  " +title+ " را انتخاب نمودید؟ ",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "	#5cb85c",
                        cancelButtonText: "خیر",
                        confirmButtonText: "آری",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $('#change').css('display', 'block');
                            $('#showCategories').css('display', 'none');
                            $('#addInput').css('display', 'block');
                            $('#reg').css('display', 'block');
                            $('#addMainCategory').css('display', 'none');
                            $('#addSubCategory').css('display', 'none');
                            $('#addBrands').css('display', 'none');
                            $('#subCategories').empty();


                            $('#change').append
                            (
                                '<div id="main" class="col-md-5 col-md-offset-4">'+
                                '<input value="'+title+'" class="form-control col-md-6" disabled  style="text-align: center; font-size: 120%;">'+
                                '<b>'
                                +'<lable style="margin-right:-60%;" class="control-label" for="name">نام دسته منتخب:</lable>'+
                                '</b>'+
                                '</div>'
                            );
                            appendToChange();
                        }else
                        {
                            $('#subCategories').css('display','none');
                            $('#addSubCategory').css('display','none');
                        }
                    });
            }
        </script>

        <!-- below script is related to append input -->
        <script>
            var depth = 0;
            $(document).on('click','#addInput',function(){
                    appendToChange();
            })


            $(document).on('click','#reg',function(){
                var option = '';
                var formData = new FormData ($('#categoryForm')[0]);
                $.ajax
                ({
                    cache       : "false",
                    url         : "{{url('addNewCategory')}}",
                    type        : "post",
                    processData : false,
                    contentType : false,
                    dataType : "JSON",
                    data        : formData,
                    success     : function(response)
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
//
                                            item.append
                                            (
                                                "<option selected='true' disabled='disabled'>برای اضافه کردن زیر دسته ها ، دسته ای را انتخاب کنید</option>"
                                            )

                                        item.append
                                        (
                                            option += "<option id='"+value.id+"' name='"+value.depth+"'>"+value.title+"</option>"
                                        );

                                    });
                                    depth == 0;
                                    $('#change').css('display','none');
                                    $('#change').empty();
                                    $('#addMainCategory').css('display','block');
                                    $('#addInput').css('display','none');
                                    $('#subCategories').empty();
                                    $('#subCategories').css('display','none');
                                }

                            }

                        })
                    },error:function(error)
                    {
                        if(error.status === 500)
                        {
                            console.log(error);
                            swal({
                                title: "",
                                text: 'خطایی رخ داده است، با بخش پشتیبانی تماس بگیرید',
                                type: "warning",
                                confirmButtonText: "بستن"
                            });
                        }else if(error.status === 422)
                        {
                            console.log(error);
                        }

                    }
                });
            })
        </script>
        {{--get main categories --}}
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
                            $('#addMainCategory').css('display','block');
                            $('#addSubCategory').css('display','none');
                            $('#addInput').css('display','none');

                            $.each(response,function (key,value) {
                                var item = $('#categories');
                                item.empty();

                                    item.append
                                    (
                                        "<option selected='true' disabled='disabled'>برای اضافه کردن زیر دسته ها ، دسته ای را انتخاب کنید</option>"
                                    )


                                item.append
                                (
                                     option +="<option id='"+value.id+"' name='"+value.depth+"' >"+value.title+"</option>"
                                );

                            })
                        }else if(response == 0)
                            {
                                appendToChange();
                                $('#change').css('display','block');
                            }

                    }

                })
            })

        </script>
        <!-- below script is related to add main category button  -->
        <script>
            $(function () {
                   $(document).on('click','#addMainCategory',function () {
                   $('#change').css('display','block');
                   appendToChange();
                   $('#showCategories').css('display','none');
                   $('#addInput').css('display','block');
                   $('#reg').css('display','block');
                   $('#addMainCategory').css('display','none');
                   $('#addSubCategory').css('display','none');
                });
            })
        </script>

        <!-- below script is related to add sub category button  -->
        <script>
            $(function () {
                $(document).on('click','#addSubCategory',function () {
                    var mainTitle = '';
                    $("[name = 'categories'] option:selected ").each(function(){
                         mainTitle += $(this).val();
                         $('#mainId').val($(this).attr('id'));
                    });
                    if(mainTitle == '')
                    {
                        swal({
                            title: "",
                            text: 'لطفا دسته ای را انتخاب نمایید!',
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }else
                        {
                            //alert(mainTitle);
                            untimelyAddCategory(mainTitle);
                        }
                })
            })
        </script>

        <!-- below script is related to add brands button -->
        <script>
            $(function () {
                $(document).on('click','#addBrands',function () {
                    var mainTitle = '';
                    var subTitle  = '';
                    $("[name = 'categories'] option:selected ").each(function(){
                        mainTitle += $(this).val();
                        $('#mainId').val($(this).attr('id'));
                    });
                    $("[name = 'subCategories'] option:selected ").each(function(){
                        subTitle += $(this).val();
                        $('#subId').val($(this).attr('id'));
                    });
                    if(subTitle == '')
                    {
                        swal({
                            title: "",
                            text: 'لطفا زیر دسته ای را انتخاب کنید!',
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }else
                    {
                        //alert(mainTitle);
                        untimelyAddCategory(subTitle);
                    }
                })
            })
        </script>

        <!-- below script to get sub category -->
        <script>
            $(function () {
                $(document).on('change','#categories',function () {

                    $("[name = 'categories'] option:selected").each(function(){

                        var id = $(this).attr('id');
                        $('#mainId').val(id);
                        var title = $(this).val();
                        var depth = $(this).attr('name');
                        //alert(depth);
                        if(depth != 0)
                        {
                            getSubCategory(id);

                            function getSubCategory (id) {

                             //   return false;
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
                                    contentType : false,
                                    success: function (response)
                                    {

                                        console.log(response);
                                        var i = 0;
                                        $.each(response, function (key, value) {
                                            var item = $('#subCategories');
                                            item.empty();
//                                            if(i == 0)
//                                            {
                                            item.append
                                            (
                                                "<option selected='true' disabled='disabled'>لطفا زیر دسته مورد نظر را انتخاب نمایید</option>"
                                            )
                                            //                            }
                                            item.append
                                            (

                                                option +="<option id='"+value.id+"' name='"+value.depth+"'>"+value.title+"</option>"

                                            );
                                        });
                                        i++;
                                        $('#subCategories').css('display','block');
                                        $('#addSubCategory').css('display','block');
                                    }
                                });
                            }
                        }else
                            {
                                   untimelyAddCategory(title);
                            }
                    })
                })
            })
         </script>

         <!-- below script ot get brands -->
         <script>
                $(document).on('change','#subCategories',function () {
                    $("[name = 'subCategories'] option:selected ").each(function () {

                        var id = $(this).attr('id');
                        var depth = $(this).attr('name');
                        var subTitle = $(this).val();
                        $('#subId').val(id);
                        if(depth != 0)
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
                                        $('#addBrands').css('display','block');
                                    }
                                });
                            }
                        }else
                            {
                                untimelyAddCategory(subTitle);
                            }
                    })

                })
        </script>
@endsection
