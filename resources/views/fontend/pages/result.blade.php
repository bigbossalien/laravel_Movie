@extends('fontend.main')
@section('title','Kết quả tìm kiếm cho '.$keyword)
@section('content')
<div id="menu" style="background-color: #fff;">
	<div style="height: 100px;width: 100%;position: initial;"></div>
</div>
<div id="main" style="background-color: #fff">
	<div class="container">
		<div class="row">
		<div class="col-md-12" style="position: initial;">
			<hr>
			<?php if(isset($result)){ ?>
				<h4><i class="fa fa-search-minus fa-2x" style="color: #2ac70f;margin-right: 10px"></i>Kết quả tìm kiếm cho : {{ $keyword }}</h4>
				<?php if($counts == 0){
					echo "<p style='color:red;margin-left:46px'>Không tìm thấy kết quả nào !</p>";
					}else{
						echo "<p style='margin-left:46px;color:#35c2d2'>Số kết quả tìm được : ".$counts."</p>";
						foreach ($result as $item) {
							echo "<div class='col-md-3 phim'>
							<div class='item-img'>
								<img src= '".url('Image/AnhBia/images/'.$item->image)."' />
								<div class='tuongtac'>
									<p>".$item->soluotxem."<span> Lượt xem </span></p>
								</div>
								<div class='item-title'>
									<div class='m-title'>
										<h1>".$item->title."</h1>
									</div>
								</div>
								<div class='icon-detail'>
									<a href='".url('chi-tiet/'.$item->id.'/'.$item->i.'.'.$item->loai_id.'-'.$item->metatitle.'.html')."'><img src='".url('fontend/image/overlay_rich.png')."'></a>
								</div>
							</div>
						</div>";
						}

					} 
				?>
			<?php } ?>
			
		</div>
		<div class="col-md-12">
			{{ $result->render() }}
		</div>
		</div>
	</div>
</div>
@endsection