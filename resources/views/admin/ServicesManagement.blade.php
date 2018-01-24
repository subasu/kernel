@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> مدیریت واحدهای شمارش و زیر واحد ها</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


                <a href="{{url('admin/addService')}}" id="user-send" type="button" class="col-md-3 col-md-offset-4 btn btn-info" style="font-weight: bold;">
                                        افزودن واحد شمارش جدید                </a>
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr class="table-head">
                            <th >ردیف</th>
                            <th> آیکن </th>
                            <th> عنوان </th>
                            <th>توضیحات</th>
                            <th>وضعیت</th>
                            <th style="border-right: 1px solid #d6d6c2">ویرایش</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        @foreach($services as $datum)
                            <tr class="unit" style="font-size: 120%;">
                                <td >{{++$i}}</td>
                                <td><i class="glyphicon {{$datum->icon}} fa-2x"></i></td>
                                <td>{{$datum->title}}</td>
                                <td>{!!  $datum->description!!}</td>
                                @if($datum->active == 1)
                                    <td class="text-success fa-1x">فعال</td>
                                @endif
                                @if($datum->active == 0)
                                    <td style="color:red; font-size : 150%;">غیر فعال</td>
                                @endif
                                <td><a class="btn btn-warning col-md-8 col-md-offset-2"  href="{{url('admin/editService')}}/{{$datum->id}}">ویرایش</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        @endsection
