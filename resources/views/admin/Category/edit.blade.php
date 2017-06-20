@extends('admin.master')
@section('title','Sửa Category')
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
            <a href="{!! route('getCateAdd') !!}"><i class="fa fa-plus"></i> Thêm Mới</a>
            <hr>
            <a href="{!! route('getCateList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
			<form method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset style="border-radius: 5px">
                    <legend style="border: 1px solid #ccc;text-align: center;color: green"><i class="fa fa-edit"> Sửa</i></legend>
                    <label for="name"><span class="required">*</span> Tên Danh Mục Mới</label>
                    <input type="text" id="name" name="name" class="form-control" value="{!! old('name') !!}" />
                    <br>
                    <label for="parent">Tên Danh Mục Cũ</label>
                    <select name="parent" id="parent" class="form-control">
                        <?php MenuMulti($data,0,$str = " -",$parent['id']) ?>
                    </select>
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" value="Edit" name="create" class="btn btn-default" />
                <hr>            
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection