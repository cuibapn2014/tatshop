@extends('layout.login_master')
@section('content')
	<div class="container-fluid padding">
		<div class="form col-lg-4 col-md-7 col-sm- 12 mx-auto bg-light my-4 p-2">
			<form action="sign-up" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<h2 class="display-4 text-center" style="font-size:48px;">Đăng ký</h2>
			@if(count($errors)>0)
				@foreach($errors->all() as $err)
				<p class="alert alert-danger">{{$err}}</p>
			@endforeach
				@endif
				@if(session('notice'))
					<p class="alert alert-success">{{session('notice')}}</p>
					@endif
				<div class="form-group">
					<label>Họ tên</label>
					<input class="form-control" type="text" name="fullname" placeholder="Họ tên"/>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email" placeholder="e-mail@example.com"/>
				</div>
				<div class="form-group">
					<label>Mật khẩu</label>
					<input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu"/>
				</div>
				<div class="form-group">
					<label>Nhập lại mật khẩu</label>
					<input class="form-control" type="password" name="re-password" placeholder="Nhập lại mật khẩu"/>
				</div>
				<a href="login">>> Đăng nhập tại đây</a>
				<div class="form-group">
				<button class="btn btn-outline-info btn-md">Đăng ký</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('title')
Đăng ký
@endsection