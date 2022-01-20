@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Cập nhật tài khoản</h2>
@if(count($errors) > 1)
	@foreach($errors->all() as $err)
		<div class="alert alert-danger">
		<i class="fas fa-exclamation-triangle"></i> {{$err}}
	</div>
	@endforeach
@endif
@if(session('notice'))
	<div class="alert alert-success">
		<i class="far fa-check-circle"></i> {{session('notice')}}
	</div>
	@elseif(session('danger'))
		<div class="alert alert-danger">
		<i class="fas fa-exclamation-triangle"></i> {{session('danger')}}
	</div>
	@endif
	<form class="col-12" action="admin/dashboard/cap-nhat-tai-khoan" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<div class="form-group">
			<label for="title">Tên</label>
			<input id="title" class="form-control" name="fullname" placeholder="Nhập tên" value="{{Auth::user()->name}}" size="20"/>
		</div>
		<div class="form-group">
			<label for="">Emai</label>
			<input class="form-control" readonly value="{{Auth::user()->email}}" size="255"/>
		</div>
		<p>Giới tính</p>
		<div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="customRadioInline1" checked name="gender_user" class="custom-control-input" value="Nam">
  <label class="custom-control-label" for="customRadioInline1">Nam</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="gender_user" class="custom-control-input" value="Nữ">
  <label class="custom-control-label" for="customRadioInline2">Nữ</label>
</div>
		<div class="form-group">
			<label for="">Ngày sinh</label>
			<input class="form-control" type="date" name="birthday" value="{{Auth::user()->birthday}}"/>
		</div>
		<div class="form-group">
			<label for="avatar">Ảnh đại diện (< 1 MB)</label>
			<input id="avatar" class="form-control-file" type="file" name="imgAvatar"/>
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-md" name="btn_submit" type="submit">Cập nhật</button>
		</div>
	</form>
	<script type="text/javascript">
			CKEDITOR.replace( 'content' );
		</script>
		@endsection
		@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/effect.jquery"></script>
@endsection
		@section('title')
Cập nhật thông tin
	@endsection