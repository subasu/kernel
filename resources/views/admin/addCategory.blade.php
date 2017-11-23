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
                        <form class="form-horizontal form-label-left" id="user-send-form" method="POST"
                              style="direction: rtl !important;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-4 col-xs-3 font-size-s" for="name">  <span
                                            class="required star" title="پر کردن این فیلد الزامی است">نکته:</span>شما حداکثر میتوانید تا سه سطح دسته بندی نمائید و سطح چهارم محصول شما خواهد بود.
                                </label>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-9">
                                    <select id="categories" class="form-control col-md-7 col-xs-12" name="categories">
                                        <option>دکتر</option>
                                        <option>مهندس</option>
                                        <option>آقای</option>
                                        <option>خانم</option>
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
                            <div class="item form-group">
                                <div class="col-md-1" style="margin-left: 6.333333%;margin-right: 2%;">
                                    <i class="glyphicon glyphicon-plus btn btn-success" title="افزودن زیر دسته ی جدید"></i>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-9">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder=""
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
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <button id="user-send" type="button" class="col-md-12 btn btn-primary">ثبت نهایی</button>
                                    <input type="hidden" name="unitId" id="unitId" value="0">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>


        {{--create user by AJAX and show result alert and redirect to usersList page --}}
        <script>
            $.ajax({
                cashe:false,
                url:"{{url('api/v1/test')}}",
                type:'get',
                success:function (response) {
                    var item=$("#categories");
                    item.empty();
                    $.each(response,function (key,value) {
                        item.append('<option>'+value+'</option>');
                    })
                }

            })

            $("#user-send").click(function () {
                var password = $('#password').val();
                var confirmPassword = $('#password-confirm').val();
                var formData = new FormData($('#user-send-form')[0]);
                    var formData = new FormData($('#user-send-form')[0]);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax
                    ({
                        cache: false,
                        url: "{{ url('admin/usersCreate') }}",
                        type: 'post',
                        //dataType: 'json',
                        contentType: false,
                        processData: false,
                        data: formData,
                        beforeSend: function () {
                            if (password !== confirmPassword) {
                                swal({
                                    title: "",
                                    text: 'رمزهای وارد شده با هم مطابقت ندارند',
                                    type: "warning",
                                    confirmButtonText: "بستن"
                                });
                                return false;
                            }
                        },
                        success: function (response) {
                            swal
                            ({
                                title: "",
                                text: response,
                                type: "info",
                                confirmButtonText: "بستن"
                            });
                            setInterval(function () {
                                window.location.href = '{{url('admin/usersManagement')}}';
                            }, 2500);
                        }, error: function (xhr) {
                            if (xhr.status === 422) {
                                var x = xhr.responseJSON;
                                var errorsHtml = '';
                                var count = 0;
                                $.each(x, function (key, value) {
                                    errorsHtml += value[0] + '\n'; //showing only the first error.
                                });
                                console.log(count)
                                swal({
                                    title: "",
                                    text: errorsHtml,
                                    type: "info",
                                    confirmButtonText: "بستن"
                                });
                            }

                            else if (xhr.status === 500) {
                                swal({
                                    title: "",
                                    text: "متاسفانه اطلاعات شما ثبت نشد، با پشتیبانی تماس حاصل فرمائید",
                                    type: "warning",
                                    confirmButtonText: "بستن"
                                });

                            }
                        }
                    });

                {{--$.ajax({--}}

                    {{--cache: false,--}}
                    {{--url: "{{URL::asset('admin/checkUnitSupervisor')}}",--}}
                    {{--type: 'post',--}}
                    {{--data: formData,--}}
                    {{--contentType: false,--}}
                    {{--processData: false,--}}
                    {{--//dataType: 'json',--}}
                    {{--beforeSend: function () {--}}
                        {{--if (password !== confirmPassword) {--}}
                            {{--swal({--}}
                                {{--title: "",--}}
                                {{--text: 'رمزهای وارد شده با هم مطابقت ندارند',--}}
                                {{--type: "warning",--}}
                                {{--confirmButtonText: "بستن"--}}
                            {{--});--}}
                            {{--return false;--}}
                        {{--}--}}
                    {{--},--}}
                    {{--success: function (response) {--}}
                        {{--swal({--}}
                                {{--title: "",--}}
                                {{--text: response,--}}
                                {{--type: "warning",--}}
                                {{--showCancelButton: true,--}}
                                {{--confirmButtonColor: "	#5cb85c",--}}
                                {{--cancelButtonText: "خیر ، منصرف شدم",--}}
                                {{--confirmButtonText: "بله ثبت شود",--}}
                                {{--closeOnConfirm: true,--}}
                                {{--closeOnCancel: true--}}
                            {{--}--}}
                            {{----}}
                        {{--)--}}
                    {{--},--}}
                    {{--error: function (xhr) {--}}
                        {{--if (xhr.status === 422) {--}}
                            {{--var x = xhr.responseJSON;--}}
                            {{--var errorsHtml = '';--}}
                            {{--var count = 0;--}}
                            {{--$.each(x, function (key, value) {--}}
                                {{--errorsHtml += value[0] + '\n'; //showing only the first error.--}}
                            {{--});--}}
                            {{--console.log(count)--}}
                            {{--swal({--}}
                                {{--title: "",--}}
                                {{--text: errorsHtml,--}}
                                {{--type: "info",--}}
                                {{--confirmButtonText: "بستن"--}}
                            {{--});--}}
                        {{--}--}}

                        {{--else if (xhr.status === 500) {--}}
                            {{--swal({--}}
                                {{--title: "",--}}
                                {{--text: "متاسفانه اطلاعات شما ثبت نشد، با پشتیبانی تماس حاصل فرمائید",--}}
                                {{--type: "warning",--}}
                                {{--confirmButtonText: "بستن"--}}
                            {{--});--}}

                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            });
        </script>
        <script>
            $(function () {
                $(':checkbox').change(function () {

                    if ($(this).val() == 1) {
                        $(this).val(0);
                    }
                    else {
                        $(this).val(1);
                    }
                });
            })

        </script>
@endsection
