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
        <div class="show_chi_tiet">
            <div class="col-md-4 col-sm-4 col-xs-4" style="border-right: 1px solid #f2f2f2;border-radius: 5px">
                <p>Username</p>
                <p>Email</p>
                <p>Ngày Sinh</p>
                <p>Giới Tính</p>
                <p>Cấp Độ</p>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                <?php ListUserDetail($dataUser) ?>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-3" style="margin: 2% 0%">
            <a href="{!! route('getUserAdd') !!}"><i class="fa fa-plus"></i> Thêm Mới</a>
            <hr>
            <a href="{!! route('getUserList') !!}"><i class="fa fa-list"></i> Danh Sách</a>
            <hr>
            <p class="chi_tiet" style="cursor: pointer"><i class="fa fa-eye"></i> Chi Tiết</p>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
			<form method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset style="border-radius: 5px">
                    <legend style="border: 1px solid #ccc;text-align: center;color: green"><i class="fa fa-edit"> Sửa</i></legend>
                    <hr>
                    <br>
                    @if(Auth::user() ->id == $data['id'])
                        <label for="password"><span class="required">*</span> Mật Khẩu</label>
                        <input type="password" required name="password" id="txtPass" class="form-control" autofocus />
                        <br>
                        <label for="confirmPass"><span class="required">*</span> Xác Nhận Mật Khẩu</label>
                        <input type="password" required name="confirmPass" id="txtConfirmPass" class="form-control" />
                        <br>
                        <label for="birthday">Ngày Tháng Năm Sinh</label>
                        <input type="date" id="birthday" name="birthday" placeholder="mm/dd/yyyy" class="form-control" />
                        <br>
                        <label for="sex">Giới Tính</label>
                        <select name="sex" class="form-control">
                            <option value="nam">Nam</option>
                            <option value="nu">Nữ</option>
                        </select>
                    @endif
                        
                    @if(Auth::user() ->id != $data['id'])
                        <label for="level">Cấp Độ</label>
                        <select name="level" id="level" class="form-control">
                            <option value="1"
                                @if($data["level"] == 1)
                                    selected 
                                @endif
                            >Thành Viên</option>
                            <option value="0"
                                @if($data["level"] == 0)
                                    selected
                                @endif
                            >Quản Trị</option>
                        </select>
                    @endif
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" value="Edit" id="btnSubmit" name="create" class="btn btn-default" />
                <hr>            
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
<style type="text/css">
    .detail_member{
        border:1px solid #ccc;
        width: 100%;
        height: auto;
    }
    .detail_member tr{
        height: 30px;
        border: 1px solid #ccc;
    }
    .detail_member td{
        border: 1px solid #ccc;
        width: 50%;
        text-align: center;
    }
</style>
@endsection