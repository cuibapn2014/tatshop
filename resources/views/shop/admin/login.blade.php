@extends('layout.login_master')
@section('content')
	<div class="container-fluid padding">
		<div class="form col-lg-4 col-md-7 col-sm- 12 mx-auto bg-light my-4 p-2">
			<form action="login" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<h2 class="display-4 text-center" style="font-size:48px;">Đăng Nhập</h2>
			@if(count($errors)> 0)
			@foreach($errors->all() as $err)
		<p class="alert alert-danger">
		{{$err}}
		</p>
		@endforeach
			@endif
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="text" name="username" placeholder="Nhập email"/>
				</div>
				<div class="form-group">
					<label>Mật khẩu</label>
					<input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu"/>
				</div>
				<div class="form-check form-check-inline w-100">
				  <input class="form-check-input" name="remember" type="checkbox" id="inlineCheckbox" value="option">
				  <label class="form-check-label" for="inlineCheckbox">Ghi nhớ</label>
				</div>
				<a href="sign-up">>> Đăng ký tại đây</a>
				<div class="form-group">
				<button class="btn btn-info btn-md">Đăng nhập</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('title')
Đăng nhập
@endsection