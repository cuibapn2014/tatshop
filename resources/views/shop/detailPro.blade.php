@extends('layout.layout_master')
@section('content')
<div class = "container-fluid padding detail mt-4">
@if(session('danger'))
<div class="alert alert-danger">{{session('danger')}}</div>
@endif
	<div class="col-lg-6 col-md-12 col-sm-12 img-product float-left position-relative">
	<?php
	if(!empty($product->image->image)){
		$data = $product->image->image;
		$img = json_decode($data,true);
		$x = count($img);
		echo '<img id="img" class="img_pro" src="'.$img[$x-1].'" width="100%" height="400px"/>';;
	}
	?>
	<button class="preBut btn btn-secondary" id="previous" onclick="previousImg()"><i class="fas fa-chevron-left"></i></button>
	<div class="row border" id="row">
	<?php
	if(!empty($product->image->image)){
		$data = $product->image->image;
		$img = json_decode($data,true);
		$i = 0;
		foreach($img as $img){
		echo '<div class="column" style="left:'.($i*100 + 40).'px;">';
		echo '<img class="slide-img" src="'.$img.'" style="width:100%; cursor:pointer;" onclick="changeImg(this)" alt="The Woods">';
		echo '</div>';
		$i++;
		}
	}
	?>
	
		</div>
	<button class="nextBut btn btn-secondary" id="next" onclick="nextImg()"><i class="fas fa-chevron-right"></i></button>

	</div>
	<div class="col-lg-6 col-md-12 col-sm-12 border add-card float-left p-2">
		<div class="col-12 text-left"><h2 class="display-4" style="font-size:27px">{{$product->title}}</h2></div>
		<div class="col-12">
			<p class="mb-1">Kho: {{$product->qty}} | Đã bán: {{$product->sold}}</p>
			@if($product->discount > 0)
				<h2 class="display-4" style="font-size:24px;"><s>{{number_format($product->price)}}đ</s> | -{{$product->discount}}%</h2>
				@endif
		</div>
		<hr/>
		<div class="col-12 form-order">
		<form action="cart/add/{{$product->id}}" method="get">
		<div class="form-group">
			<?php
	if($product->attr->size != "[null]"){
		$data = $product->attr->size;
		$size = json_decode($data,true);
		echo "<label>Chọn Size</label>: ";
		echo "<select name='size'>";
		foreach($size as $size){
		echo '<option value="'.$size.'">'.$size.'</option>';
		}
		echo "</select>";
	}
	?>
	</div>
	<div class="form-group">
	<?php
	if($product->attr->color != "[null]"){
		$data = $product->attr->color;
		$color = json_decode($data,true);
		echo "<label>Chọn Màu</label>:";
		foreach($color as $color){
		echo '<input id="'.$color.'" class="check-size" type="radio" name="color" value="'.$color.'"/>';
		echo "<label for='".$color."'><span class='text-center color'>".$color."</span></label>";
		}
	}
	?>
	</div>
	<div class="form-group">
	<label>Số lượng: </label>
	<input type="number" name="qty" class="form-control" min="1" max="{!!$product->qty!!}" value="1"/>
	</div>
	@if($product->discount > 0)
		<p class="display-4 text-info" style="font-size:32px;">{{number_format($product->price * (1 - ($product->discount/100)))}}<u>đ</u></p>
				@else
	<p class="display-4 text-info" style="font-size:32px;">{{number_format($product->price)}}<u>đ</u></p>
@endif
@if($product->qty > 0)
<div class="form-group">
	<button class="btn btn-info" type="submit">Mua ngay <i class="fas fa-cart-plus"></i></button>
</div>
@else
<div class="form-group">
	<a class="btn btn-secondary text-white">Hết hàng</a>
</div>
@endif
	</form>
		</div>
	</div>
        <div class="container-fluid col-lg-8 col-md-6 col-sm-12 p-0 float-left">
	<div class="col-12 p-1">
		<h2 class="display-4 mt-3" style="font-size:24px;clear:both;">Mô tả sản phẩm</h2>
		<hr/>
		<p class="text">
		{!!$product->content!!}
		</p>
	</div>
	<div class="col-12 p-0">
	<h2 class="display-4 mt-3" style="font-size:24px;clear:both;">Đánh giá từ khách hàng</h2>
		<hr/>
		@if(count($errors) >0)
			@foreach($errors->all() as $err)
			<p class="alert alert-danger">{{$err}}</p>
			@endforeach
			@endif
			@if(session('danger1'))
				<p class="alert alert-danger">{{session('danger1')}}</p>
				@endif
			@if(session('notice1'))
				<p class="alert alert-success">{{session('notice1')}}</p>
				@endif
		<div class="col-12">
			<form action="san-pham/{{$product->id}}/{{$product->_link}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<div class="form-group">
			<label for="comment">Viết đánh giá</label>
				<input id="comment" class="form-control" type="text" placeholder="Nhập đánh giá của bạn" name="comments"/>
				</div>
				<div class="form-group">
				<button class="btn btn-info" type="submit">Đăng</button>
				</div>
			</form>
			<hr/>
		</div>
		<div class="col-12">
		@if(count($reply)>0)
			@foreach($reply as $rep)
			<div class="media">
				  <img src="{{$rep->user->thumbnail}}" class="mr-3" width="64px" height="64px" style="object-fit:cover;" alt="...">
				  <div class="media-body">
					<h5 class="mt-0">{{$rep->user->name}}</h5>
					<p><i class="far fa-clock"></i> {{\Carbon\Carbon::parse($rep->created_at)->diffForHumans()}}</p>
						{{$rep->content}}
				  </div>
				</div>
				<hr/>
				@endforeach
				@else
					<p class="text-center">Chưa có đánh giá mới</p>
				@endif
		</div>
		</div>
                </div>
	<div class="col-lg-4 col-md-6 col-sm-12 p-0 float-left">
	<h2 class="display-4 mt-3" style="font-size:24px;clear:both;">Sản phẩm ngẫu nhiên</h2>
		<hr/>
	@if($random)
	@foreach($random->get() as $ran)
	<div class="col-12 p-0 m-1 ran-pro border">
		<img id="img-slide" src="{{$ran->thumbnail}}" onclick="slideImg()" class="card-img col-5 thumbnail float-left"/>
		<div class="col-6 float-left" style="height:100%;">
		<p class="card-title p-1" style="font-size:18px;">{{$ran->title}}</p>
		<p class="p-1">
		Giá:
		@if($ran->discount > 0)
		{{number_format($ran->price * (1-($ran->discount / 100)))}}<u>đ</u> | <s>{{number_format($ran->price)}}<u>đ</u></s>
			@else
				{{number_format($ran->price)}}<u>đ</u>
				@endif
		</p>
		<p class="p-1 act"><a class="add_cart btn btn-info" href="san-pham/{{$ran->id}}/{{$ran->_link}}">Xem chi tiết</a></p>
		</div>
	</div>
	@endforeach
	@endif
	</div>
</div>

@endsection
@section('script')
<script src="js/effect.js"></script>
@endsection
@section('title')
{{$product->title}}
@endsection

@section('seo')
<meta property="og:url" content="{{asset('')}}san-pham/{{$product->id}}/{{$product->_link}}" />
<meta property="og:type" content="article" />
<meta property="og:keyword" content="{{$product->title}}"/>
<meta property="og:title" content="{{$product->title}}" />
<meta property="og:image" content="{{$product->thumbnail}}" />
@endsection