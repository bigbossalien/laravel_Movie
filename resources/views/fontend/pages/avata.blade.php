@extends('fontend.info-user')
@section('title','Ảnh minh họa')
@section('content')
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="position: initial;">
			<div class="col-md-6" style="position: initial;">
				@include('fontend.errors.errors')
				<div class="img-upload">
					<form enctype="multipart/form-data" method="POST" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<legend style="text-transform: uppercase">Cập Nhật ảnh đại diện</legend>
						<div class="custom-input">
							<input type="file" name="avata" id="file-img" accept=".jpeg, .jpg, .jpe, .png, .ico" />
							@foreach($data as $item)
							<input type="hidden" name="avatacu" value="{{ $item['avata'] }}">
							@endforeach
						</div>
							
					<button type="submit" class="btn btn-primary" style="position: absolute;bottom: 50px;">Cập Nhật</button>
					</form>
				</div>
			</div>
@endsection