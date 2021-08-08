@extends('layout.layout_admin')
@section('dashboard')
					<div class="col-12">
						<a class="close" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
						<a class="option col-12 " href="user"><i class="fas fa-tachometer-alt"></i> Cập nhật tài khoản</a>
						<a class="option col-12 active" href="user/bao-mat"><i class="fas fa-shield-alt"></i> Bảo mật</a>
						<a class="option col-12 " href="logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
						</div>
		@endsection
		
@section('display')
	<a href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Bảo mật</h2>
	<div class="container container-fluid p-0 m-auto">
	@if(count($errors) > 1)
		@foreach($errors->all() as $err)
			<div class='alert alert-danger'>
		{{$err}}
	</div>
			@endforeach
		@endif
	@if(session('notice'))
		<div class='alert alert-success'>
		{{session('notice')}}
	</div>
		@endif
			<form action="user/bao-mat" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="form-group">
					<label>Email</label>
					@if(Auth::check())
					<input type="email" class="form-control" readonly name="email" value="{{Auth::user()->email}}"/>
				@endif
				</div>
				<div class="form-group">
				<label>Mật khẩu mới</label>
					<input type="password" class="form-control" name="password" value="" placeholder="Nhập mật khẩu mới"/>
				<div>
				<div class="form-group mt-1">
				<label>Nhập lại mật khẩu</label>
					<input type="password" class="form-control" name="re-password" value="" placeholder="Nhập lại mật khẩu"/>
				<div>
				<div class="form-group mt-1">
					<button class="btn btn-primary btn-md" type="submit" name="btn_button">Thay đổi</button>
				<div>
			</form>
		</div>
@endsection		
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/effect.jquery"></script>
@endsection
@section('title')
Bảo mật
@endsection