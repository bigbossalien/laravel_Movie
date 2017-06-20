@extends('fontend.main')
@section('title','Thể Loại Danh Mục '.$mtitle['name'].'-'.$title['name'])
@section('content')
<div id="menu">
	<div style="height: 100px;width: 100%;position: initial;"></div>
</div>
<div class="clear_fix"></div>
<div id="main">
	<div class="container">
			<hr>
			<div class="col-md-9" style="position:initial !important">
			@foreach($tit as $item)
				<h4 style="color:#fff;font-family:Monospace;font-style:italic"><i class="fa fa-hand-o-right" style="color:#ccc"></i>  ---- {{ $item['name'] }} ----
			@endforeach 
			@foreach($titchil as $item)
				<span style="color:#1cb8c1;font-style: oblique">{{ $item['name'] }}</span></h4>
			@endforeach
				<p style="color:orange;font-style: 22px;font-family: serif"><i class="fa fa-star"></i> Đề Cử</p>
				@foreach($decu as $item)
				<div class="col-md-5 col-sm-5 theloai-decu">
					<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}" />
				</div>
				<div class="col-md-7 col-sm-7 theloai-decu-noidung" >
					<h1>{{ $item['title'] }}</h1>
					<p><span style="color: #FFCC00">Đạo Diễn :</span> {{ $item['author'] }}</p>
					<p><span style="color: #FFCC00">Năm Sản Xuất :</span> {{ $item['namsx']}}</p>
					<p><span style="color: #FFCC00">Nội Dung :</span> {{ $item['intro']}}</p>
					<p><span style="color: #FFCC00">Số Tập :</span> 1/{{ $item['sotap'] }}</p>
					<div class="col-md-6">
						<a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}" class="xemphim">Chi Tiết</a>
					</div>
				</div>
				@endforeach
				<div class="clear_fix"></div>
				@foreach($data as $item)
					<div class="col-md-4 col-sm-6 item">
						<div class="item-img">
							<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}"/>
							<div class='tuongtac'>
								<p>{{ $item['soluotxem'] }} <span>Lượt xem </span></p>
							</div>
							<div class='box-info'>
								<h1><a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></h1>
								<p><span style='color:#d68012'>Thể Loại -</span> {{ $item['cate']['name'] }} </p>
								<p><span style='color:#008a1f'>Sản Xuất -</span> {{ $item['namsx'] }}</p>
								<p style='font-size:12px'><span style='font-size:14px;color:#008a1f'>Nội Dung -</span> {{ $item['intro'] }}</p>
							</div>
							<div class='i-title'>
								<div class='m-title'>
									<h1><a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'o'.$item['loai_id'].'-'.$item['metatitle'].'') }}">{{ $item['title'] }}</a></h1>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<div class="clear_fix"></div>
					<div class="col-md-12">
						{{ $data->render() }}
					</div>
			</div>
			<div class="col-md-3">
				<h4 class="title-news"><i class="fa fa-newspaper-o" style="color:blue;float:left"></i>  Tin Mới Cập Nhật</h4>
				<div class="more-news1">
					@foreach($news as $item)
						<div class="col-md-12 col-sm-6 col-xs-6 news2">
							<img src="{{ url('Image/News/'.$item['image']) }}" />
							<p><a href="{{ url('chi-tiet-tin/'.$item['id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></p>
						</div>
					@endforeach
					<div class="clear_fix"></div>
					<div class="col-md-12">
						<a href="">Xem Thêm !</a>
					</div>
				</div>
			</div>
	</div>
</div>
@endsection