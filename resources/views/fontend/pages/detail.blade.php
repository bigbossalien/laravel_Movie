@extends('fontend.main')
@section('title','Chi Tiết Phim '.$title['title'])
@section('content')
<div id="menu" style="background-color: #fff">
	<div style="height: 100px;width: 100%;position: initial;"></div>
</div>
<div class="clear-fix"></div>
<div id="main" style="background-color: #fff">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12" style="position:initial !important;margin-top: 2%">
				<!-- <h4><i class="fa fa-info"></i> Chi Tiêt Phim</h4> -->
				@foreach( $data as $item ) 
					<p style="border-bottom:2px solid #ccc;padding:1% 0%">
						...<i class="fa fa-home">...</i> <a href="{{ url('/') }}">Trang Chủ</a>---<a href="{{ url('danh-muc/'.$item['cate']['id'].'/'.$item['cate']['metatitle']) }}">{{ $item['cate']['name'] }}</a>---{{ $item['title'] }}
					</p>
					
					<div class="col-md-6 col-sm-6" style="margin:2% 0%;height: 500px;position: initial;">
						<img style="width:100%;height:100%;border:2px solid #ccc" src="{{ url('Image/AnhBia/images/'.$item['image']) }}" />
					</div>
					
					<div class="col-md-6 col-sm-6 info-mov">
						<h1 class="title-mov"> {{ $item['title'] }}</h1>
						<p><span>Đạo diễn :</span> {{ $item['author'] }}</p>
						<p><span>Nhân Vật :</span> {{ $item['nhanvat'] }}</p>
						<p><span>Nhà Sản Xuất :</span> {{ $item['nhasx'] }}</p>
						<p><span>Thể Loại :</span> {{ $item['cate']['name'] }}</p>
						<p><span>Năm Sản Xuất :</span> {{ $item['namsx'] }}</p>

						

						<p><span>Số tập :</span>
						@foreach($count as $i)
							{{ $i['count'] }}
						@endforeach
						/{{ $item['sotap'] }} Tập</p>
						
						<!-- <div class="fb-like" data-href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div> -->
						
						<hr>
						<div class="col-md-6">
							<a href="{{ url('xem-phim/'.$item['id'].'.'.$item['iproducts']['0']['id'].'t'.$item['iproducts'][0]['tap'].'-'.$item['metatitle'].'.html') }}" class="xemphim">Xem Phim</a>
						</div>
						<div class="col-md-6">
							<button class="trailer">Trailer</button>
						</div>
						
					</div>
					<div id="nw-trailer">
						<span class="close-nw"><i class="fa fa-times-circle-o fa-2x"></i></span>
						<div class="nw-content">
							<iframe id="myVideo" allowfullscreen src="{{ $item['trailer'] }}" width="100%" height="100%"></iframe>
						</div>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							var x=$('.trailer');
							var y=$('#nw-trailer');
							var z=$('.close-nw');
							var t=$('#myVideo');
							x.click(function(event) {
								y.slideDown(1000);
							});
							z.click(function(event) {
								y.slideUp(500);
								t.pause();
							});
						});
					</script>
					<div class="col-md-12 col-sm-12 noidung">
						<h4><i class="fa fa-info"></i> Nội Dung Phim</h4>
						{!! $item['content'] !!}
						<span id="click-full">-----------------Full----------------</span>
						<span id="click-hidden">-----------------Small----------------</span>
					</div>
				@endforeach
			</div>

			<div class="col-md-4" style="position:initial !important;margin-top: 2%">
				<h4><i class="fa fa-list"></i> Phim Đề Cử Cho Bạn</h4>

				@foreach ($decu as $item)
					<div class="decu">
						<div class="decu-img">
							<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}" />
						</div>
						<div class="decu-noidung">
							<p><a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></p>
							<p><span style="color:#000">Số Tập :</span>{{ $item['sotap'] }}</p>
							<p><span style="color:#000">Năm Sản Xuất :</span>{{ $item['namsx'] }}</p>
							<p><span style="color:#000">Số Lượt Xem :</span>{{ $item['soluotxem'] }}</p>
							<p><span style="color:#000">Nội Dung :</span>{{ substr($item['intro'],0,40)."..." }}</p>
						</div>
					</div>
				@endforeach
			</div>

			<div style="clear: both;"></div>
			<div class="col-md-12 cungtheloai">
				<h4><i class="fa fa-list" style="color:blue"></i> Phim Cùng Thể Loại</h4>
				<hr>
				@foreach ($cungtheloai as $item)
					<div class="col-md-3 col-sm-4 col-xs-4 phim">
						<div class="item-img">
							<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}"/>
							<div class='tuongtac'>
								<p>{{ $item['soluotxem'] }} <span>Lượt xem</span></p>
							</div>
							<div class='item-title'>
								<div class='m-title'>
									<h1>{{ $item['title'] }}</h1>
								</div>
							</div>
							<div class="icon-detail">
								<a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}"><img src="{{ url('fontend/image/overlay_rich.png') }}"></a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection