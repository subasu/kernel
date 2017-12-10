@extends('layouts.mainLayout')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">خانه</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">ورود / ثبت نام</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- page heading-->
            <h2 class="page-heading">
                <span class="page-heading-title2">ورود / ثبت نام</span>
            </h2>
            <!-- ../page heading-->
            <div class="page-content" dir="rtl">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box-authentication register-form">
                            <h3>ثبت نام</h3>
                            {{--<p>لطفا تلفن خود را برای ثبت نام وارد نمائید</p>--}}
                            {{--<label for="cellphone">نام</label>--}}
                            {{--<input id="cellphone" type="text" class="form-control">--}}
                            {{--<label for="cellphone">نام خانوادگی</label>--}}
                            {{--<input id="cellphone" type="text" class="form-control">--}}
                            {{--<label for="cellphone">موبایل</label>--}}
                            {{--<input id="cellphone" type="text" class="form-control">--}}
                            {{--<label for="cellphone">شماره تلفن</label>--}}
                            {{--<input id="cellphone" type="text" class="form-control">--}}
                            {{--<label for="cellphone">آدرس</label>--}}
                            {{--<input id="cellphone" type="text" class="form-control">--}}
                            {{--<label for="cellphone">کدپستی</label>--}}
                            {{--<input id="cellphone" type="text" class="form-control">--}}
                            {{--<button class="button"><i class="fa fa-user"></i> ثبت نام </button>--}}

                            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" value="user" name="frmtype">
                                <div class="form-group col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="name" class="col-md-3 control-label">نام</label>
                                </div>

                                <div class="form-group col-md-12{{ $errors->has('family') ? ' has-error' : '' }}">
                                    <div class="col-md-9">
                                        <input id="family" type="text" class="form-control" name="family"
                                               value="{{ old('family') }}" required autofocus>

                                        @if ($errors->has('family'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="family" class="col-md-3 control-label"> نام خانوادگی</label>
                                </div>

                                <div class="form-group col-md-12{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-md-9">
                                        <input id="email" class="form-control" name="email" value="{{ old('email') }}"
                                               required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="email" class="col-md-3 control-label">نام کاربری یا ایمیل</label>
                                </div>

                                <div class="form-group col-md-12{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required
                                               maxlength="20">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="password" class="col-md-3 control-label">پسورد</label>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control col-md-9"
                                               name="password_confirmation" placeholder="6 تا 20 کاراکتر"
                                               maxlength="20">
                                    </div>
                                    <label for="password-confirm" class="col-md-3 control-label">تکرار پسورد</label>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <select tabindex="" class="form-control align-right selectpicker required"
                                                name="capital"
                                                id="capital" data-style="g-select" data-width="100%">
                                            <option class="align-right" value="-1">لطفا استان مورد نظر خود را انتخاب
                                                نمایید.
                                            </option>
                                            @foreach($capital as $cap)
                                                <option class="align-right"
                                                        value="{{$cap->id}}">{{$cap->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="capital" class="col-md-3 control-label">استان</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <select tabindex="" class="form-control align-right selectpicker required"
                                                name="town" id="town"
                                                data-style="g-select" data-width="100%">
                                        </select>
                                    </div>
                                    <label for="town" class="col-md-3 control-label">شهــر</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <input type="text" pattern="^\d{11}$" required=" " tabindex="6"
                                               value="{{ old('telephone') }}" maxlength="11" name="telephone" id="telephone"
                                               class="form-control">
                                        @if ($errors->has('telephone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="grade" class="col-md-3 control-label">تلفن ثابت</label>
                                </div>


                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <input type="text" pattern="^\d{11}$" required=" " tabindex="7"
                                               value="{{ old('cellphone') }}" maxlength="11" name="cellphone" id="cellphone"
                                               class="form-control">
                                        @if ($errors->has('cellphone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="grade" class="col-md-3 control-label">تلفن همراه</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <input type="text" pattern="^\d{11}$" required=" " tabindex="7"
                                               value="{{ old('zipCode') }}" maxlength="11" name="zipCode" id="zipCode"
                                               class="form-control">
                                        @if ($errors->has('zipCode'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('zipCode') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="grade" class="col-md-3 control-label">کد پستی</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <input type="text"  required=" " tabindex="7"
                                               value="{{ old('birth_date') }}" maxlength="11" name="birth_date" id="birth_date"
                                               class="form-control">
                                        @if ($errors->has('birth_date'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="grade" class="col-md-3 control-label">تاریخ تولد</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-9">
                                        <textarea type="text" required=" " tabindex="7"
                                               value="{{ old('address') }}" maxlength="2000" name="address" id="address"
                                                  class="form-control address col-md-12"></textarea>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="grade" class="col-md-3 control-label">آدرس</label>
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                    <div class="col-md-9">
                                        {{--<img src="{{url('reload.jpg')}}" class="captcha-reload "--}}
                                             {{-->--}}
                                        <i class="fa fa-refresh fa-lg captcha-reload col-md-1" height="25" width="25"></i>
                                        <img class="captcha col-md-4" alt="captcha.png"
                                             style="width: 41%;margin-right: 1%;padding-right: 0px !important;padding-left: 0px;margin-left: 1%;"/>
                                        @if ($errors->has('captcha'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                        @endif
                                        <input id="captcha" class="form-control col-md-4" type="text"
                                               name="captcha" value="" required autofocus>
                                    </div>
                                    <label for="captcha" class="col-md-3 control-label"> کد امنیتی</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        {{--<button type="submit" class="btn btn-primary col-md-4"><i--}}
                                        {{--class="fa fa-user-plus"></i></button>--}}
                                        <button class="button"><i class="fa fa-user"></i> ثبت نام</button>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-authentication">
                            <h3>ورود</h3>
                            <label for="emmail_login">شماره تلفن</label>
                            <input id="emmail_login" type="text" class="form-control">
                            <label for="password_login">رمز عبور</label>
                            <input id="password_login" type="password" class="form-control">
                            <p class="forgot-pass"><a href="#">آیا رمز عبور خود را فراموش کرده اید؟</a></p>
                            <button class="button"><i class="fa fa-lock"></i> ورود</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{url('public/main/assets/lib/jquery/jquery-1.11.2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            var capital = $("#capital");
            $("#capital").on("change", function () {
                var cid = $(this).val();
                var token = $(this).data("token");
                $.ajax({
                    url: '{{url('town')}}' + '/' + cid,
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "id": cid,
                        "_method": 'get',
                        "_token": token
                    },
                    success: function (data) {
                        var item = $('#town');
                        item.empty();
                        $.each(data, function (index, value) {
                            item.append('<option value="' + value.title + '">' + value.title + '</option>');
                        });

                    },
                    error: function (response) {
                        console.log(response.valueOf(2));
                    }
                });
            });
            captcha();
            function captcha() {
                var token = $(this).data("token");
                $.ajax({
                    url: '{{url('captcha')}}',
                    type: 'get',
                    dataType: "JSON",
                    data: {
                        "_method": 'get',
                        "_token": token
                    },
                    success: function (data) {
                        $(".captcha").attr("src", data)
                    },
                    error: function (response) {
                        console.log(response.valueOf(2));
                    }
                });
            }

            $(".captcha").click(function () {
                captcha();
            });
            $(".captcha-reload").click(function () {
                captcha();
            });
        })

    </script>
@endsection
