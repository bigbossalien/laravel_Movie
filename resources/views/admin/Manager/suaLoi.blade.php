@extends('admin.master')
@section('title','Update Errors')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Chi Tiết Lỗi
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
            <a href="{!! route('getNewsAdd') !!}"><i class="fa fa-plus"></i> Danh Sách</a>
        </div>
        <div class="col-md-9">
            @include('admin.Errors.flash')
			<form method="POST" role="form">
				<legend>Update Errors</legend>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
					<?php 
						foreach ($data as $item) {
							if($item['status']==1){
								echo "<option value='1' selected>Chưa Phản Hồi</option>
									  <option value='0'>Đã Phản Hồi</option>";
							}else{
								echo "<option value='1'>Chưa Phản Hồi</option>
									  <option value='0' selected>Đã Phản Hồi</option>";
							}
						}
					 ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection