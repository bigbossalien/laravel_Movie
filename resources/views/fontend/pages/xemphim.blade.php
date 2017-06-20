<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xem Phim <?php foreach ($datas as $item) {
		echo $item['title'];
	} ?></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/css/style.css') }}">
	<script type="text/javascript" src="{{ asset('fontend/assets/js/jquery-3.1.0.min.js') }}"></script>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/font-awesome-4.6.3/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/assets/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1801278213424501";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="menu" style="background-color: #5f5f5f">
	<div style="height: 20px;width: 100%;position: initial;"></div>
</div>
<div id="main">
<div id="light_off"></div>
	<div class="container-fluid">
		<div class="row">
				<div class="col-md-8" id="player">
					<?php foreach ($data as $item): ?>
					<div id="v-player">
						<div class="source-v">
						@if(strlen($item->link) <= 0)
							<video id="videos" controls style="width: 100%;height: 100%;position: relative" poster="../Image/AnhBia/image_prew/<?php echo $item->image_prew; ?>" />
								<?php source($next,$idc) ?> 
							</video>
							<input type="button" name="pause" onclick="pause()" id="pause" />
						@else
							<?php sourcelink($next,$idc) ?>
							<div style="position: absolute;width: 50px;height: 50px;background-color: #fff;top: 5px;right: 4px">
								<img src="../fontend/image/iconxinchao.gif" style="width: 100%;height: 100%" />
							</div>
						@endif
						</div>
					</div>
					<?php endforeach ?>
				</div>
				<div class="col-md-4" id="comment">
					<div class="mini-comment"> 
					@foreach($datas as $item)
						<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}" alt="{{ $item['metatitle'] }}">
						<h1>Xem Phim {{ $item['title'] }}

						<div class="fb-like" data-href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

						</h1>

						<hr>
						<div class="fb-comments" data-href="{{ url('xem-phim/'.$item['id'].'.'.$item['iproducts']['0']['id'].'t'.$item['iproducts'][0]['tap'].'-'.$item['metatitle'].'.html') }}" data-width="100%" data-numposts="5"></div> 
					@endforeach
					</div>
				</div>
			
			<div class="col-md-12">
				<hr>
				<div class="col-md-10">
					@foreach($datas as $item)
					<h4 class="info-movie">
						<a href="{{ url('/') }}">Trang Chủ</a>
						- <a href="{{ url('danh-muc/'.$item['cate']['id'].'.'.$item['id'].'/'.$item['cate']['metatitle'].'') }}">{{ $item['cate']['name'] }}</a> 
						- {{ $item['title'] }}
						- <span style="font-size: 12px;color: #e0970e">Tập : {{ $tap }}</span>
					</h4>
					@endforeach
					
				</div>
				<div class="col-md-2">
					<span id="khac">... Khác ... | </span> <button id="light"><i class="fa fa-sun-o"></i> Light</button>
				</div>
				<div class="col-md-12">
					<label style="color: #fff;font-family: sans-serif;font-size: 12px">Chọn Tập : </label>
					<?php tap($next) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{ asset('fontend/assets/js/js.js') }}"></script>
</body>
</html>


 