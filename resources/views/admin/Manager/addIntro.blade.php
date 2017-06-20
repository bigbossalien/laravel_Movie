@extends('admin.master')
@section('title','Quản Lý Footer')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Giới Thiệu Website
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-plus-square"></i> Forms
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-3" style="margin: 2% 0%">
            <a href="{!! route('getList') !!}"><i class="fa fa-plus"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
            <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <legend style="border: 1px solid #ccc;text-align: center;color: blue"><i class="fa fa-plus"> Thêm</i></legend>
                    <label><span class="required">*</span> Giới Thiệu Website</label>
                    <textarea name="gioithieu" id="content"></textarea>
                    <br>
                    <label><span class="required">*</span> Chính Sách Quảng Cáo</label>
                    <textarea name="lhqc"></textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('lhqc',{
                            language:'vi',
                            filebrowserImageBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Images') }}",
                            filebrowserFlashBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Flash') }}",
                            filebrowserImageUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connctor/php/connector.php?command=QuickUpload&type=Images') }}",
                            filebrowserFlashUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}",
                        });
                    </script>
                    <br>
                    <label><span class="required">*</span> Các Điều Khoản Sử Dụng</label>
                    <textarea name="dksd"></textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('dksd',{
                            language:'vi',
                            filebrowserImageBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Images') }}",
                            filebrowserFlashBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Flash') }}",
                            filebrowserImageUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connctor/php/connector.php?command=QuickUpload&type=Images') }}",
                            filebrowserFlashUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}",
                        });
                    </script>
                    <br>
                    <label><span class="required">*</span> Chính Sách Riêng Tư</label>
                    <textarea name="csrt"></textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('csrt',{
                            language:'vi',
                            filebrowserImageBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Images') }}",
                            filebrowserFlashBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Flash') }}",
                            filebrowserImageUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connctor/php/connector.php?command=QuickUpload&type=Images') }}",
                            filebrowserFlashUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}",
                        });
                    </script>
                    <br>
                    <label><span class="required">*</span> Chính Sách Bản Quyền</label>
                    <textarea name="banquyen"></textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('banquyen',{
                            language:'vi',
                            filebrowserImageBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Images') }}",
                            filebrowserFlashBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Flash') }}",
                            filebrowserImageUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connctor/php/connector.php?command=QuickUpload&type=Images') }}",
                            filebrowserFlashUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}",
                        });
                    </script>
                    <br>
                    <label><span class="required">*</span> Fanpage</label>
                    <input type="url" name="facebook" class="form-control" />
                    <br>
                    <label>Google +</label>
                    <input type="url" name="google" class="form-control" />
                </fieldset>    
                <hr>
                <input type="submit" value="Create" name="create" class="btn btn-default" />       
                <hr>     
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection