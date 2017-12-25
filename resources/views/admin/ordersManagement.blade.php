@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> مدیریت سفارشات</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">ردیف</th>
                            <th style="text-align: center">نلفن خریدار</th>
                            <th style="text-align: center">مکان خریدار</th>
                            <th style="text-align: center"> تاریخ ثبت سفارش</th>
                            <th style="text-align: center">ساعت ثبت سفارش</th>
                            <th style="text-align: center">جمع کل</th>
                            <th style="text-align: center">نوع پرداخت</th>
                            <th style="text-align: center">کد تراکنش</th>
                            <th style="text-align: center;border-right: 1px solid #d6d6c2">نمایش جزئیات فاکتور</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        @foreach($data as $datum)

                            <tr class="unit">
                                <td style="font-size:18px;">{{++$i}}</td>
                                <td style="font-size:18px;">{{$datum->user_cellphone}}</td>
                                <td style="font-size:18px;">{{$datum->user_coordination}}</td>
                                <td style="font-size:18px;">{{$datum->persianDate}} </td>
                                <td style="font-size:18px;">{{$datum->time}}</td>
                                <td style="font-size:18px;">{{number_format($datum->factor_price)}}</td>
                                <td style="font-size:18px;"> با کارت</td>
                                <td style="font-size:18px;">{{$datum->transaction_code}}</td>
                                <td style="font-size:18px;"><a class="btn btn-dark" href="{{url('admin/adminShowFactor/'.$datum->basket_id)}}">مشاهده جزئیات فاکتور</a></td>
                            </tr>
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
