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
                                    <div class="col-md-4 col-sm-6 col-xs-9">
                                        <input id="file" class="form-control col-md-7 col-xs-12" name="file[]" placeholder=""
                                               required="required" type="file">
                                    </div>
                                <div class="col-md-5 col-sm-6 col-xs-9">
                                        <input id="category" class="form-control col-md-7 col-xs-12" name="category[]" placeholder=""
                                               required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-4 col-xs-3" for="name"> نام دسته اصلی : <span
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
                                    <button id="add" type="button" class="col-md-4 btn btn-success" style="display: none;">اضافه کردن دسته جدید</button>
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

                        $('#change').append
                        (
                            "<br/><br/>"+

                            "<div class='col-md-4 col-sm-6 col-xs-9'>"+
                            '<input id="file" class="form-control col-md-7 col-xs-12" name="file[]"  type="file">'+
                            "</div>"+
                            "<div class='col-md-5 col-sm-6 col-xs-9'>"+
                            "<input id='category' class='form-control col-md-12 col-xs-12' name='category[]' placeholder='' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>نام دسته اصلی :"+
                            "<span class='required star' title='پر کردن این فیلد الزامی است'>*</span>"+
                            "</label>"
                        );



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
                    //dataType : "JSON",
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
                                    var i = 0;
                                    $.each(response,function (key,value) {
                                        var item = $('#categories');
                                        item.empty();
                                        if(i == 0)
                                        {
                                            item.append
                                            (
                                                "<option selected='true' disabled='disabled'>لطفا دسته مورد نظر را انتخاب نمایید</option>"
                                            )
                                        }
                                        item.append
                                        (
                                            option += "<option id='"+value.id+"' name='"+value.depth+"'>"+value.title+"</option>"
                                        );
                                        i++;
                                    });
                                    depth == 0;
                                    $('#change').css('display','none');
                                    $('#change').empty();
                                    $('#add').css('display','block');
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
                            $('#add').css('display','block');
                            $('#addInput').css('display','none');
                            var i = 0;
                            $.each(response,function (key,value) {
                                var item = $('#categories');
                                item.empty();
//                                if(i == 0)
//                                {
                                    item.append
                                    (
                                        "<option selected='true' disabled='disabled'>لطفا دسته مورد نظر  انتخاب نمایید</option>"
                                    )

                                //}
                                item.append
                                (
                                     option +="<option id='"+value.id+"' name='"+value.depth+"' >"+value.title+"</option>"
                                );
                                i++;
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

        </script>
        <script>
            $(function () {
                var catId    = '';
                var depth    = '';
                $(document).on('click','#add',function () {
                    //alert(catId);
                    if(catId == '')
                    {
                        $('#change').css('display','block');
                        $('#showCategories').css('display','none');
                        $('#add').css('display','none');
                        $('#reg').css('display','block');
                    }
                })


                //below script to get sub category

                $(document).on('change','#categories',function () {

                    $("[name = 'categories'] option:selected").each(function(){

                        var id = $(this).attr('id');
                        catId = '';
                        catId += id;
                        var depth = $(this).attr('name');
                        //            alert(id);
                        if(depth != 0)
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
                                    }
                                });
                            }
                        }else
                            {
                                    alert('زیر دسته ای وجود ندارد.');
                            }


                    })
                })


                // below script ot get brands
                $(document).on('change','#subCategories',function () {
                    $("[name = 'subCategories'] option:selected ").each(function () {


                        var id = $(this).attr('id');
                        catId ='';
                        catId +=id;
                        var depth = $(this).attr('name');
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
                                    }
                                });
                            }
                        }else
                            {
                                alert('زیر دسته ای وجود ندارد.')
                            }


                    })

                })
            })

        </script>
@endsection
