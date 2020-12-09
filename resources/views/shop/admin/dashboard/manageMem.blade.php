@extends('layout.layout_admin')
@section('dashboard')
<div class="col-12">
	<a class="close" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
	<a class="option col-12 " href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý khách hàng</a>
	<a class="option col-12 active" href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
	<a class="option col-12 " href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá từ khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a>
	<a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Quản lý thành viên</h2>
		@if(session('notice'))
			<p class="alert alert-success">{{session('notice')}}</p>
			@endif
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên quản trị viên</th>
      <th scope="col">Email</th>
	  <th scope="col">Ngày sinh</th>
	  <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>

  @foreach($user as $u)
    <tr>
      <th scope="row">{{$u->id}}</th>
      <td>{{$u->name}}</td>
      <td>{{$u->email}}</td>
	   <td>{{$u->birthday}}</td>
	   @if($u->id != 1)
	  <td><a href="admin/dashboard/edit-user/{{$u->id}}">Edit <i class="far fa-edit"></i></a> | <a href="admin/dashboard/delete-user/{{$u->id}}">Xóa <i class="far fa-trash-alt"></i></a></td>
   @else
	   <td></td>
   @endif
   </tr>
	@endforeach
  </tbody>
</table>
	</div>
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/effect.jquery"></script>
@endsection
@section('title')
Quản lý thành viên
@endsection