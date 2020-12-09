@extends('layout.layout_master')
@section('content')
<div class = "container-fluid padding detail mt-4">
@if(session('notice'))
<div class="alert alert-success">
  <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
  {{session('notice')}}
</div>
@endif
@if(session('danger'))
<div class="alert alert-danger">
  <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
  {{session('danger')}}
</div>
@endif
@if(count($errors) > 0)
		@foreach($errors->all() as $err)
			<p class="alert alert-danger">{{ $err }}</p>
			@endforeach
		@endif
	<div class="col-lg-7 col-md-6 col-sm-12 cart-info border float-left">
		@if(count($cart)>0)
			@foreach($cart as $item)
		<div class="shop-cart col-12 position-relative">
			<img class="col-4 img-cart float-left" src="{{$item->attributes->img}}" height="200px"/>
			<div class="col-8 float-left">
			<div class="close-icon">
			<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times text-info"></i></a>
</div>
			<p style="font-size:24px">{{$item->name}}</p>
			<p>{{$item->attributes->size}}, {{$item->attributes->color}}</p>
			<p>{{number_format($item->price)}}đ x {{$item->quantity}}</p>
			</div>
		</div>
		<hr style="clear:both;"/>
		
		<!--MODAL FORM-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo từ TAT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắc muốn bỏ sản phẩm này khỏi giỏ hàng ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <a href="cart/delete/{{$item->id}}"><button type="button" class="btn btn-info">Đồng ý</button></a>
      </div>
    </div>
  </div>
</div>
		@endforeach
		<a class="btn btn-warning m-2 text-white" href="cart/cancel">Xóa giỏ hàng <i class="fas fa-trash-alt"></i></a>
		@else
			<p class="text-center">Chưa có sản phẩm nào trong giỏ hàng</p>
			@endif
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12 cart-paymentborder border float-right m-1">
		<div class="col-12">
			<h2 class="display-4 text-center" style="font-size:32px;">Đơn giá</h2>
			<hr/>
			@if(count($cart)<= 0)
				<p class="text-center">Hiện giỏ hàng trống</p>
			@endif
			<form action="cart" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			@foreach($cart as $item)
			<div class="col-12 p-0 clearfix">
				<p class="col-6 p-0 float-left text-left">{{$item->name}}</p>
				<p class="col-6 p-0 float-left text-right">{{number_format($item->price)}}đ</p>
                                <p class="col-6 float-right text-right">x{{$item->quantity}}</p>
			</div>
			<input type="hidden" name="name[]" value="{{$item->name}}"/>
			<input type="hidden" name="attr[]" value="{{$item->attributes->size}},{{$item->attributes->color}}"/>
			<input type="hidden" name="price[]" value="{{$item->price}}"/>
			<input type="hidden" name="qty[]" value="{{$item->quantity}}"/>
			@endforeach
			<hr/>
			<div class="form-group">
				<label for="fullname">Họ tên</label>
				<input id="fullname" class="form-control" type="text" name="customer" placeholder="Nguyễn Văn A" />
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại</label>
				<input id="phone" class="form-control" type="text" name="phone" placeholder="037xxxxx24" />
			</div>
			<div class="form-group">
				<label for="address">Địa chỉ</label>
				<input id="address" class="form-control" type="text" name="address" placeholder="Số nhà/hẻm, tên đường, phường/xã, quận/huyện, tỉnh/thành phố" />
			</div>
			<div class="form-group">
				<label for="email">Email (Nếu có)</label>
				<input id="email" class="form-control" type="email" name="email" placeholder="mail@example.com" />
			</div>
			<hr/>
			<p>(Chưa bao gồm phí vận chuyển) - Thanh toán tại nhà</p>
                        <i>*Miễn phí vận chuyển đối với nội thành TP Hồ Chí Minh</i>
                        <p>Tạm tính: <strong><i>{{number_format(Cart::getTotal())}}</i><u>đ</u></strong></p>
                        <p>Giảm giá: 
                        <h3>
                        @if(Cart::getTotal() > 200000 && Cart::getTotal() < 500000)
                        {{number_format(Cart::getTotal()*0.05)}}đ| -5%
                        @elseif(Cart::getTotal() > 500000)
                        <i>{{number_format(Cart::getTotal()*0.1)}}đ| -10%</i>
                        @else
                        <i>0%</i>
                        @endif
                        </h3>
                        </p>
			<p>Thành tiền: 
                        <h3>
                        @if(Cart::getTotal() > 200000 && Cart::getTotal() < 500000)
                        <i>{{number_format(Cart::getTotal() - Cart::getTotal()*0.05)}}</i><u>đ</u>
                        @elseif(Cart::getTotal() > 500000)
                                <i>{{number_format(Cart::getTotal() - Cart::getTotal()*0.1)}}</i><u>đ</u>
                        @else
                                <i>{{number_format(Cart::getTotal())}}</i><u>đ</u>
                        @endif
                        </h3></p>
			<button class="btn btn-danger w-100 mb-2">Đặt hàng ngay</button>
			</form>
		</div>
	</div>
</div>
@endsection

@section('title')
Giỏ hàng của bạn
@endsection