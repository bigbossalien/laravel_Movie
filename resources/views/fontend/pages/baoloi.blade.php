@extends('fontend.main')
@section('title','Báo Lỗi')
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
			     <h4>Website có lỗi</h4>
	                     <div><img src="{!! url('fontend/image/logo-max.png') !!}" style=""/></div>
	                     <div class="clear_fix"></div>
	                     <div class="col-md-6 col-md-offset-3">
	                     @include('fontend.errors.flash')
	                    	<form method="POST" role="form">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<legend style="color:red">Form Báo Lỗi</legend>
				
					<div class="form-group">
						<label>Họ và tên</label>
						<input type="text" required class="form-control" name="hoten" placeholder="Nhập họ tên của bạn">
						<br>
						<label>Email</label>
						<input type="email" required  class="form-control" name="email" placeholder="Nhập họ email của bạn">
						<br>
						<label>Báo Lỗi</label>
						<textarea name="lydo" class="form-control"  rows="10"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Gửi</button>
				</form>
				<hr>
			    </div>
		     </div>
                     
                </div>
                </div>
        </div>
</div>
@endsection