@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ویرایش سرویس های سایت</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


                {{--<a href="{{url('admin/addProduct')}}" id="user-send" type="button" class="col-md-2 btn btn-primary" style="font-weight: bold;">--}}
                {{--<i class="fa fa-th-list"></i>                    افزودن دسته ی جدید                </a>--}}
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <form id="editForm">
                        <table style="direction:rtl;text-align: center" id="example"
                               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                            <thead>
                            <tr class="table-head">
                                <th>ردیف</th>
                                <th>آیکن فعلی</th>
                                <th>آیکن</th>
                                <th>عنوان</th>
                                <th>توضیحات</th>
                                <th>ویرایش</th>
                                <th>تغییر وضعیت</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i = 0 ?>

                            {{csrf_field()}}
                            {{--@foreach($categoryInfo as $category)--}}
                            <tr class="unit">
                                <td class="col-md-1" style="font-size: 120%;">{{++$i}}</td>
                                <td class="col-md-1"><i class="glyphicon {{$service->icon}} fa-2x"></i></td>
                                <td class="col-md-3">
                                    <div class="col-md-12 col-sm-6 col-xs-12" style="padding: 0 !important;">
                                        <button id="iconPicker" class="btn btn-default" data-placement="left"
                                                role="iconpicker" style="margin: 0 !important;"></button>
                                        <div class="col-md-9">
                                            <input id="icon-name" class="form-control"
                                                   required="required" type="text" disabled>
                                        </div>
                                        <input id="icon-name-hidden" class="form-control" name="icon"
                                               required="required" type="hidden">
                                    </div>
                                </td>
                                <td class="col-md-2"><input class="form-control" style="width: 100%;" id="title"
                                                            name="title" value="{{$service->title}}"></td>
                                <td class="col-md-2"><input class="form-control" style="width: 100%;" id="description"
                                                            name="description" value="{{$service->description}}"></td>
                                <td>
                                    <button id="edit" type="button" class="btn btn-warning col-md-9 col-md-offset-1">
                                        ویرایش
                                    </button>
                                </td>
                                @if($service->active == 1)
                                    <td class="col-md-1"><a id="active" content="{{$service->active}}"
                                                            name="{{$service->id}}"
                                                            type="button" data-content="غیر فعال"
                                                            class="btn btn-danger">غیر فعال</a>
                                    </td>
                                @endif
                                @if($service->active == 0)
                                    <td class="col-md-1"><a id="active" content="{{$service->active}}"
                                                            name="{{$service->id}}"
                                                            type="button" data-content="فعال"
                                                            class="btn btn-success "> فعال</a>
                                    </td>
                                @endif <input type="hidden" value="{{$service->id}}" id="id" name="id">
                                <input type="hidden" id="token" value="{{csrf_token()}}" name="_token">
                            </tr>
                            {{--@endforeach--}}

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <script>
            //when icon selector change the name of icon show in input text and input hidden
            $('#iconPicker').on('change', function (e) {
                $("#icon-name").val(e.icon);
                $("#icon-name-hidden").val(e.icon);
            });
            $(document).on('click', '#edit', function () {
                var formData = new FormData($("#editForm")[0]);
                console.log(formData);
                var myTitle = $('#title');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                swal({
                        title: " آیا می خواهید ویرایش انجام دهید؟  ",
                        text: "",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "	#5cb85c",
                        cancelButtonText: "خیر",
                        confirmButtonText: "آری",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax
                            ({
                                cache: false,
                                url: "{{url('admin/editServicePost')}}",
                                data: formData,
                                type: "post",
                                dataType: 'json',
                                contentType: false,
                                processData: false,
                                beforeSend: function () {
                                    if (myTitle.val() == null || myTitle.val() == '') {
                                        myTitle.css('border-color', 'red');
                                        myTitle.focus();
                                        swal({
                                            title: "",
                                            text: 'پر کردن عنوان الزامی است',
                                            type: "warning",
                                            confirmButtonText: "بستن"
                                        });
                                        return false;
                                    }
                                },
                                success: function (response) {
                                    if (response.code == 1) {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "success",
                                            confirmButtonText: "بستن"
                                        });
                                        setTimeout(function () {
                                            window.location.href = document.referrer;
                                        }, 4000);
                                    } else {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "warning",
                                            confirmButtonText: "بستن"
                                        });
                                    }

                                }, error: function (error) {
                                    console.log(error);
                                    if (error.status === 500) {
                                        swal({
                                            title: "",
                                            text: 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید',
                                            type: "warning",
                                            confirmButtonText: "بستن"
                                        });
                                    }
                                }
                            })

                        }
                    })
            })
        </script>

        <!-- below script is to make it active or deactive -->
        <script>
            $(document).on('click', '#active', function () {
                var active = $(this).attr('content');
                var token = $("#token").val();
                var id = $("#id").val();
                var title = $(this).attr('data-content');
                swal({
                        title: " آیا در نظر دارید وضعیت سرویس را " + "(( " + title + " ))" + "  نمایید؟ ",
                        text: "",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "	#5cb85c",
                        cancelButtonText: "خیر",
                        confirmButtonText: "آری",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax
                            ({
                                cache: false,
                                url: "{{url('admin/enableOrDisableService')}}",
                                type: "post",
                                data: {'_token': token, 'active': active, 'id': id},
                                dataType: "JSON",
                                success: function (response) {
                                    if (response.code == 1) {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "success",
                                            confirmButtonText: "بستن"
                                        });
                                        setTimeout(function () {
                                            window.location.href = document.referrer;
                                        }, 3000);
                                    } else {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "warning",
                                            confirmButtonText: "بستن"
                                        });
                                    }

                                }, error: function (error) {
                                    console.log(error);
                                    swal({
                                        title: "",
                                        text: 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید',
                                        type: "warning",
                                        confirmButtonText: "بستن"
                                    });
                                }
                            })
                        }
                    })
            })

        </script>

@endsection