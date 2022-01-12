@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" class="pl-3" height="60px" style="object-fit:contain;" />
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12 pt-2 px-0">
	<a class="option col-12 active" href="admin"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</a>
	<a class="option col-12 " href="admin/bills"><i class="fas fa-truck"></i> Đơn đặt hàng</a>
	<a class="option col-12 " href="admin/analyze"><i class="far fa-chart-bar"></i> Phân tích</a>
	<a class="option col-12 " href="admin/bao-mat"><i class="fas fa-shield-alt"></i> Bảo mật</a>
	<a class="option col-12 " href="logout"><i class="bi bi-box-arrow-right"></i> Đăng Xuất</a>
</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid d-flex flex-row flex-wrap padding justify-content-between mt-5">
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt fa-7x text-info w-100 mb-2"></i>Thêm sản
			phẩm</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/them-danh-muc"><i class="fas fa-clipboard-list fa-7x text-info w-100 mb-2"></i> Thêm
			danh mục</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/ma-giam-gia"><i class="fas fa-ticket-alt fa-7x text-info w-100 mb-2"></i> Mã giảm
			giá</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cubes fa-7x text-info w-100 mb-2"></i>Quản
			lý sản phẩm</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog fa-7x text-info w-100 mb-2"></i>Quản lý khách hàng</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users fa-7x text-info w-100 mb-2"></i>Quản lý thành viên</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/blog"><i class="fas fa-blog fa-7x text-info w-100 mb-2"></i> Blog</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><a href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments fa-7x text-info w-100 mb-2"></i> Đánh giá từ khách
			hàng</a></div>
	<div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center">
		<a href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit fa-7x text-info w-100 mb-2"></i> Cập nhật tài
			khoản</a>
	</div>

</div>
@if(count($bill) > 0)
<div id="toast" class="p-2 position-absolute bg-primary text-white w-100 flex-row flex-nowrap justify-content-between" style="left: 0; top:0;display:flex;">
	<p class="m-0">Hiện đang có {{count($bill)}} đơn hàng chờ xử lý!</p>
	<div class="optimize">
		<button class="btn btn-danger text-white process">Xử lý ngay</button>
		<button class="btn btn-light close-toast">Đóng</button>
	</div>

</div>
@endif
@endsection
@section('script')
<script>
	$(document).ready(() => {
		$(".close-toast").click(() => {
			$("#toast").fadeOut();
		});
		
		$(".process").click(() => {
			location.href = "admin/bills";
		});
	});
</script>
@endsection
@section('title')
Admin
@endsection