@extends('fontend.main')
@section('title','Tin Tức Cập Nhật 24/7 ')
@section('content')
<div id="menu" style="background-color: #fff">
	<div style="height: 100px;width: 100%;position: initial;"></div>
</div>
<div class="clear_fix"></div>
<div id="main" style="background-color: #fff">
	<div class="container">
		<div class="row">
		@foreach($news as $item)
			<div class="col-md-4 col-xs-6" style="position: initial;">
				<div class="newss">
					<div class="news-img">
						<a href="{{ url('chi-tiet-tin/'.$item['id'].'-'.$item['metatitle'].'.html') }}"><img src="{{ url('Image/News/'.$item['image']) }}" alt="{{ $item['metatitle'] }}"></a>
					</div>
					<div class="news-content">
						<h1><a href="{{ url('chi-tiet-tin/'.$item['id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></h1>
						<hr>
						<p>{{ $item['intro'] }}</p>
						<div class="info-news">
							<label>Tác Giả : {{ $item['user']['username'] }}</label>
							<span>{{ $item['created_at'] }}</span>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.news-img').hover(function(){
			$(this).find('img').animate({width:'100%',height:'100%',margin:'0'},500)
		},function(){
			$(this).find('img').animate({width:'96%',height:'92%',margin:'2%'},500)
		});
	});
</script>
@endsection