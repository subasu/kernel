@extends('layouts.userLayout')
@section('content')


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" dir="rtl">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">توضیحات کلی سفارش</h4>
                </div>
                <div class="modal-body">
                    <form id="pictureForm" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if($comments != null)
                            <textarea class="form-control" disabled="">{{$comments}}</textarea>
                        @endif
                        @if($comments == null)
                            <textarea class="form-control" disabled="">توضیحاتی برای این سفارش ثبت نشده است</textarea>
                        @endif
                    </form>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-dark col-md-8 col-md-offset-2" data-dismiss="modal">بستن</button>
                </div>
            </div>

        </div>
    </div>

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
                            <th style="text-align: center">R</th>
                            <th style="text-align: center">عنوان محصول</th>
                            <th style="text-align: center">توضیحات  سبد خرید</th>
                            <th style="text-align: center">قیمت محصول(تومان)</th>
                            <th style="text-align: center">تعداد/مقدار</th>
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
                                @if($basket->basketComment == null)
                                    <td><textarea class="form-control" disabled>توضیحات ندارد</textarea></td>
                                @endif
                                @if($basket->basketComment != null)
                                    <td style="font-size: 120%"><textarea class="form-control" disabled>{{$basket->basketComment}}</textarea></td>
                                @endif
                                <td style="font-size: 120%">{{number_format($basket->product_price)}}</td>
                                <td style="font-size: 120%">{{number_format($basket->basketCount)}}</td>
                                @if($basket->post_price == null)
                                    <td><button class="btn btn-default" style="font-size: 120%;">فاقد هزینه پست</button></td>
                                @endif
                                @if($basket->post_price != null)
                                    <td style="font-size: 120%">{{number_format($basket->post_price)}}</td>
                                @endif
                                @if($basket->discount_volume == null)
                                    <td><button class="btn btn-default" style="font-size: 120%;">تخفیف ندارد</button></td>
                                @endif
                                @if($basket->discount_volume != null)
                                    <td style="font-size: 120%">{{$basket->discount_volume}}</td>
                                @endif
                                @if($basket->delivery_volume == null)
                                    <td><button class="btn btn-default" style="font-size: 120%;">فاقد تخفیف تحویل</button></td>
                                @endif
                                @if($basket->delivery_volume != null)
                                    <td style="font-size: 120%">{{$basket->delivery_volume}}</td>
                                @endif
                                <tr>


                            </tr>
                        @endforeach
                            <tr>
                                <td  colspan="5"><strong><a style=" font-size: 120%" class="btn btn-dark col-md-5  col-md-offset-3" href="{{url('user/userShowFactor/'.$basket->basket_id)}}">چاپ فاکتور</a></strong></td>
                                <td  colspan="5"><strong><a style="font-size: 120%" class="btn btn-info col-md-7  col-md-offset-7" id="comments">مشاهده توضیحات سفارش</a></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <script>
            $(document).on('click','#comments',function(){
                $('#myModal').modal('show');
            })
        </script>

@endsection
