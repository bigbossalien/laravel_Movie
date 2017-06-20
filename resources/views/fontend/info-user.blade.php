<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>XAM | Thông Tin @yield('title')</title>
	<!-- Latest compiled and minified CSS & JS -->
	<script type="text/javascript" src="{{ asset('fontend/assets/js/jquery-3.1.0.min.js') }}"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/font-awesome-4.6.3/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/css/user-style.css') }}">
</head>
<body>
<div id="header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 avata">
					<?php if(strlen(Auth::user()->avata) <= 0){
						echo "<img src='".url('fontend/image/user.png')."' alt='anh-dai-dien'/>";
					} else{
						echo "<img src='".url('fontend/image/avata-user/'.Auth::user()->avata)."' alt='".Auth::user()->username."'/>";
					}?>
					<span>{{ Auth::user()->hoten }}</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="menu">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default" style="border: none;">
					<!-- <div class="container-fluid"> -->
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li><a href="{{ url('/') }}">Trang Chủ</a></li>
								<li><a href="{{ url('thong-tin') }}">Trang Cá Nhân</a></li>
								<li><a href="{{ url('thong-tin/'.Auth::user()->id.'/'.Auth::user()->username.'.html') }}">Chỉnh Sửa Thông Tin</a></li>
								<li><a href="{{ url('anh-dai-dien-'.Auth::user()->id.'.'.Auth::user()->username.'.html') }}">Ảnh Đại Diện</a></li>
								<li><a href="{{ url('mat-khau-'.Auth::user()->id.'.'.Auth::user()->username.'.html') }}">Quản Lý Mật Khẩu</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					<!-- </div> -->
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="clear-fix"></div>
	@yield('content')
				<div class="col-md-6 icon-qc">
					<img src="{{ url('fontend/image/Movie-reel.jpg') }}">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clear-fix"></div>
<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<hr style="border:1px solid red">
				<div class="col-md-6">

					<p>Website design by dovanchieu</p>
					<p>Copyright &copy; GOP</p>
					<p>Địa Chỉ : Tầng 4 tòa nhà GOP building số 2 nguyên xá bắc từ liêm hà nội</p>
					<p>Điện Thoại : 01632018607</p>
					<p>Email : support@gop.com.vn</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>