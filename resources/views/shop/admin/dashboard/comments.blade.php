@extends('layout.layout_admin')
@section('dashboard')
<div class="col-12">
	<a class="close" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
	<a class="option col-12 " href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
	<a class="option col-12 active" href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá từ khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a>
	<a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Đánh giá từ khách hàng</h2>
		@if(session('notice'))
			<p class="alert alert-success">{{session('notice')}}</p>
			@endif
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID Sản phẩm</th>
	   <th scope="col">Sản phẩm</th>
      <th scope="col">Khách hàng</th>
      <th scope="col">Email</th>
	  <th scope="col">Nội dung</th>
	  <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
@if(count($reply) > 0)
  @foreach($reply as $rep)
    <tr>
      <th scope="row">{{$rep->reply}}</th>
      <td>{{$rep->product->title}}</td>
      <td>{{$rep->user->name}}</td>
	   <td>{{$rep->user->email}}</td>
	   <td>{{$rep->content}}</td>
	  <td><a href="admin/dashboard/delete-comments/{{$rep->id}}">Xóa <i class="far fa-trash-alt"></i></a></td>
   </tr>
	@endforeach
	@endif
  </tbody>
</table>
	</div>
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/effect.jquery"></script>
@endsection
@section('title')
Đánh giá từ khách hàng
@endsection