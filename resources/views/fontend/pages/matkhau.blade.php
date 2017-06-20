@extends('fontend.info-user')
@section('title','Quản lý mật khẩu')
@section('content')
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="position: initial;">
				<div class="col-md-6" style="position: initial;">
				@include('fontend.errors.errors')
				@include('fontend.errors.e-flash')
				<script type="text/javascript">
					$(document).ready(function(){
						$('.error_msg').delay(3000).slideUp();
						$('.alert-danger').delay(3000).slideUp();
					});
				</script>
					<form method="POST" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<legend>Thay Đổi Mật Khẩu</legend>
					
						<div class="form-group">
							<label for="matkhaucu">Mật Khẩu Cũ</label>
							<input type="password" name="matkhaucu" class="form-control" id="matkhaucu" placeholder="Mật Khẩu">
						</div>
						<div class="form-group">
							<label for="npassword">Mật Khẩu Mới</label>
							<input type="password" name="npassword" class="form-control" id="npassword" placeholder="Mật Khẩu Mới">
						</div>
						<div class="form-group">
							<label for="confirmPass">Xác Nhận Mật Khẩu</label>
							<input type="password" name="confirmPass" class="form-control" id="confirmPass" placeholder="Xác Nhận Mật Khẩu Mật Khẩu">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary">Cập Nhật Thay Đổi</button>
					</form>
				</div>
@endsection