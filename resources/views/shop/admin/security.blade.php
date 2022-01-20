@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
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