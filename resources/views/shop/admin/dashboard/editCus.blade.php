@extends('layout.layout_admin')
@section('dashboard')
<div class="col-12">
	<a class="close" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
	<a class="option col-12 " href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản phẩm</a>
	<a class="option col-12 active" href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
	<a class="option col-12 " href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá từ khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a>
	<a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Chỉnh sửa khách hàng</h2>
		<form action="admin/dashboard/edit-user/{{$id}}" method="post">
		<p>Quyền hiện tại: {{$user->level}}</p>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<div class="form-check form-check-inline">
			<input id="cus" checked class="form-check-input" type="radio" name="permis" value="Khách hàng"/>
			<label for="cus" class="form-check-label">Khách hàng</label>
			</div>
			<div class="form-check form-check-inline">
			<input id="ad" class="form-check-input" type="radio" name="permis" value="Admin"/>
			<label for="ad" class="form-check-label">Admin</label>
			</div>
			<div class="form-group mt-2">
			<button class="btn btn-info" type="submit">Thay đổi</button>
			</div>
		</form>
		
	</div>
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/effect.jquery"></script>
@endsection
@section('title')
Chỉnh sửa khách hàng
@endsection