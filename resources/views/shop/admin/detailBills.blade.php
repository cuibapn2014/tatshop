@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" class="pl-3" height="60px" style="object-fit:contain;"/>
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12">
	<a class="option col-12 " href="admin"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</a>
	<a class="option col-12 active" href="admin/bills"><i class="fas fa-truck"></i> Đơn đặt hàng</a>
	<a class="option col-12 " href="admin/bao-mat"><i class="fas fa-shield-alt"></i> Bảo mật</a>
	<a class="option col-12 " href="logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<h2 class="display-4" style="font-size:36px">Chi tiết đơn hàng của {{$bill->customer}}</h2>
@foreach($detail as $pay)
	<div class="col-12 border p-2 mb-2" style="height:200px">
		<img class="float-left" src="{{$pay->product->thumbnail}}" height="100%" style="object-fit:contain"/>
		<div class="float-left ml-4">
			<p>{{$pay->name}}</hp>
			<p>{{$pay->attr}}</p>
			<p>Giá: {{number_format($pay->price)}}đ</p>
			<p>Số lượng: x{{$pay->qty}}</p>
		</div>
	</div>
@endforeach
<a class="btn btn-info" href="admin/bills">Quay lại</a>
<a class="btn btn-warning" href="send-mail/{{$bill->id}}">Gửi mail hóa đơn</a>
@endsection
@section('title')
Chi tiết đơn hàng của {{$bill->customer}}
@endsection