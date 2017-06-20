<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>XAM | @yield('title')</title>
	<link rel="shortcut icon" href="{{ url('fontend/image/shortcut.png') }}" type="image/png" />
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/font-awesome-4.6.3/css/font-awesome.min.css') }}"/>
	<script type="text/javascript" src="{{ asset('fontend/assets/js/jquery-3.1.0.min.js') }}"></script>
	<style type="text/css">
		.affix{top: 0;width: 100%;}
		.affix + .container-fluid{padding-top: 50px}
	</style>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=204052356702414";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@if($errors->has('errorsAdmin'))
	<script type="text/javascript">
		alert("{{ $errors->first('errorsAdmin') }}");
	</script>
@endif
	<div id="header">
		<div class="container-fluid" style="border-bottom: 1px solid #e7e7e7;background-color:#fff">
			<div class="header-logo">
				<div class="row">
					<div class="col-md-12" style="height: 50px">
					<a id="logo" href="{{ url('/') }}"><img src="{{ url('fontend/image/logo.png') }}" alt="logo" /></a>	
						<label class="more-title">The World's Movie for You</label>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid" data-spy="affix" data-offset-top="50" style="padding: 0 !important;z-index: 1">
		    <nav class="navbar navbar-default" role="navigation" style="background-color:#333">
		     	<div class="container">
		     		<!-- Brand and toggle get grouped for better mobile display -->
		     		<div class="navbar-header">
		     			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" style="float: left;margin-left: 15px">
		     				<span class="sr-only">Toggle navigation</span>
		     				<span class="icon-bar"></span>
		     				<span class="icon-bar"></span>
		     				<span class="icon-bar"></span>
		     			</button>
		     			<div class="row">
		     				<div class="mini-search">
		     					<form action="tim-kiem" class="mini-frm-search" method="POST" role="search">
		     						<input type="hidden" name="_token" value="{{ csrf_token() }}">
				     				<input type="text" autofocus name="inputsearch" class="form-control" placeholder="Search">
				     			</form>

				     			<i class="fa fa-search fa-2x icon-search" style="color: #fff"></i>
				     			@if(!Auth::check())
				     			<div class="mini-login" title="Đăng Nhập">
					     			<a style="display: block;" href="{{ url('dang-nhap') }}">
					     				<i style='color:#fff' class='fa fa-user fa-2x'></i>
					     			</a>
				     			</div>
				     			@else
								@if(Auth::user()->level == 1)
								<p class='info-mini-user'>
								<?php if(strlen(Auth::user()->avata) <= 0){
										echo "<img src='".url('fontend/image/user.png')."' alt='anh-dai-dien'/>";
									} else{
										echo "<img src='".url('fontend/image/avata-user/'.Auth::user()->avata)."' alt='".Auth::user()->username."'/>";
									}?>
										
								</p>
								<div id='show-more-mini-user'>
									<div style='width:100%'>
										<p><a href="{{ url('thong-tin') }}"><i class='fa fa-info'></i> Thông Tin</a></p>
										<p><a href="{{ url('mat-khau-'.Auth::user()->id.'.'.Auth::user()->username.'') }}"><i class='fa fa-cog'></i> Thay mật khẩu</a></p>
										<p><a href="{{ url('logout') }}"><i class='fa fa-sign-out'></i> Đăng Xuất</a></p>	
									</div>
								</div> 
								@elseif(Auth::user()->level==0)
								<p class='info-mini-user'>
								<?php if(strlen(Auth::user()->avata) <= 0){
										echo "<img src='".url('fontend/image/user.png')."' alt='anh-dai-dien'/>";
									} else{
										echo "<img src='".url('fontend/image/avata-user/'.Auth::user()->avata)."' alt='".Auth::user()->username."'/>";
									}?>
							   	</p>
								<div id='show-more-mini-user'>
									<div style='width:100%'>
										<p><a href="{{ url('thong-tin') }}"><i class='fa fa-info'></i> Thông Tin</a></p>
										<p><a href="{{ url('mv12_admin') }}"><i class='fa fa-unlock'></i> Quản Lý</a></P>
										<p><a href="{{ url('logout') }}"><i class='fa fa-sign-out'></i> Đăng Xuất</a></p>	
									</div>
								</div> 
								@endif
				     			@endif
		     				</div>
		     			</div>
		     			
		     		</div>
		     		<!-- Collect the nav links, forms, and other content for toggling -->
		     		<div class="collapse navbar-collapse navbar-ex1-collapse" style="padding: 0">
			     		<div class="col-md-8 col-sm-8" style="padding: 0">
			     			<ul class="nav navbar-nav navbar-left">
			     				<li><a href="{{ url('/') }}"><i class="fa fa-home fa-2x" style="font-size: 20px"></i></a></li>
			     					<?php 
							        	foreach ($menu as $item) {
							        		if($item['parent_id'] == 0){
												echo "	<li><a href='".url('danh-sach/'.$item['id'].'/'.$item['metatitle'].'.html')."'>".$item['name']."</a>";
														subMenu($menu,$item['id']);
												echo	"</li>"; 
							        		}
							        	}
							        ?>
		     					<li><a href="{{ url('tin-tuc') }}">Tin Tức</a></li>
			     			</ul>
			     		</div>
			     		<div class="col-md-4 col-sm-4 form-s" style="padding: 0">
			     			<form action="{{ url('tim-kiem') }}" class="navbar-form navbar-left frm-search" role="search" method="POST">
			     			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			     				<input type="text" name="inputsearch" autofocus class="form-control" placeholder="Search">
			     			</form>
			     			<i class="fa fa-search fa-2x icon-s" style="color: #fff"></i>
			     			@if(!Auth::check())
			     			<div class="login" title="Đăng Nhập">
				     			<a style="display: block;" href="{{ url('dang-nhap') }}">
				     				<i style='color:#fff' class='fa fa-user fa-2x'></i>
				     			</a>
			     			</div>
							@else 
								@if(Auth::user()->level == 1) 
								<p class='info-user'>
									<?php if(strlen(Auth::user()->avata) <= 0){
										echo "<img src='".url('fontend/image/user.png')."' alt='anh-dai-dien'/>";
									} else{
										echo "<img src='".url('fontend/image/avata-user/'.Auth::user()->avata)."' alt='".Auth::user()->username."'/>";
									}?>
								</p>
								<div id='show-more-user'>
									<div style='width:100%'>
										<p><a href="{{ url('thong-tin') }}"><i class='fa fa-info'></i> Thông Tin</a></p>
										<p><a href="{{ url('mat-khau-'.Auth::user()->id.'.'.Auth::user()->username.'') }}"><i class='fa fa-cog'></i> Thay mật khẩu</a></p>
										<p><a href="{{ url('logout') }}"><i class='fa fa-sign-out'></i> Đăng Xuất</a></p>	
									</div>
								</div>
								@elseif(Auth::user()->level==0)
									<p class='info-user'>
									<?php if(strlen(Auth::user()->avata) <= 0){
										echo "<img src='".url('fontend/image/user.png')."' alt='anh-dai-dien'/>";
									} else{
										echo "<img src='".url('fontend/image/avata-user/'.Auth::user()->avata)."' alt='".Auth::user()->username."'/>";
									}?>
								   	</p>
									<div id='show-more-user'>
										<div style='width:100%'>
											<p><a href="{{ url('thong-tin') }}"><i class='fa fa-info'></i> Thông Tin</a></p>
											<p><a href="{{ url('mv12_admin') }}"><i class='fa fa-unlock'></i> Quản Lý</a></P>
											<p><a href="{{ url('logout') }}"><i class='fa fa-sign-out'></i> Đăng Xuất</a></p>	
										</div>
									</div>
								@endif
							@endif
			     		</div>
		     		</div><!-- /.navbar-collapse -->
		     	</div>
		    </nav>
			</div>
		</div>
	</div>
	<div class="clear_fix"></div>
		@yield('content')
	<div class="clear_fix"></div>
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 footer-info">
					 <div class="col-md-3">
					 	<h4>XAM</h4>
					 	<ul>
					 		<li><a href="{{ url('gioi-thieu') }}">Giới Thiệu</a></li>
					 		<li><a href="{{ url('quang-cao') }}">Quảng Cáo</a></li>
					 	</ul>
					 </div>
					 <div class="col-md-3">
					 	<h4>ĐÓNG GÓP</h4>
					 	<ul>
					 		<li><a href="">Thành Viên</a></li>
					 		<li><a href="">Upload</a></li>
					 	</ul>
					 </div>
					 <div class="col-md-3">
					 	<h4>QUY ĐỊNH</h4>
					 	<ul>
					 		<li><a href="{{ url('dieu-khoan-su-dung') }}">Điều Khoản Sử Dụng</a></li>
					 		<li><a href="{{ url('chinh-sach-rieng-tu') }}">Chính Sách Riêng Tư</a></li>
					 		<li><a href="{{ url('ban-quyen') }}">Bản Quyền</a></li>
					 	</ul>
					 </div>
					 <div class="col-md-3">
					 	<h4>TRỢ GIÚP</h4>
					 	<ul>
					 		<li><a href="">FAQs</a></li>
					 		<li><a href="">Liên Hệ</a></li>
					 		<li><a href="{{ url('bao-loi') }}">Báo Lỗi</a></li>
					 	</ul>
					 </div>
				</div>
				<div class="col-md-12">
					<div class="col-md-3">
						<a href="#top" title="back to top"><img src="{{ url('fontend/image/logo.png') }}" /></a>
					</div>
					<div class="col-md-6">
						<ul>
							<li>Website designed by Albert </li>
                            <li>Liên Hệ : 84.1632018607</li>
						</ul>
						
					</div>
					<div class="col-md-3 social">
					<?php 
						foreach ($footer as $item) {
							echo "
								<a href='".$item['facebook']."' target='_blank'><img src='".url('fontend/image/Facebook.jpg')."' /></a>
								<a href='".$item['twitter']."' target='_blank'><img src='".url('fontend/image/Twitter.jpg')."' /></a>
								<a href='".$item['google']."' target='_blank'><img src='".url('fontend/image/Google.jpg')."' /></a>
							";
						}
					?>
						
					</div>
					<div class="col-md-12">
						<p style="float:right;color: #fff">Copyright &copy; 2016 GOPTV.Phiên bản thử nghiệm đang chờ xin giấy phép bộ TT & TT.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('fontend/assets/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('fontend/assets/js/js.js') }}"></script>
</body>
</html>