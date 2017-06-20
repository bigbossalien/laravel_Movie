@extends('admin.master')
@section('title','Thêm tin tức')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm Tin Tức
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
            <a href="{!! route('getNewsList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
            <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <legend style="border: 1px solid #ccc;text-align: center;color: blue"><i class="fa fa-plus"> Thêm</i></legend>
                    <label><span class="required">*</span> Tiêu Đề</label>
                    <input type="text" name="title" required id="title" class="form-control" value="{!! old('title') !!}" />
                    <br>
                    <label for="intro"><span class="required">*</span> Giới Thiệu</label>
                    <textarea name="intro" cols="50" required rows="10" class="form-control"></textarea>
                    <br>
                    <label for="content"><span class="required">*</span> Nội Dung</label>
                    <textarea required name="content" id="content"></textarea> 
                    <br>
                    <label for="sourceImg" id="labelImg"><span class="required">*</span> Ảnh Bìa</label>
                    <span class="requiredImg">Ảnh phải có định dạng : png,jpg,gif,jpeg</span>
                    <input type="file" id="sourceImg" name="sourceImg" accept=".png,.jpg,.gif,.jpeg" />
                    <br>
                    <label for="status">Xuất Tin</label>
                    <select name="status" class="form-control">
                    	<option value="0">Có</option>
                    	<option value="1">Không</option>
                    </select>
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" value="Create" name="create" class="btn btn-default" />       
                <hr>     
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection