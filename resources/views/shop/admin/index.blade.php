@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" class="pl-3" height="60px" style="object-fit:contain;"/>
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
<div class="container-fluid padding p-0">
	<a href="admin/dashboard/them-san-pham"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-tshirt fa-7x text-info w-100 mb-2"></i>Thêm sản phẩm</div></a>
	<a href="admin/dashboard/them-danh-muc"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-clipboard-list fa-7x text-info w-100 mb-2"></i> Thêm danh mục</div></a>
	<a href="admin/dashboard/ma-giam-gia"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-ticket-alt fa-7x text-info w-100 mb-2"></i> Mã giảm giá</div></a>
	<a href="admin/dashboard/quan-ly-san-pham"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-cubes fa-7x text-info w-100 mb-2"></i>Quản lý sản phẩm</div></a>
	<a href="admin/dashboard/quan-ly-khach-hang"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-users-cog fa-7x text-info w-100 mb-2"></i>Quản lý khách hàng</div></a>
	<a href="admin/dashboard/quan-ly-thanh-vien"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-users fa-7x text-info w-100 mb-2"></i>Quản lý thành viên</div></a>
	<a href="admin/dashboard/blog"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-blog fa-7x text-info w-100 mb-2"></i> Blog</div></a>
	<a href="admin/dashboard/danh-gia-tu-khach-hang"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-comments fa-7x text-info w-100 mb-2"></i> Đánh giá từ khách hàng</div></a>
	<a href="admin/dashboard/cap-nhat-tai-khoan"><div class="col-lg-3 col-md-6 col-sm-12 d-inline-block border item-option p-2 text-center"><i class="fas fa-user-edit fa-7x text-info w-100 mb-2"></i> Cập nhật tài khoản</div></a>
	
</div>
@if(count($bill) > 0)
	<div id="notice">
	<div class="col-lg-6 col-md-12 colsm-12 bg-light mt-4 mx-auto p-2">
		<h2 class="display-4" style="font-size:36px;">Thông báo</h2>
		<hr/>
		<p>Bạn đang có {{count($bill)}} đơn hàng mới !</p>
		<hr/>
		<a href="javascript:void(0)" class="btn btn-outline-info" onclick ="closeNotice()">Đóng</a>
		<a class="btn btn-info" href="admin/bills">Xử lý đơn</a>
	</div>
	</div>
	@endif
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script>
        function closeNotice(){
		document.getElementById('notice').style.display = "none";
	}
</script>
@endsection
@section('title')
Admin
@endsection