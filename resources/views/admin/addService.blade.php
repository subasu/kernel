@extends('layouts.adminLayout')
@section('content')
    <style>
        input, label {
            font-size: 15px;
        }
    </style>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ایجاد کاربر
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
                <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" id="user-send-form" method="POST"
                              style="direction: rtl !important;">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select class="my col-md-7 col-xs-12"
                                            name="title"  style="font-family: FontAwesome;">
                                        @foreach($icons as $icon)
                                            <option data-icon="fa {{$icon->icon}}">{{$icon->icon}}</option>
                                        @endforeach
                                    </select>
                                    div>
                                    <label class="settinglabel">Icon Class</label>
                                    <input type="text" class="icon-class-input" value="fa fa-music" />
                                    <button type="button" class="btn btn-primary picker-button">Pick an Icon</button>
                                    <span class="demo-icon"></span>
                                </div>
                                <div>
                                    <label class="settinglabel">Icon Class</label>
                                    <input type="text" class="icon-class-input" value="fa fa-search" />
                                    <button type="button" class="btn btn-primary picker-button">Pick an Icon</button>
                                    <span class="demo-icon"></span>
                                </div>

                                <div id="iconPicker" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Icon Picker</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <ul class="icon-picker-list">
                                                        @foreach($icons as $item)
                                                        <li>
                                                            <a data-class="{{$item->icon}}" data-index="{{$item->icon}}">
                                                                <span class="{{$item->icon}}"></span>
                                                                <span class="name-class">{{$item->icon}}</span>
                                                            </a>
                                                        </li>
                                                            @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="change-icon" class="btn btn-success">
                                                    <span class="fa fa-check-circle-o"></span>
                                                    Use Selected Icon
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="title"> آیکن : <span
                                            class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder=""
                                           required="required" type="text">
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name"> عنوان : <span
                                            class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <textarea id="family" class="form-control col-md-7 col-xs-12" name="family"
                                              placeholder="" required="required" type="text"></textarea>
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="family"> توضیحات :
                                    <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>
@endsection