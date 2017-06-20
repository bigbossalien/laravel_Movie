@extends('fontend.info-user')
@section('title','Trang Cá Nhân')
@section('content')
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="position: initial;">
				<div class="col-md-6" style="position: initial;">
				@include('fontend.errors.flash')
				<script type="text/javascript">
					$('.alert-success').delay(2000).slideUp();
				</script>
				@foreach($data as $item)
					<h4 style="color: #1176ce">Thông Tin Của Bạn</h4>
						<hr>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Họ Tên</th>
								<td>{{ $item['hoten'] }}</td>
							</tr>
							<tr>
								<th>Username</th>
								<td>{{ $item['username'] }}</td>
							</tr>
							<tr>
								<th>Giới Tính</th>
								<td>{{ $item['sex'] }}</td>
							</tr>
							<tr>
								<th>Sinh Nhật</th>
								<td>{{ $item['birthday'] }}</td>
							</tr>
							<tr>
								<th>Cấp Độ</th>
								@if($item['level'] == 1)
								<td>Thành Viên</td>
								@else
								<td>Quản Trị</td>
								@endif
							</tr>
						</thead>
					</table>
					<h4 style="color: #ce113b">Thông Tin Liên Lạc</h4>
						<hr>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Email</th>
								<td>{{ $item['email'] }}</td>
							</tr>
							<tr>
								<th>Địa Chỉ</th>
								<td>{{ $item['diachi'] }}</td>
							</tr>
						</thead>
					</table>
				@endforeach
				</div>
@endsection