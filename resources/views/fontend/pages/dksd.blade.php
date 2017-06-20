@extends('fontend.main')
@section('title','Điều Khoản Sử Dụng')
@section('content')
<div id="menu" style="background-color: #333">
	<div style="height: 100px;width: 100%;position: initial;"></div>
</div>
<div id="main" style="background-color: #333">
	<div class="container">
		<div class="row">
		<div class="col-md-12" style="position: initial;background-color:#fff">
		     <hr>
		     <div class="col-md-12">
			     <h4>Chính Sách Quảng Cáo</h4>
	                     <div><img src="{!! url('fontend/image/logo-max.png') !!}" style=""/></div>
	                     <div class="clear_fix"></div>
	                     @foreach($footer as $item)
	                          {!! $item['dksd'] !!}
	                          <div class="fb-comments" data-href="{!! url('dieu-khoan-su-dung') !!}" data-width="100%" data-numposts="5"></div> 
	                     @endforeach
		     </div>
                     
                </div>
                </div>
        </div>
</div>
@endsection