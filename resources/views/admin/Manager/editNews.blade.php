@extends('admin.master')
@section('title','Sửa Tin Tức')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa Tin Tức
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
        	<a href="{!! route('getNewsAdd') !!}"><i class="fa fa-plus"></i> Thêm Mới</a>
            <hr>
            <a href="{!! route('getNewsList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
            <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @foreach($data as $item)
                <fieldset>
                    <legend style="border: 1px solid #ccc;text-align: center;color: blue"><i class="fa fa-plus"> Thêm</i></legend>
                    <label><span class="required">*</span> Tiêu Đề</label>
                    <input type="text" name="title" required id="title" class="form-control" value="{!! $item['title'] !!}" />
                    <br>
                    <label for="intro"><span class="required">*</span> Giới Thiệu</label>
                    <textarea name="intro" cols="50" required rows="10" class="form-control">{!! $item['intro'] !!}</textarea>
                    <br>
                    <label for="content"><span class="required">*</span> Nội Dung</label>
                    <textarea required name="content" id="content">{!! $item['content'] !!}</textarea>
                    <br>
                    <label>Ảnh Cũ</label>
                    <img class="anhhientai" src="{!! url('Image/News/'.$item['image']) !!}" alt=""/>
                    <input type="hidden" name="anhhientai" value="{!! $item['image'] !!}" />
                    <br>
                    <label for="sourceImg" id="labelImg">Ảnh Bìa</label>
                    <span class="requiredImg">Ảnh phải có định dạng : png,jpg,gif,jpeg</span>
                    <input type="file" id="sourceImg" name="sourceImg" accept=".png,.jpg,.gif,.jpeg" />
                    <br>
                    <label for="status">Xuất Tin</label>
                    <select name="status" class="form-control">
                    @if($item['status'] == 0)
                    	<option value="0" selected>Có</option>
                    	<option value="1">Không</option>
                    @else
                    	<option value="0">Có</option>
                    	<option value="1" selected>Không</option>
                    @endif
                    </select>
                </fieldset>  
            @endforeach  
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