@extends('layouts.adminLayout')
@section('content')



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" dir="rtl">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ویرایش/اضافه کردن تصویر</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>

        </div>
    </div>


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


                {{--<a href="{{url('admin/addProduct')}}" id="user-send" type="button" class="col-md-2 btn btn-primary" style="font-weight: bold;">--}}
                    {{--<i class="fa fa-th-list"></i>                    افزودن دسته ی جدید                </a>--}}
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">ردیف</th>
                            <th style="text-align: center">عنوان دسته</th>
                            <th style="text-align: center;">سطح دسته</th>
                            <th style="text-align: center">عملیات مربوط به تصویر</th>
                            <th style="text-align: center">ویرایش</th>
                            <th  style="text-align: center;border-right: 1px solid #d6d6c2;">مشاهده زیر دسته</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        @foreach($categoryInfo as $category)
                            <form id="editForm">
                                <tr class="unit">
                                    {{csrf_field()}}
                                    <td>{{++$i}}</td>
                                    <td><input class="form-control" name="title" value="{{$category->title}}"></td>
                                    <td>{{$category->depth}}</td>
                                    <td><strong><a class="btn btn-danger" id="editPicture" >مشاهده و ویرایش تصویر</a></strong></td>
                                    <td><button id="edit" class="btn btn-success">ویرایش</button></td>
                                    <td><a  class="btn btn-info" href="{{url('editSubCategory/'.$category->id)}}">مشاهده زیر دسته</a></td>
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

        <!-- below script is to handle bootstrap -->
        <script>
            $(document).on('click','#editPicture',function () {
                $('#myModal').modal('show');
            })
        </script>
@endsection
