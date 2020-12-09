@extends('layout.layout_admin')
@section('dashboard')
<div class="col-12">
	<a class="close" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
	<a class="option col-12 " href="admin"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</a>
	<a class="option col-12 active" href="admin/bills"><i class="fas fa-truck"></i> Đơn đặt hàng</a>
	<a class="option col-12 " href="admin/bao-mat"><i class="fas fa-shield-alt"></i> Bảo mật</a>
	<a class="option col-12 " href="logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<h2 class="display-4" style="font-size:36px">Đơn đặt hàng</h2>
@if(session('notice'))
	<p class="alert alert-success">{{session('notice')}}</p>
@endif
@if(count($bills) > 0)
	@foreach($bills as $bill)
		<div class="col-lg-3 col-md-6 col-sm-12 border p-2 float-left m-1 clearfix" style="height:auto">
			<img src="https://has.edu.vn/upload/news/brand/51.2019/user-roles-wordpress.png" width="100%" height="200px" style="object-fit:cover;object-position:center;"/>
			<div class="col-12">
				<p class="mb-1" style="font-size:22px">{{$bill->customer}}</p>
				<p class="mb-1"><i class="fas fa-phone text-info"></i> {{$bill->phone}}</p>
				<p class="mb-1"><i class="fas fa-home"></i> {{$bill->address}}</p>
				<p class="mb-1"><i class="fas fa-envelope text-warning"></i> {{$bill->email}}</p>
				<p class="mb-1"><i class="fas fa-money-bill text-success"></i> {{number_format($bill->total)}}đ</p>
				<p class="mb-1">Trạng thái: {{$bill->stt}}</p>
				<div class="col-12 p-0" style="height:50px;">
				@if($bill->stt == "Chờ xác nhận")
				<a class="btn btn-outline-info float-left m-1" href="admin/bills/{{$bill->id}}">Xác nhận đơn</a>
			@endif
				@if($bill->stt == "Đã xác nhận" && $bill->stt != "Chờ xác nhận")
				<a class="btn btn-outline-success float-left m-1" href="admin/bills/shipping/{{$bill->id}}"><i class="fas fa-truck"></i> Vận chuyển ngay</a>
			@elseif($bill->stt == "Đang giao")
				<a class="btn btn-outline-success float-left m-1" href="admin/bills/shipping/{{$bill->id}}">Xác nhận đã giao</a>
			@endif
				</div>
				@if($bill->email != null)
				<a class="btn btn-warning" href="send-mail/{{$bill->id}}">Gửi mail</a>
				@endif
			</div>
		</div>
@endforeach
	@else
		<p class="text-center">Chưa có đơn đặt hàng nào</p>
	@endif
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
@endsection
@section('title')
Đơn đặt hàng
@endsection