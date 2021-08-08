@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" class="pl-3" height="60px" style="object-fit:contain;"/>
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12 pt-2 px-0">
	<a class="option col-12 " href="admin"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</a>
	<a class="option col-12 " href="admin/bills"><i class="fas fa-truck"></i> Đơn đặt hàng</a>
	<a class="option col-12 " href="admin/analyze"><i class="far fa-chart-bar"></i> Phân tích</a>
	<a class="option col-12 active" href="admin/bao-mat"><i class="fas fa-shield-alt"></i> Bảo mật</a>
	<a class="option col-12 " href="logout"><i class="bi bi-box-arrow-right"></i> Đăng Xuất</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Bảo mật</h2>
<hr/>
@if(count($errors)>0)
	@foreach($errors->all() as $err)
	<p class="alert alert-danger">{{$err}}</p>
	@endforeach
	@endif
	@if(session('notice'))
		<p class="alert alert-success">{{session('notice')}}</p>
	@endif
	<form action="admin/bao-mat" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="">Email</label>
			<input class="form-control" readonly type="email" name="email" value="{{Auth::user()->email}}"/>
		</div>
		<div class="form-group">
			<label for="">Mật khẩu mới</label>
			<input class="form-control" type="password" name="password" value=""/>
		</div>
		<div class="form-group">
			<label for="">Xác nhận lại mật khẩu</label>
			<input class="form-control" type="password" name="re-password" value=""/>
		</div>
		<div class="form-group">
			<button class="btn btn-info btn-md">Thay đổi</button>
		</div>
	</form>
	</div>
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
@endsection
@section('title')
Admin
@endsection