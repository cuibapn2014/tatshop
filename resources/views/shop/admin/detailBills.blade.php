@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<h2 class="display-4" style="font-size:36px">Chi tiết đơn hàng của {{$bill->customer}}</h2>
@foreach($detail as $pay)
	<div class="col-12 p-2 mb-2 d-flex flex-row flex-nowrap" style="height:200px">
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