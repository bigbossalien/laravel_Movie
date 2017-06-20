@extends('admin.master')
@section('title','Chi Tiết Lỗi')
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
        <div class="col-md-2" style="margin: 2% 0%">
            <a href="{!! route('getNewsAdd') !!}"><i class="fa fa-plus"></i> Danh Sách</a>
        </div>
        <div class="col-md-10">
            @include('admin.Errors.flash')
			<h4>Họ Và Tên</h4>
			<?php foreach ($data as $item) {
				echo $item['hoten'];
			} ?>
			<h4>Email</h4>
			<?php foreach ($data as $item) {
				echo $item['email'];
			} ?>
			<h4>Lý Do</h4>
			<?php foreach ($data as $item) {
				echo $item['lydo'];
			} ?>
			<h4>Trạng Thái</h4>
			<?php foreach ($data as $item) {
				if ($item['status']==1) {
				    echo "Chưa Xử Lý";
				}else{
					echo "Đã Xử Lý";
				}
			} ?>
			<hr>
        </div>
    </div>
    <!-- /.row -->
</div>
<style type="text/css">
	h4{color: green}
</style>
@endsection