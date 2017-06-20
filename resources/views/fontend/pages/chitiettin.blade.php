@extends('fontend.main')
@section('title','Tin Tức - '.$title['title'])
@section('content')
<div id="menu" style="background-color: #fff">
	<div style="height: 100px;width: 100%;position: initial;"></div>
</div>
<div class="clear-fix"></div>
<div id="main" style="background-color: #fff">
	<div class="container">
		<div class="row">
			<div class="col-md-9" style="position: initial;">
				@foreach($news as $item)
				<h1 style="color: #7da7d9;font-size: 25px;font-weight: bold;line-height: 25px;margin-bottom: 2%"><i class="fa fa-newspaper-o"></i> {{ $item['title'] }}</h1>
				<p style="font-size: 12px"><span><i class="fa fa-calendar-times-o"></i> {{ $item['created_at'] }}</span> || <span>{{ $item['soluotxem'] }} Lượt Xem</span> || <span> <i class="fa fa-user"></i> {{ $item['user']['username'] }}</span></p>
				@endforeach
				<hr>
				<p><i class="fa fa-hand-o-right"></i> Có thể bạn sẽ thích !!</p>
				<ul style="margin-left: 5%">
				@foreach($decu as $item)
					<li style="list-style: disc;margin: 1%"><a style="color: #3390ff" href="{{ url('chi-tiet-tin/'.$item['id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></li>
				@endforeach
				</ul>
				@foreach($news as $item)
				<hr>
				<p>{!! $item['content'] !!}</p>
				<hr>
				<div class="fb-comments" data-href="{{ url('chi-tiet-tin/'.$item['id'].'-'.$item['metatitle'].'.html') }}" data-width="100%" data-numposts="5"></div>
				<hr>
				@endforeach
			</div>

			<div class="col-md-3" style="position: initial;">
				
			</div>
		</div>
	</div>
</div>
@endsection