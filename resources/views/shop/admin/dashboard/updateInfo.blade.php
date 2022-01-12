@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" height="50px" style="object-fit:contain;"/>
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
	<div class="col-12 p-0">
			<a class="option col-12 " href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản phẩm</a>
			<a class="option col-12 " href="admin/dashboard/them-danh-muc"><i class="fas fa-clipboard-list"></i> Thêm danh mục</a>
			<a class="option col-12 " href="admin/dashboard/ma-giam-gia"><i class="fas fa-ticket-alt"></i> Mã giảm giá</a>
			<a class="option col-12 " href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản phẩm</a>
			<a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý khách hàng</a>
			<a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
			<a class="option col-12 " href="admin/dashboard/blog"><i class="fas fa-blog"></i> Blog</a>
			<a class="option col-12 " href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá từ khách hàng</a>
			<a class="option col-12 active" href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a>
			<a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
	</div>
		@endsection
@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
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