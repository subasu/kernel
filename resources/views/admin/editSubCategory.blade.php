@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> مدیریت دسته بندی ها</h2>
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
                    <i class="fa fa-th-list"></i>                    افزودن دسته ی جدید                </a>
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">شناسه دسته</th>
                            <th style="text-align: center">عنوان دسته</th>
                            <th style="text-align: center">سطح دسته</th>
                            <th style="text-align: center">تصویر</th>
                            <th  style="text-align: center;border-right: 1px solid #d6d6c2;">عملیات</th>
                            <th  style="text-align: center;border-right: 1px solid #d6d6c2;">مشاهده زیر دسته</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($categoryInfo as $category)
                            <form id="editForm">
                                <tr class="unit">
                                    {{csrf_field()}}
                                    <td style="font-size:18px;@if($category->is_supervisor==1) background-color:#ffff80 @endif"><input class="form-control" disabled name="id"  value="{{$category->id}}"></td>
                                    <td><input class="form-control" name="title" value="{{$category->title}}"></td>
                                    <td><input class="form-control" value="{{$category->depth}}" disabled="disabled" name="depth"></td>
                                    @if($category->image_src == null)
                                        <td><strong>تصویر ندارد</strong></td>
                                    @endif
                                    @if($category->image_src != null)
                                        <td>{{$category->image_src}} </td>
                                    @endif
                                    <td><button id="edit" class="btn btn-success">ویرایش</button></td>
                                    @if($category->depth > 0)
                                        <td><a  class="btn btn-info" style="width : 82%; text-align: center;" href="{{url('editSubCategory/'.$category->id)}}">مشاهده زیر دسته</a></td>
                                    @endif
                                    @if($category->depth == 0)
                                        <td><a  class="btn btn-danger " style="width : 82%;"  >فاقد زیر دسته</a></td>
                                    @endif
                                </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--edit user's status by user-id --}}

        <script>
            $(document).on('click','#edit',function () {
                alert('hello');
            })
        </script>


@endsection
