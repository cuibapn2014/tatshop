@extends('layout.layout_master')
@section('content')

<h2 class="display-4 updated_banner text-center">SẢN PHẨM</h2>
<hr/>

<div class = "container-fluid padding">
@if(count($product) > 0)
	@foreach($product as $pro)
	<div class="card col-lg-2 col-md-4 col-sm-12 p-0 m-1 float-left">
	@if($pro->discount > 0)
		<span class="discount">-{{$pro->discount}}%</span>
		@endif
		<img src="{{$pro->thumbnail}}" class="card-img thumbnail"/>
		<p class="card-title p-1">{{$pro->title}}</p>
		<p class="p-1">
		@if($pro->discount > 0)
		{{number_format($pro->price * (1-($pro->discount / 100)))}}<u>đ</u> | <s>{{number_format($pro->price)}}<u>đ</u></s>
			@else
				{{number_format($pro->price)}}<u>đ</u>
				@endif
		</p>
		<p class="p-1 act">
                <a class="btn btn-info" href="san-pham/{{$pro->id}}/{{$pro->_link}}">Chi tiết</a>
                <a class="btn btn-warning" href="add-cart/{{$pro->id}}">Thêm vào giỏ <i class="fas fa-shopping-bag"></i></a>
                </p>
	</div>
	@endforeach
	{!!$product->links()!!}
	@else
		<p class='text-center'>Chưa có sản phẩm nào</p>
	@endif
</div>
@endsection

@section('title')
Sản phẩm
@endsection
@section('seo')
<meta type="og:title" content="Sản phẩm - TAT SHOP"/>
<meta type="og:type" content="article"/>
<meta type="og:content" content="Cửa hàng quần áo trực tuyến tại TP Hồ Chí Minh"/>
<meta type="og:image" content="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80"/>
@endsection