@extends('layout.layout_user')
@section('display')
<a href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
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
	<form class="col-12" action="user" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="form-group">
			<label for="title">Tên</label>
			<input id="title" class="form-control" name="fullname" placeholder="Nhập tên"
				value="{{Auth::user()->name}}" size="50" />
		</div>
		<div class="form-group">
			<label for="phone">Số điện thoại</label>
			<input id="phone" class="form-control" name="phone" placeholder="Nhập số điện thoại"
				value="{{Auth::user()->phone}}" size="10" />
		</div>
		<div class="form-group">
			@if(Auth::user()->address != "")
			<p>Địa chỉ nhận hàng hiện tại: {{Auth::user()->address}}</p>
			@else
			<p>Địa chỉ nhận hàng hiện tại: Chưa có</p>
			@endif
		</div>
		<div class="form-group">
			<label for="">Quận/Huyện <label>
					<select id="district" name="district" class="form-control">
						@foreach($district as $dis)
						<option value="{{$dis->id}}">{{$dis->district}}</option>
						@endforeach
					</select>
		</div>
		<div class="form-group">
			<label for="ward">Phường/Xã <label>
					<select id="ward" name="ward" class="form-control">
						<option>_________ Chọn Phường/Xã _________</option>
					</select>
		</div>
		<div class="form-group">
			<label for="address">Địa chỉ nhận hàng</label>
			<input id="address" class="form-control" name="address" placeholder="Số nhà, tên đường" />
		</div>
		<div class="form-group">
			<label for="">Emai</label>
			<input class="form-control" readonly value="{{Auth::user()->email}}" size="255" />
		</div>
		<p>Giới tính</p>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" id="customRadioInline1" checked name="gender_user" class="custom-control-input"
				value="Nam">
			<label class="custom-control-label" for="customRadioInline1">Nam</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" id="customRadioInline2" name="gender_user" class="custom-control-input" value="Nữ">
			<label class="custom-control-label" for="customRadioInline2">Nữ</label>
		</div>
		<div class="form-group">
			<label for="">Ngày sinh</label>
			<input class="form-control" type="date" name="birthday" value="{{Auth::user()->birthday}}" />
		</div>
		<div class="form-group">
			<label for="avatar">Ảnh đại diện (< 1 MB)</label>
					<input id="avatar" class="form-control-file" type="file" name="imgAvatar" />
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-md" name="btn_submit" type="submit">Cập nhật</button>
		</div>
	</form>
	@endsection
	@section('script')
	<script type="text/javascript" src="js/effect.js"></script>
	<script type="text/javascript" src="js/effect.jquery"></script>
	<script>
		jQuery(document).ready(function ($) {
			$('#district').change(function (event) {
				var district = $('#district').val();
				$.get('ajax/' + district, function (data) {
					$('#ward').html(data);
				});
			});
		});
	</script>
	@endsection
	@section('title')
	Thành viên
	@endsection