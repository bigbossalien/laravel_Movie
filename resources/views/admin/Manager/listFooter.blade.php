@extends('admin.master')
@section('title','Danh sách footer')
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
            <a href="{!! route('getNewsAdd') !!}"><i class="fa fa-plus"></i> Thêm Mới</a>
        </div>
        <div class="col-md-9">
            @include('admin.Errors.flash')
			<h4>--- Giới thiệu Website</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['gioithieu'];
				}
			?>
			<h4>--- Chính Sách Quảng Cáo</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['lhqc'];
				}
			?>
			<h4>--- Điều Khoản Sử Dụng</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['dksd'];
				}
			?>
			<h4>--- Chính Sách Riêng Tư</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['csrt'];
				}
			?>
			<h4>--- Điều Khoản Bản Quyền</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['banquyen'];
				}
			?>
			<h4>--- FanPage</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['facebook'];
				}
			?>
			<h4>--- Google +</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['google'];
				}
			?>
			<h4>--- Twitter</h4>
			<?php 
				foreach ($data as $item) {
					echo $item['twitter'];
				}
			?>
        </div>
    </div>
    <!-- /.row -->
<style type="text/css">
	h4{color: green}
</style>
</div>
@endsection