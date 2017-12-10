@extends('layouts.pageLayout')
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
                        <div class="box-authentication">
                            <h3>ثبت نام</h3>
                            {{--<p>لطفا تلفن خود را برای ثبت نام وارد نمائید</p>--}}
                            <label for="cellphone">نام</label>
                            <input id="cellphone" type="text" class="form-control">
                            <label for="cellphone">نام خانوادگی</label>
                            <input id="cellphone" type="text" class="form-control">
                            <label for="cellphone">موبایل</label>
                            <input id="cellphone" type="text" class="form-control">
                            <label for="cellphone">شماره تلفن</label>
                            <input id="cellphone" type="text" class="form-control">
                            <label for="cellphone">آدرس</label>
                            <input id="cellphone" type="text" class="form-control">
                            <label for="cellphone">کدپستی</label>
                            <input id="cellphone" type="text" class="form-control">
                            <button class="button"><i class="fa fa-user"></i> ثبت نام </button>

                            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                                  action="{{ URL::to('/register') }}">
                                {{ csrf_field() }}
                                <input type="hidden" value="user" name="frmtype">
                                <input type="hidden" value="0" name="visitprice">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="name" class="col-md-2 control-label">نام</label>
                                </div>

                                <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input id="family" type="text" class="form-control" name="family"
                                               value="{{ old('family') }}" required autofocus>

                                        @if ($errors->has('family'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="family" class="col-md-2 control-label"> نام خانوادگی</label>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input id="email" class="form-control" name="email" value="{{ old('email') }}"
                                               required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="email" class="col-md-2 control-label">نام کاربری یا ایمیل</label>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required
                                               maxlength="20">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="password" class="col-md-2 control-label">پسورد</label>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control col-md-6"
                                               name="password_confirmation" placeholder="6 تا 20 کاراکتر" maxlength="20">
                                    </div>
                                    <label for="password-confirm" class="col-md-2 control-label">تکرار پسورد</label>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <select tabindex="" class="align-right selectpicker required" name="capital"
                                                id="capital" data-style="g-select" data-width="100%">
                                            <option class="align-right" value="-1">لطفا استان مورد نظر خود را انتخاب
                                                نمایید.
                                            </option>
                                            @foreach($capital as $cap)
                                                <option class="align-right" value="{{$cap->id}}">{{$cap->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="capital" class="col-md-2 control-label">استان</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <select tabindex="" class="align-right selectpicker required" name="town" id="town"
                                                data-style="g-select" data-width="100%">

                                        </select>
                                    </div>
                                    <label for="town" class="col-md-2 control-label">شهــر</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <select tabindex="" name="grade"
                                                class="align-right selectpicker required input-wrap" data-style="g-select"
                                                data-width="100%">
                                            <option class="align-right" value="پروفسور">پروفسور</option>
                                            <option class="align-right" value="فوق دکتری">فوق دکتری</option>
                                            <option class="align-right" value="دکتری">دکتری</option>
                                            <option class="align-right" value="کارشناسی ارشد">کارشناسی ارشد</option>
                                            <option class="align-right" value="کارشناسی">کارشناسی</option>
                                            <option class="align-right" value="فوق دیپلم">فوق دیپلم</option>
                                            <option class="align-right" value="دیپلم"> دیپلم</option>
                                            <option class="align-right" value="زیر دیپلم">زیر دیپلم</option>
                                            <option class="align-right" value="سیکل">سیکل</option>
                                            <option class="align-right" value="ابندایی">ابتدایی</option>
                                            <option class="align-right" value="بی سواد">بی سواد</option>
                                        </select>
                                    </div>
                                    <label for="grade" class="col-md-2 control-label">مدرک تحصیلی</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input type="text" pattern="^\d{11}$" required=" " tabindex="6"
                                               value="{{ old('tel') }}" maxlength="11" name="tel" id="tel"
                                               class="form-control">
                                        @if ($errors->has('tel'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="grade" class="col-md-2 control-label">تلفن ثابت</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input type="text" pattern="^\d{11}$" required=" " tabindex="7"
                                               value="{{ old('mobile') }}" maxlength="11" name="mobile" id="mobile"
                                               class="form-control">
                                        @if ($errors->has('mobile'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="grade" class="col-md-2 control-label">تلفن همراه</label>
                                </div>
                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <div>
                                            <input type="radio" tabindex="" name="gender" value="مرد" required=""
                                                   class="genbtn">
                                            <label for="gender" class="">مرد</label>
                                            <input type="radio" tabindex="" name="gender" value="زن" required=""
                                                   class="genbtn">
                                            <label for="gender" class="">زن</label>
                                        </div>
                                    </div>
                                    <label for="gender" class="col-md-2 control-label">جنسیت</label>
                                </div>
                                <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input id="captcha" type="text" style="width: 49%;" name="captcha" value="" required
                                               autofocus>
                                        <img class="captcha" alt="captcha.png" style="width: 41%;" />
                                        <img src="{{url('public/reload.jpg')}}" class="captcha-reload" width="25" height="25">
                                        @if ($errors->has('captcha'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <label for="captcha" class="col-md-2 control-label"> کد امنیتی</label>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary col-md-4"><i
                                                    class="fa fa-user-plus"></i></button>
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
                            <button class="button"><i class="fa fa-lock"></i> ورود </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection