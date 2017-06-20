@extends('fontend.main')
@section('title','Phim Hay | Phim Nhanh | Phim Online')
@section('content')
<div id="menu">
	<div class="container-fluid">
		<div class="row">
		<div style="height: 100px;width: 100%"></div>
			<div class="col-md-9 slides">
	            <div class="img-slides">
	            <?php foreach ($slide as $item): ?>
	            	<?php 
	            	echo "<a href='chi-tiet/".$item->i."/".$item->cat_id."-".$item->metatitle.".html'><img src='Image/Slide/".$item->image."' alt='".$item->metatitle."' title='".$item->title."' /></a>"; 
	            	?>
	            <?php endforeach ?>
	            	<div class='img-slides-content'>
		            	<ul>
		            	<?php foreach ($slide as $item): ?>
		            		<?php 
		            		echo "<li>
				            		<h3>".$item->title."</h3>
				            		<p>".$item->intro."...</p>
				            		<div class='more-info-img'>";
		            		if($item->loai_id == 1){
		            			echo "<p><label>Thể Loại :</label> Phim Lẻ -- ".$item->name."</p>";
		            		}else if($item->loai_id == 2){
		            			echo "<p><label>Thể Loại :</label> Phim Bộ -- ".$item->name."</p>";
		            		}else if($item->loai_id == 3){
		            			echo "<p><label>Thể Loại :</label> Hoat Hình -- ".$item->name."</p>";
		            		}
				            			 
				            		echo"	<p><label>Thời Lượng : </label> ".$item->sotap." Tập</p>
				            			<p><label>Năm Sản Xuất : </label> ".$item->namsx."</p>
				            		</div>
								</li>"; 
							?>
		            	<?php endforeach ?>
		            	</ul>
	            	</div>
	            	<div class="next-slide">
	            		<img src="{{ url('fontend/image/icon_right.png') }}">
	            	</div>
	            </div>
			</div>
			<div class="col-md-3 col-sm-3 news">
				<div class="tieude-news">
					<h4 class="title-news"><i class="fa fa-newspaper-o" style="color:blue;float:left"></i>Tin Tức</h4>
				</div>
				<div class="more-news">
					<div class="col-md-12" style="position:initial;padding: 0">
					@foreach($news as $item)
						@if($item['status']==0)
						<div class="news1">
							<img src="{{ url('Image/News/'.$item['image']) }}" />
							<p><a href="{{ url('chi-tiet-tin/'.$item['id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></p>
						</div>
						@endif
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clear_fix"></div>

<div id="main">
	<div class="container" style="padding: 0">
	<div class="row">
		<div class="col-md-12">
			<hr>
			<h3 style="color:#fff;font-family: sans-serif;text-transform: uppercase;font-weight: bold;"><i class="fa fa-list" style="color:#0b67de"></i>  Phim Mới </h3>
		</div>
		@foreach($phimmoi as $item)
		@if($item['status']==0)
		<div class="col-md-3 col-sm-6 col-xs-6 phim">
			<div class='item-img'>
				<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}" alt="{{ $item['metatitle'] }}" title="{{ $item['title'] }}" />
				<div class='tuongtac'>
					<p>{{ $item['soluotxem'] }} <span>Lượt xem </span></p>
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
		@endif
		@endforeach

		<div class="clear_fix"></div>

		<div class="col-md-12">
			<h3 style="color:#fff;text-transform: uppercase;font-family:sans-serif;font-weight: bold;"><i class="fa fa-list" style="color:#0b67de"></i>  TOP Phim Hay</h3>
		</div>
		@foreach($bangxephang as $item)
		<div class="col-md-3 col-sm-6 col-xs-6 item"> 
			<div class='item-img'>
				<img src="{{ url('Image/AnhBia/images/'.$item['image']) }}" alt="{{ $item['metatitle'] }}" title="{{ $item['title'] }}" />
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
						<h1><a href="{{ url('chi-tiet/'.$item['id'].'/'.$item['cate']['id'].'.'.$item['loai_id'].'-'.$item['metatitle'].'.html') }}">{{ $item['title'] }}</a></h1>
					</div>
				</div>
			</div>
		</div>
		@endforeach

		<div class="clear_fix"></div>

		<div class="col-md-12">
			<h3 style="color:#fff;text-transform:uppercase;font-family:sans-serif;font-weight: bold;"><i class="fa fa-list" style="color:#0b67de"></i>  Phim Hành Động</h3>
		</div>
		<?php foreach ($hanhdong as $item): ?>
			<?php 
				if($item->status == 0){
					echo "<div class='col-md-3 col-sm-6 col-xs-6 item'>
							<div class='item-img'>
								<img src='Image/AnhBia/images/".$item->image."' alt='".$item->metatitle."' title='".$item->title."' />";
								echo "<div class='tuongtac'>
										<p>".$item->soluotxem." <span>Lượt xem </span></p>
									  </div>";
					echo "		<div class='box-info'>
									<h1><a href='chi-tiet/".$item->id."/".$item->i.".".$item->loai_id."-".$item->metatitle.".html'>".$item->title."</a></h1>
									<p><span style='color:#d68012'>Thể Loại -</span> ".$item->name." </p>
									<p><span style='color:#008a1f'>Sản Xuất -</span> ".$item->namsx."</p>
									<p style='font-size:12px'><span style='font-size:14px;color:#008a1f'>Nội Dung -</span> ".$item->intro."</p>
								</div>
								<div class='i-title'>
									<div class='m-title'>
										<h1><a href='".url('chi-tiet/'.$item->id.'/'.$item->i.'.'.$item->loai_id.'-'.$item->metatitle.'.html') ."'>".$item->title."</a></h1>
									</div>
								</div>
							</div>
						</div>";
								
				}
			?>
		<?php endforeach ?>
	</div>
</div>
</div>
@endsection