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
        .myAlertColor{
            background-color: #28a745!important
        }
    </style>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ثبت / ویرایش درباره ی ما</h2>
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
                        <form  class="form-horizontal form-label-left" id="unitForm"  method="POST" style="direction: rtl !important;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <a id="addInput" class="glyphicon glyphicon-plus btn btn-success" data-toggle="" title=" افزودن فیلد" ></a>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <a id="removeInput" class="glyphicon glyphicon-remove btn btn-danger" data-toggle="" title="حذف فیلد" ></a>
                                    <textarea id="editor"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-12" style="margin-top: 2%;">
                                    <button id="reg" type="button" class="col-md-9 btn btn-primary">ثبت نهایی</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>

@endsection