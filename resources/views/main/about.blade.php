@extends('layouts.mainLayout')
@section('content')
    <!-- end header -->
    <!-- page wapper-->
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="{{url('/')}}" title="Return to Home">صفحه ی اصلی</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">درباره ی ما</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <div class="center_column col-xs-12 col-sm-10 col-sm-offset-1" id="center_column">
                    <!-- page heading-->
                    <h2 class="page-heading">
                        <span class="page-heading-title2">درباره ی ما</span>
                    </h2>
                    <!-- Content page -->
                    <div class="content-text clearfix">
                         {!! $aboutUs !!}
                    </div>
                    <!-- ./Content page -->
                </div>
            </div>
            <!-- ./row-->
        </div>
    </div>
    <!-- ./page wapper-->
@endsection