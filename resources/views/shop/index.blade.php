@extends('layout.layout_master')
@section('content')

<h2 class="display-4 updated_banner text-center">MỚI CẬP NHẬT</h2>
<hr/>
@if(session('notice'))
<div class="alert alert-success col-8 mx-auto">
  <span class="closebtn float-right" style="cursor:poiter;" onclick="this.parentElement.style.display='none';">&times;</span>
  {{session('notice')}}
</div>
@endif
<div class = "container-fluid padding">
@if(count($product) > 0)
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
                <!--<a class="btn btn-info" href="san-pham/{{$product->id}}/{{$product->_link}}">Chi tiết</a>-->
                <a class="btn btn-warning btn-md" href="san-pham/{{$product->id}}/{{$product->_link}}">Mua ngay <i class="fas fa-shopping-bag"></i></a>
                <!--<a class="btn btn-warning btn-md" href="add-cart/{{$product->id}}">Mua ngay <i class="fas fa-shopping-bag"></i></a>-->
                </p>
	</div>
	@endforeach
	<div class="container-fluid padding text-center" style="clear:both;">
	<a class="btn btn-outline-info btn-lg col-6 my-2 text-center" href="san-pham">Xem tất cả</a>
</div>
	@else
		<p class='text-center'>Chưa có sản phẩm nào</p>
	@endif

</div>

@endsection

@section('title')
TAT Shop - Cửa hàng quần áo trực tuyến tại Hồ Chí Minh
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}">
<meta property="og:type" content="article">
<meta property="og:title" content="Cửa hàng quần áo trực tuyến tại Hồ Chí Minh">
<meta property="og:keyword" content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp"/>
<meta property="og:description" content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi."/>
<meta property="og:image" content="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80">
@endsection