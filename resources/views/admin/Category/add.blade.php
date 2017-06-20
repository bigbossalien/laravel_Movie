@extends('admin.master')
@section('title','Thêm Category')
@section('content')
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm Danh Mục
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
            <a href="{!! route('getCateList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
            <form method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <legend style="border: 1px solid #ccc;text-align: center;color: blue"><i class="fa fa-plus"> Thêm</i></legend>
                    <label for="name"><span class="required">*</span> Tên Danh Mục</label>
                    <input type="text" id="name" name="name" class="form-control" value="{!! old('name') !!}" />
                    <br>
                    <label for="parent">Thuộc Cấp</label>
                    <select name="parent" id="parent" class="form-control">
                        <option>ROOT</option>
                        <?php MenuMulti($dataCate,0,$str = "-",old('parent')) ?>
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