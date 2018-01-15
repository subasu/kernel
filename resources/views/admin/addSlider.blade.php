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
    </style>
    <!-- Include SmartWizard CSS -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Optional SmartWizard theme -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet"
          type="text/css"/>
    <div class="clearfix"></div>
    <div class="row">
        <div class="container">
            <form class="form-horizontal form-label-left" id="productForm" enctype="multipart/form-data"
                  style="direction: rtl !important;">
                {{ csrf_field() }}
                <div class="container">
                    <div id="addPic">
                        <div class="col-md-12 margin-1">
                            <div class="col-md-1 col-sm-1 col-xs-1 ">
                                <a id="addInput" class="glyphicon glyphicon-plus btn btn-success"
                                   data-toggle=""
                                   title="افزودن تصویر"></a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-9 ">
                                <input class="form-control col-md-12 col-xs-12"
                                       type="file" name="file[]" id="pic"/>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-9 ">
                                <input class="form-control col-md-12 col-xs-12"
                                       name="alt[]" id="alt"/>
                            </div>
                            <label class="control-label col-md-1 col-sm-4 col-xs-3" for="file"> alt تصویر
                                :
                                <span class="required star"></span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-9 ">
                                <input class="form-control col-md-12 col-xs-12"
                                       name="title[]" id="title"/>
                            </div>
                            <label class="control-label col-md-1 col-sm-4 col-xs-3" for="file">title تصویر
                                :
                                <span class="required star"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-10 ">
                        <hr>
                    </div>
                </div>
            </form>
        </div>
        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript"
                src="{{url('public/dashboard/stepWizard/js/jquery.smartWizard.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#productForm").submit(function (e) {
                    e.preventDefault();
                });
                // Toolbar extra buttons
                var btnFinish = $('<button></button>').text('ثبت گالری تصاویر')
                    .addClass('btn btn-info')
                    .on('click', function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        var formData = new FormData($("#productForm")[0])
                        $.ajax({
                            url: '{{url('admin/addNewSlider')}}',
                            type: 'post',
                            cache: false,
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                console.log(data);
                                var x = '';
                                $.each(data, function (key, val) {
                                    x += val + '\n'
                                });
                                console.log(data.responseText)
                                swal({
                                    title: '',
                                    text: x,
                                    type: "info",
                                    confirmButtonText: "بستن"
                                });
                                if (data.data == 'محصول شما با مؤفقیت درج شد') {
                                    setTimeout(function () {
                                        window.location.reload(true);
                                    }, 3000);
                                }


                            },
                            error: function (xhr) {
                                var x;
                                $.each(xhr, function (key, val) {
                                    x += val + '\n'
                                });
                                swal({
                                    title: '',
                                    text: xhr,
                                    type: "info",
                                })
                            }//error
                        })//ajax
                    });//onclick

            });
        </script>
        <!-- send product form -->
        <script>
            $(document).ready(function () {
                //add input type file for add pic for product
                var counter = 0
                $('#addInput').on('click', function () {
                    if (counter < 10) {
                        $('#addPic').append
                        (
                            '<div class="col-md-12 margin-1">' +
                            '<div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-3">' +
                            '<input class="form-control col-md-12 col-xs-12" type="file" name="file[]" id="file"/>' +
                            '</div>' +
                            '<div class="col-md-2 col-sm-6 col-xs-9 ">' +
                            '<input class="form-control col-md-12 col-xs-12" name="alt[]" id="alt"/>' +
                            '</div>' +
                            '<label class="control-label col-md-1 col-sm-4 col-xs-3" for="file"> alt تصویر:' +
                            '<span class="required star"></span>' +
                            '</label>'+
                            '<div class="col-md-2 col-sm-6 col-xs-9 ">'+
                            '<input class="form-control col-md-12 col-xs-12" name="title[]" id="title"/>'+
                            '</div>'+
                            '<label class="control-label col-md-1 col-sm-4 col-xs-3" for="file">title تصویر:'+
                            '<span class="required star"></span>'+
                            '</label>'+
                        '</div>'
                    )
                        ;
                        counter++;
                    }
                    else {
                    }
                });
            });
        </script>
@endsection