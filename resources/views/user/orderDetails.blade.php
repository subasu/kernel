@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>جزئیات  سفارش</h2>

                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>

                    <div class="clearfix"></div>
                </div>


                {{--<div style="">--}}
                {{--<a href="{{url('admin/addProduct')}}" id="user-send" type="button" class="col-md-2 btn btn-info" style=" font-weight: bold; margin-left: 39%;">افزودن محصول جدید</a>--}}
                {{--</div>--}}
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">ردیف</th>
                            <th style="text-align: center">عنوان محصول</th>
                            <th style="text-align: center">قیمت محصول(تومان)</th>
                            <th style="text-align: center">هزینه پست(تومان)</th>
                            <th style="text-align: center">حجم تخفیف کلی(درصد)</th>
                            <th style="text-align: center">حجم تخفیف تحویل</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php $i=0 ?>
                        @foreach($baskets->products as $basket)
                            <tr class="unit">
                                <td style="font-size: 120%"> {{++$i}}</td>
                                <td style="font-size: 120%">{{$basket->title}}</td>
                                <td style="font-size: 120%">{{number_format($basket->product_price)}}</td>
                                <td style="font-size: 120%">{{number_format($basket->post_price)}}</td>
                                <td style="font-size: 120%">{{$basket->discount_volume}}</td>
                                <td style="font-size: 120%">{{$basket->delivery_volume}}</td>


                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="10" ><strong><a style="font-size: 120%" class="btn btn-dark col-md-4 col-md-offset-4" href="{{url('user/userFactor/'.$basket->basket_id)}}">چاپ فاکتور</a></strong></td>
                            </tr>
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
                        text: "آیا از غیرفعال کردن کاربر اطمینان دارید؟",
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
                        text: "آیا از فعال کردن کاربر اطمینان دارید؟",
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
