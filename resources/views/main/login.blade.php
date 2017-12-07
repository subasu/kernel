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
                            <p>لطفا تلفن خود را برای ثبت نام وارد نمائید</p>
                            <label for="emmail_register">شماره تلفن</label>
                            <input id="emmail_register" type="text" class="form-control">
                            <button class="button"><i class="fa fa-user"></i> ثبت نام </button>
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