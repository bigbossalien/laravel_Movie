@extends('fontend.main')
@section('title','Chính Sách Bản Quyền')
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
			     <h4>Chính Sách Bản Quyền</h4>
	                     <div>
	                     <img src="{!! url('fontend/image/logo-max.png') !!}"/>
	                     </div>
	                     <div class="clear_fix"></div>
	                     @foreach($footer as $item)
	                          {!! $item['banquyen'] !!}
	                          <div class="fb-comments" data-href="{!! url('ban-quyen') !!}" data-width="100%" data-numposts="5"></div> 
	                     @endforeach
	                     <style type="text/css">a{color:#fff}</style>
		     </div>
                     
                </div>
                </div>
        </div>
</div>
@endsection