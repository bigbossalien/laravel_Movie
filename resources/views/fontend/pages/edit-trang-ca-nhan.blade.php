@extends('fontend.info-user')
@section('title','Sửa Trang Cá Nhân')
@section('content')
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="position: initial;">
			<div class="col-md-6" style="position: initial;">
			@include('fontend.errors.errors')
			<script type="text/javascript">
				$('.error_msg').delay(2000).slideUp();
			</script>
				<form method="POST" role="form" style="margin-bottom: 10px">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<legend>Cập nhật thông tin</legend>
				
					<div class="form-group">
						<label for="hoten">Họ Tên</label>
						<input type="text" required class="form-control" name="hoten" placeholder="Nhập họ tên !">
					</div>
					<label for="sex">Giới Tính</label>
					<select name="sex" class="form-control">
						<option value="khongxacdinh">Thứ 3</option>
						<option value="nam">Nam</option>
						<option value="nu">Nữ</option>
					</select>
					<div class="form-group">
						<label for="birthday">Sinh Nhật</label>
		                <input type='date' name="birthday" placeholder="mm/dd/yyyy" class="form-control" />
					</div>
					<label for="diachi">Địa Chỉ</label>
					<textarea class="form-control" rows="3" name="diachi"></textarea>
					<hr>

					<button type="submit" class="btn btn-primary">Cập Nhật</button>
					<a href="{{ url('thong-tin') }}">Cancel</a>
				</form>
			</div>
@endsection