@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> مدیریت پیک ها</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


                <a href="{{url('admin/addProduct')}}" id="user-send" type="button" class="col-md-2 btn btn-primary" style="font-weight: bold;">
                    <i class="fa fa-user-plus"></i>                    افزودن پیک جدید                </a>
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">ردیف</th>
                            <th style="text-align: center">نام ونام خانوادگی</th>
                            <th style="text-align: center">تلفن</th>
                            <th style="text-align: center">وضعیت</th>
                            <th style="text-align: center;border-right: 1px solid #d6d6c2">ویرایش</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        @foreach($data as $val)
                            {{--                            @if($val->unit_id!=3)--}}
                            <tr class="unit">
                                <td style="font-size:18px;@if($val->is_supervisor==1) background-color:#ffff80 @endif">{{++$i}}</td>
                                <td>{{$val->title. ' '.$val->name.' '.$val->family}}</td>
                                <td>@if($val->username!=null){{$val->username}} @endif</td>
                                <td>{{$val->cellphone}} </td>
                                <td>{{$val->unit->title}}</td>
                                <td>{{$val->user->title.' '.$val->user->name .' '.$val->user->family }}</td>
                                <td>
                                    @if($val->unit_id!=3)
                                        @if($val->active === 0)
                                            <button  id="{{$val->id}}" value="{{$val->active}}" class="btn btn-danger">غیرفعال</button>
                                        @else
                                            <button  id="{{$val->id}}" value="{{$val->active}}" class="btn btn-success">فعال</button>
                                        @endif
                                    @endif
                                </td>
                                <td id="{{$val->id}}">
                                    <a class="btn btn-primary" href="{{url('systemManager/access_level/'.$val->id)}}">تعیین سطح دسترسی</a>
                                </td>
                                <td style="border-right: 1px solid #d6d6c2" id="{{$val->id}}">
                                    <a class="btn btn-info" href="{{url('admin/usersUpdate'.'/'.$val->id)}}">ویرایش</a>
                                </td>
                            </tr>
                            {{--@endif--}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--edit user's status by user-id --}}

        <script>
            $(document).on('click','.btn-success',function () {
                var userId = $(this).attr('id');
                var status = $(this).val();
                var token  = $('#token').val();
                var button = $(this);
                swal({
                        title: "",
                        text: "آیا از غیرفعال کردن دسته بندی اطمینان دارید؟",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "	#5cb85c",
                        cancelButtonText: "خیر ، منصرف شدم",
                        confirmButtonText: "بله غیرفعال شود",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function () {
                        $.ajax
                        ({
                            url     : "{{Url('admin/changeUserStatus')}}/{{1}}",
                            type    : 'post',
                            data    : {'userId':userId,'_token':token},
                            context :  button,
                            //dataType:'json',
                            success : function (response)
                            {
                                $(button).text('غیر فعال');
                                $(button).toggleClass('btn-success btn-danger');
                                swal({
                                    title: "",
                                    text: response,
                                    type: "info",
                                    confirmButtonText: "بستن"
                                });
                            },
                            error : function(error)
                            {
                                console.log(error);
                                swal({
                                    title: "",
                                    text: "خطایی رخ داده است ، تماس با بخش پشتیبانی",
                                    type: "warning",
                                    confirmButtonText: "بستن"
                                });
                            }
                        });
                    });
            })
        </script>
        <script>
            $(document).on('click','.btn-danger',function () {
                var userId = $(this).attr('id');
                var status = $(this).val();
                var token = $('#token').val();
                var button = $(this);
                swal({
                        title: "",
                        text: "آیا از فعال کردن دسته بندی اطمینان دارید؟",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "	#5cb85c",
                        cancelButtonText: "خیر ، منصرف شدم",
                        confirmButtonText: "بله فعال شود",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function () {
                        $.ajax
                        ({
                            url: "{{Url('admin/changeUserStatus')}}/{{2}}",
                            type: 'post',
                            data: {'userId': userId, '_token': token},
                            context: button,
                            //dataType:'json',
                            success: function (response) {
                                $(button).text('فعال');
                                $(button).toggleClass('btn-success btn-danger');
                                swal({
                                    title: "",
                                    text: response,
                                    type: "info",
                                    confirmButtonText: "بستن"
                                });
                            },
                            error: function (error) {
                                console.log(error);
                                swal({
                                    title: "",
                                    text: "خطایی رخ داده است ، تماس با بخش پشتیبانی",
                                    type: "warning",
                                    confirmButtonText: "بستن"
                                });
                            }
                        });
                    }
                );//end swal
            });
        </script>

        @endsection
