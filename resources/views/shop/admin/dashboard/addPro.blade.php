@extends('layout.layout_admin')
@section('dashboard')
<div class="col-12">
	<a class="close" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
	<a class="option col-12 active" href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
	<a class="option col-12 " href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá từ khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a>
	<a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Thêm sản phẩm</h2>
<hr/>
	@if(count($errors)>0)
		@foreach($errors->all() as $err)
		<p class="alert alert-danger">{{$err}}</p>
		@endforeach
		@endif
		@if(session('notice'))
			<p class="alert alert-success">{{session('notice')}}</p>
			@endif
	<form action="admin/dashboard/them-san-pham" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<div class="form-group">
			<label for="">Tên sản phẩm</label>
			<input class="form-control" type="text" name="product" placeholder="Nhập tên sản phẩm"/>
		</div>
		<div class="form-group">
			<label for="">Mô tả sản phẩm</label>
			<textarea id="content" class="form-control" name="content"></textarea>
		</div>
		<div class="form-group">
			<label for="">Giá sản phẩm</label>
			<input class="form-control" type="number" min="1000" name="price"/>
		</div>
		<div class="form-group">
			<label for="">Số lượng nhập</label>
			<input class="form-control" type="number" min="1" name="qty"/>
		</div>
		<div class="form-group">
			<label for="">Giảm giá (nếu có)</label>
			<input class="form-control" type="number" min="0" name="discount"/>
		</div>
		<div class="form-group" id="size">
			<label for="">Size - Cỡ</label>
			<input class="form-control" type="text" name="size[]" placeholder="Nhập size"/>
		</div>
		<button id="btnSize" class="btn btn-info btn-md">Thêm Size</button>
		<hr/>
		<div class="form-group" id="color">
			<label for="">Màu</label>
			<input class="form-control" type="text" name="color[]" placeholder="Nhập màu"/>
		</div>
		<button id="btnColor" class="btn btn-info btn-md">Thêm Màu</button>
		<hr/>
		<div class="form-group" id="img">
			<label for="">Ảnh đại diện sản phẩm</label>	
			<input class="form-control mt-2" type="text" name="thumbnail" placeholder="Nhập link hình ảnh"/>
			</div>
		<div class="form-group" id="photo">
			<label for="">Ảnh sản phẩm</label>		
			<input class="form-control mt-2" type="text" name="image[]" placeholder="Nhập link hình ảnh"/>
		</div>
		<button id="btnAdd" class="btn btn-info btn-md">Thêm link ảnh</button>	
		<hr>
		<button type="submit" class="btn btn-danger btn-md">+ Thêm sản phẩm</button>	
	</form>
	</div>
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/effect.jquery"></script>
<script>CKEDITOR.replace('content')</script>
@endsection
@section('title')
Admin
@endsection