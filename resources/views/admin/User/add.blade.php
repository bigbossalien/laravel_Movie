 @extends('admin.master')
@section('title','Thêm Thành Viên')
@section('content')
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm Thành Viên
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
            <a href="{!! route('getUserList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
            <form method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <legend style="border: 1px solid #ccc;text-align: center;color: blue"><i class="fa fa-plus"> Thêm</i></legend>
                    <label for="username"><span class="required">*</span> Tên Hiển Thị</label>
                    <input type="text" id="username" required name="username" class="form-control" autofocus value="{!! old('username') !!}" />
                    <br>
                    <label for="hoten"><span class="required">*</span> Họ Tên</label>
                    <input type="text" id="hoten" required name="hoten" class="form-control" value="{!! old('hoten') !!}" />
                    <br>
                    <label for="email"><span class="required">*</span> Email</label>
                    <input type="email" name="email" required id="email" class="form-control" value="{!! old('email') !!}"/>
                    <br>
                    <label for="password"><span class="required">*</span> Mật Khẩu</label>
                    <input type="password" name="password" required id="password" class="form-control"/>
                    <br>
                    <label for="confirmPass"><span class="required">*</span> Xác Nhận Mật Khẩu</label>
                    <input type="password" name="confirmPass" required id="confirmPass" class="form-control" />
                    <br>
                    <label for="sex">Giới Tính</label>
                    <select name="sex" id="sex" class="form-control">
                        <option value="nam">Nam</option>
                        <option value="nữ">Nữ</option>
                    </select>
                    <br>
                    <label>Cấp Độ</label>
                    <div id="level" style="margin-top: 1%">
                        <input type="radio" id="level1" name="level" checked value="1"><label for="level1" style="margin-left: 1%;cursor: pointer;font-size: 12px;font-family: sans-serif ">Thành Viên</label>  
                        <input type="radio" id="level2" name="level" value="0"><label for="level2" style="margin-left: 1%;cursor: pointer;font-size: 12px;font-family: sans-serif ">Quản Trị</label>
                    </div>
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