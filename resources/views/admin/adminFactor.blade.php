<!DOCTYPE html>
<html>
<head>
    <link href="{{ URL::asset('public/dashboard/css/custom-forms.css')}}" rel="stylesheet">
    <title>نمایش و چاپ فاکتور</title>
</head>
<body>
<div style="padding:1% 2.5%">
    <h4 class="text-center">
        بسمه تعالی </h4>
    <h5 class="text-right" style="float: right;direction: rtl;"> فروشگاه :
    </h5>
    <h5 class="text-right" style="float: right;direction: rtl;">نام فروشگاه ما
    </h5>

    <h5 class="text-right" style="float: left;text-align: right;direction: rtl">  تاریخ و ساعت
    </h5>
    <h5 class="text-right" style="float: left;text-align: right;direction: rtl">زمان :
    </h5>
    <h5 class="text-right"></h5>
    <br>
    <br>
    <table class="formTable col-md-12 width100 border-right" dir="rtl">
        <thead>
        <tr class=" padding-formTable">
            <th class="col-md-1">R</th>
            <th class="col-md-1" colspan="3">عنوان محصول</th>
            <th class="col-md-4">توضیحات</th>
            <th class="col-md-1"> قیمت واحد (تومان)</th>
            <th class="col-md-1"> تعداد / مقدار </th>
            <th class="col-md-1"> واحد شمارش </th>
            <th class="col-md-1">جمع کل (تومان)</th>
            <th class="col-md-1">تخفیف محصول (درصد)</th>
            <th class="col-md-1">هزینه ی پست (تومان)</th>
        </tr>
        </thead>
        <?php $i = 1 ?>
        <tbody>
        @foreach($baskets->products as $basket)
            <tr>
                <td class="col-md-1">{{$i++}}</td>
                <td class="col-md-1" colspan="3">{{$basket->title}}</td>
                <td class="col-md-4">@if($basket->basketComment != null){{$basket->basketComment}}@endif @if($basket->basketComment == null) توضیحات ندارد @endif</td>
                <td class="col-md-1">{{number_format($basket->price)}}</td>
                <td class="col-md-1">{{$basket->count}}</td>
                <td class="col-md-1">{{$basket->unit_count}}</td>
                <td class="col-md-1">{{number_format($basket->sum)}}</td>
                <td class="col-md-1">@if($basket->discount_volume != null){{$basket->discount_volume}}@endif @if($basket->discount_volume == null) تخفیف ندارد @endif</td>
                <td class="col-md-1">{{number_format($basket->post_price)}}</td>
            </tr>
        @endforeach
        <tr>
            <td class="col-md-3 text-center" colspan="4" ><b>آدرس مشتری</b></td>
            <th class="col-md-7 text-center" colspan="10">{{$order->user_coordination}}</th>
        </tr>
        <tr>
            <td class="col-md-3 text-center" colspan="4" ><b>شماره تلفن همراه مشتری</b></td>
            <th class="col-md-7 text-center" colspan="10">{{$order->user_cellphone}}</th>
        </tr>
        <tr>
            <td class="col-md-3 text-center" colspan="4" ><b>توضیحات کلی سفارش</b></td>
            <th class="col-md-7 text-center" colspan="10">@if($order->comments != null){{$order->comments}} @endif @if($order->comments == null) سفارش توضیحات ندارد @endif</th>
        </tr>
        <tr>
            <td class="col-md-2" colspan="8" style="text-align: left"><b> جمع کل قیمت ها (تومان)</b></td>
            <th class="col-md-3" colspan="3">{{number_format($total)}}</th>
        </tr>
        <tr>
            <td class="col-md-2" colspan="8" style="text-align: left"><b> مجموع تخفیف ها (تومان)</b></td>
            <th class="col-md-3" colspan="3">{{number_format($basket->sumOfDiscount)}}</th>
        </tr>
        <tr>
            <td class="col-md-2" colspan="8" style="text-align: left"><b>مجموع هزینه های پست (تومان)</b></td>
            <th class="col-md-3" colspan="3">{{number_format($totalPostPrice)}}</th>
        </tr>
        <tr>
            <td class="col-md-2" colspan="8" style="text-align: left"><b>قیمت نهایی (تومان)</b></td>
            <th class="col-md-3" colspan="3">{{number_format($finalPrice)}}</th>
        </tr>
        </tbody>
    </table>
    <br/>
    <br/>
    <br/>
    {{--<div align="center" class="col-md-8">--}}
        {{--<button id="print" class="selfBtn" >چاپ فاکتور</button>--}}
    {{--</div>--}}
    {{--<form>--}}
        {{--<input type="button" value="Print Page" onClick="window.print()">--}}
    {{--</form>--}}
</div>
<script type="text/javascript" src="{{url('public/main/assets/lib/jquery/jquery-1.11.2.min.js')}}"></script>
{{--<script>--}}
    {{--$(document).on('click','#print',function(){--}}
        {{--$(this).css('display','none');--}}
        {{--window.print();--}}
    {{--})--}}
{{--</script>--}}
<script language='VBScript'>
Sub Print()
       OLECMDID_PRINT = 6
       OLECMDEXECOPT_DONTPROMPTUSER = 2
       OLECMDEXECOPT_PROMPTUSER = 1
       call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER,1)
End Sub
document.write "<object ID='WB' WIDTH=0 HEIGHT=0 CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>"
</script>
<script type="text/javascript">
    $(function(){
        window.self.print();
    })
</script>




{{--<script language="VBScript">--}}
{{--// THIS VB SCRIP REMOVES THE PRINT DIALOG BOX AND PRINTS TO YOUR DEFAULT PRINTER--}}
{{--Sub window_onunload()--}}
{{--On Error Resume Next--}}
{{--Set WB = nothing--}}
{{--On Error Goto 0--}}
{{--End Sub--}}

{{--Sub Print()--}}
{{--OLECMDID_PRINT = 6--}}
{{--OLECMDEXECOPT_DONTPROMPTUSER = 2--}}
{{--OLECMDEXECOPT_PROMPTUSER = 1--}}


{{--On Error Resume Next--}}

{{--If DA Then--}}
{{--call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER,1)--}}

{{--Else--}}
{{--call WB.IOleCommandTarget.Exec(OLECMDID_PRINT ,OLECMDEXECOPT_DONTPROMPTUSER,"","","")--}}

{{--End If--}}

{{--If Err.Number <> 0 Then--}}
{{--If DA Then--}}
{{--Alert("Nothing Printed :" & err.number & " : " & err.description)--}}
{{--Else--}}
{{--HandleError()--}}
{{--End if--}}
{{--End If--}}
{{--On Error Goto 0--}}
{{--End Sub--}}

{{--If DA Then--}}
{{--wbvers="8856F961-340A-11D0-A96B-00C04FD705A2"--}}
{{--Else--}}
{{--wbvers="EAB22AC3-30C1-11CF-A7EB-0000C05BAE0B"--}}
{{--End If--}}

{{--document.write "<object ID=""WB"" WIDTH=0 HEIGHT=0 CLASSID=""CLSID:"--}}
{{--document.write wbvers & """> </object>"--}}
{{--</script>--}}
</body>
</html>