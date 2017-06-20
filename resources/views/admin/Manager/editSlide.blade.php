@extends('admin.master')
@section('title','Sửa Slide')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa Category
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> Forms
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-3" style="margin: 2% 0%">
            <a href="{!! route('getAddSlide') !!}"><i class="fa fa-plus"></i> Thêm Mới</a>
            <hr>
            <a href="{!! route('getSlideList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
			<form method="POST" enctype="multipart/form-data" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset style="border-radius: 5px">
                    <legend style="border: 1px solid #ccc;text-align: center;color: green"><i class="fa fa-edit"> Sửa</i></legend>
                    	@foreach($data as $item)
                        <label for="title"><span class="required">*</span> Tiêu Đề</label>
                        <input type="text" id="title" name="title" required class="form-control" value="{!! $item['title'] !!}" />
                        <br>
                        <label>Ảnh Slide Cũ</label><br>
                        <img src="{!! url('Image/Slide/'.$item['image']) !!}" id="anhmh" style="width:100px;height: 100px;" />
                        <input type="hidden" name="hinhhientai" value="{!! $item['image'] !!}">
                        <hr>
                        <label for="sourceImg">Thay Ảnh</label>
                        <span class="requiredImg">Ảnh phải có định dạng : png,jpg,gif,jpeg</span>
                        <input type="file" id="sourceImg" name="sourceImg" accept=".png,.jpg,.gif,.jpeg" />
                        <hr>
                        @endforeach
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" value="Edit" name="edit" class="btn btn-default" />
                <hr>            
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection