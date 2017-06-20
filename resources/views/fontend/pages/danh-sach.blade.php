@extends('fontend.main')
@section('title','Danh Sach '.$title['name'])
@section('content')
<div id="menu">
	<div style="height: 100px;width: 100%;position: initial;"></div>
</div>
<div class="clear_fix"></div>
<div id="main">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="color:#fff;font-family: sans-serif;text-transform: uppercase;font-weight: bold;"><i class="fa fa-list" style="color:#0b67de"></i>  Danh Sách Phim </h3>
		</div>
		@foreach($data as $item)
			<div class='col-md-3 col-sm-6 col-xs-6 item'>
				<div class='item-img'>
					<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}" alt="{{ $item['metatitle'] }}" title="{{ $item['title'] }}" />
					<div class='tuongtac'>
							<p>{{ $item['soluotxem'] }} <span>Lượt xem </span></p>
						  </div>
					<div class='box-info'>
						<h1><a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></h1>
						<p><span style='color:#d68012'>Thể Loại -</span> {{ $item['cate']['name'] }}</p>
						<p><span style='color:#008a1f'>Sản Xuất -</span> {{ $item['namsx'] }}</p>
						<p style='font-size:12px'><span style='font-size:14px;color:#008a1f'>Nội Dung -</span>{{ $item['intro'] }}</p>
					</div>
					<div class='i-title'>
						<div class='m-title'>
							<h1><a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'') }}">{{ $item['title'] }}</a></h1>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		<div class="col-md-12">
			{{ $data->render() }}
		</div>
	</div>
	</div>
</div>
@endsection