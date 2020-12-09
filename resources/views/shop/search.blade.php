@extends('layout.layout_master')
@section('content')

<h2 class="display-4 updated_banner text-center">Tìm kiếm sản phẩm</h2>
<hr/>
@if(session('notice'))
<div class="alert alert-success col-8 mx-auto">
  <span class="closebtn float-right" style="cursor:poiter;" onclick="this.parentElement.style.display='none';">&times;</span>
  {{session('notice')}}
</div>
@endif
<div class = "container-fluid padding">
@if(count($product) > 0)
	<p class="alert alert-secondary">Tìm thấy {{count($product)}} kết quả</p>
	@foreach($product as $product)
	<div class="card col-lg-2 col-md-4 col-sm-12 p-0 m-1 float-left">
	@if($product->discount > 0)
		<span class="discount">-{{$product->discount}}%</span>
		@endif
		<img src="{{$product->thumbnail}}" class="card-img thumbnail"/>
		<p class="card-title p-1">{{$product->title}}</p>
		<p class="p-1">
		@if($product->discount > 0)
		{{number_format($product->price * (1-($product->discount / 100)))}}<u>đ</u> | <s>{{number_format($product->price)}}<u>đ</u></s>
			@else
				{{number_format($product->price)}}<u>đ</u>
				@endif
		</p>
		<p class="p-1 act">
                <a class="btn btn-info" href="san-pham/{{$product->id}}/{{$product->_link}}">Chi tiết</a>
                <a class="btn btn-warning" href="add-cart/{{$product->id}}">Thêm vào giỏ <i class="fas fa-shopping-bag"></i></a>
                </p>
	</div>
	@endforeach
	@else
		<p class='text-center'>Không tìm thấy kết quả</p>
	@endif

</div>

@endsection

@section('title')
Home
@endsection