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
	<a class="option col-12 active" href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
	<a class="option col-12 " href="admin/dashboard/blog"><i class="fas fa-blog"></i> Blog</a>
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
	   @if($u->id != 1 && Auth::user()->id == 1)
	  <td>
		  <a class="btn btn-outline-info rounded-0" href="admin/dashboard/edit-user/{{$u->id}}">Edit <i class="far fa-edit"></i></a>  
		  <button class="btn btn-danger rounded-0" data-toggle="modal" data-target="#exampleModal_{{$u->id}}">Xóa <i class="far fa-trash-alt"></i></button></td>
   @else
	   <td></td>
   @endif
   </tr>
   <div class="modal fade" id="exampleModal_{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa thành viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Hành động này sẽ xóa thành viên khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn muốn xóa <strong>{{$u->name}}</strong>? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <a href="admin/dashboard/delete/{{$u->id}}"><button type="button" class="btn btn-danger">Xóa ngay</button></a>
      </div>
    </div>
  </div>
</div>
	@endforeach
  </tbody>
</table>
	</div>
@endsection
@section('title')
Quản lý thành viên
@endsection