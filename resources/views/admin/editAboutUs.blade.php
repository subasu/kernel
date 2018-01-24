@extends('layouts.adminLayout')
@section('content')
    <style>
        input, label {
            font-size: 15px;
        }
    </style>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-12 col-sm-6 col-xs-12 ">
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ویرایش درباره ی ما</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        @if(count($about))
                            <div class="x_content">
                                <div id="alerts"></div>
                                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i
                                                    class="fa icon-font"></i><b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i
                                                    class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a data-edit="fontSize 5">
                                                    <p style="font-size:17px">خیلی بزرگ</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-edit="fontSize 3">
                                                    <p style="font-size:14px">عادی</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-edit="fontSize 1">
                                                    <p style="font-size:11px">کوچک</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i
                                                    class="icon-bold"></i></a>
                                        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i
                                                    class="icon-italic"></i></a>
                                        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i
                                                    class="icon-strikethrough"></i></a>
                                        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i
                                                    class="icon-underline"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i
                                                    class="icon-list-ul"></i></a>
                                        <a class="btn" data-edit="insertorderedlist" title="Number list"><i
                                                    class="icon-list-ol"></i></a>
                                        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i
                                                    class="icon-indent-left"></i></a>
                                        <a class="btn" data-edit="indent" title="Indent (Tab)"><i
                                                    class="icon-indent-right"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i
                                                    class="icon-align-left"></i></a>
                                        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i
                                                    class="icon-align-center"></i></a>
                                        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i
                                                    class="icon-align-right"></i></a>
                                        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i
                                                    class="icon-align-justify"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i
                                                    class="icon-link"></i></a>
                                        <div class="dropdown-menu input-append">
                                            <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                            <button class="btn" type="button">Add</button>
                                        </div>
                                        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i
                                                    class="icon-cut"></i></a>

                                    </div>

                                    <div class="btn-group">
                                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i
                                                    class="icon-picture"></i></a>
                                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn"
                                               data-edit="insertImage"/>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i
                                                    class="icon-undo"></i></a>
                                        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i
                                                    class="icon-repeat"></i></a>
                                    </div>
                                </div>
                                <div id="editor" aboutId="{{$about->id}}">
                                    {!!$about->description !!}
                                </div>
                                <textarea name="descr" id="descr" style="display:none;"></textarea>
                                <br/>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button id="send1" type="button" class="col-md-9 btn btn-primary">ثبت نهایی
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="x_content">
                                <a href="{{url('admin/addAboutUs')}}" class="col-md-offset-4 col-md-2 btn btn-primary "><i
                                            class="fa fa-plus"></i>افزودن درباره ی ما </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12"></div>
    </div>
    <script>
        $(document).ready(function () {
            $("#send1").click(function () {
                var editorText = $("#editor").html();
                var id = $("#editor").attr('aboutId');
                console.log(editorText);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('admin/editAboutUsPost')}}",
                    data: {'description': editorText, 'id': id},
                    dataType: "json",
                    method: "post",
                    success: function (response) {
                        swal({
                            title: "",
                            text: response,
                            type: "info"
                        });
                    }, error: function (response) {
                        swal({
                            title: "",
                            text: response,
                            type: "warning"
                        });
                    }
                });
            });
        });
    </script>
@endsection