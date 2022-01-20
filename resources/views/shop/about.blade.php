@extends('layout.layout_master')
@section('content')
<style>
	body {
		background-image: url(https://images.unsplash.com/photo-1579548122080-c35fd6820ecb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80);
		background-size: cover;
		background-attachment: fixed;
		background-position: center;
	}
</style>
<div class="container-fluid padding p-4 thanks-notice">
	<blockquote class="col-lg-6 col-md-6 col-sm-12 text-white quotes float-left">
		"TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi."
	</blockquote>
	<div class="col-lg-6 col-md-6 col-sm-12 float-left">
		<img class="col-12 mx-auto" src="image/logo1.png" height="300px" style="object-fit:contain;" />
	</div>
</div>
<div class="container-fluid padding text-center p-2 text-light">
	<div class="profile col-lg-4 col-md-12 col-sm-12 my-2 float-left">
		<div class="background">
			<img class="img-mem" src="./image/ceo.jpg" width="100px" height="100px" alt="" />
		</div>
		<div class="col-12">
			<h2 class="card-title-info ml-4">Lê Quốc An</h2>
			<p class="card-text">CEO</p>
		</div>
	</div>
	<div class="profile col-lg-4 col-md-12 col-sm-12 my-2 float-left">
		<div class="background">
			<img class="img-mem" src="image/me.jpg" width="100px" height="100px" alt="" />
		</div>
		<div class="col-12">
			<h2 class="card-title-info ml-4">Nguyễn Mạnh Tuấn</h2>
			<p class="card-text">Nhà phát triển - Developer for TAT</p>
		</div>
	</div>
	<div class="profile col-lg-4 col-md-12 col-sm-12 my-2 float-left">
		<div class="background">
			<img class="img-mem" src="image/marketing.jpg" width="100px" height="100px" alt="" />
		</div>
		<div class="col-12">
			<h2 class="card-title-info ml-4">Nguyễn Trung Thật</h2>
			<p class="card-text">Marketing</p>
		</div>
	</div>
</div>
@endsection

@section('title')
Về Chúng Tôi - TAT SHOP
@endsection

@section('seo')
<meta property="og:url" content="{{asset('')}}ve-chung-toi">
<meta property="og:type" content="article">
<meta property="og:title" content="Về chúng tôi - TAT SHOP">
<meta property="og:keyword" content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp, tat shop" />
<meta property="og:description" content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi">
<meta property="og:image" content="image/tat.jpg">
@endsection