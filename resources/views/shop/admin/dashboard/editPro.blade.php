@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<div class="container-fluid padding p-0">
	<h2 class="display-4" style="font-size:36px;">Chỉnh sửa sản phẩm</h2>
	<hr />
	@if(count($errors)>0)
	@foreach($errors->all() as $err)
	<p class="alert alert-danger">{{$err}}</p>
	@endforeach
	@endif
	@if(session('notice'))
	<p class="alert alert-success">{{session('notice')}}</p>
	@endif
	<form action="admin/dashboard/edit/{{$id}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="form-group">
			<label for="">Tên sản phẩm</label>
			<input class="form-control" type="text" name="title" value="{{$product->title}}" />
		</div>
		<div class="form-group">
			<label for="">Danh mục</label>
			<select id="cate" class="form-control" name="id_category">
				<option value="{{$product->id_category}}">{{$product->category->category}}</option>
				@foreach($category as $cate)
				<option value="{{$cate->id_category}}">{{$cate->category}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="">Loại</label>
			<select id="sub_category" class="form-control" name="id_subcategory">
				<option>_______ Chọn loại sản phẩm _______</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Loại liên quan</label>
			<input class="form-control" name="id_relate" type="text" value="{{$product->id_relate}}" />
		</div>
		<div class="form-group">
			<label for="">Mô tả sản phẩm</label>
			<textarea id="content" class="form-control" name="content">{{$product->content}}</textarea>
		</div>
		<div class="form-group">
			<label for="">Link đặt hàng</label>
			<input class="form-control" type="text" name="order_link" placeholder="Nhập link để đặt sản phẩm" value="{{$product->order_link}}" />
		</div>
		<div class="form-group">
			<label for="">Giá</label>
			<input class="form-control" type="number" min="1000" name="price" value="{{$product->price}}" />
		</div>
		<div class="form-group">
			<label for="">Số lượng</label>
			<input class="form-control" type="number" min="0" name="qty" value="{{$product->qty}}" />
		</div>
		<div class="form-group">
			<label for="">Giảm giá (nếu có)</label>
			<input class="form-control" type="number" min="0" name="discount" value="{{$product->discount}}" />
		</div>
		<div class="form-group">
			<label for="">Từ khóa</label>
			<input class="form-control" type="text" name="keyword" placeholder="Nhập từ khóa cho sản phẩm" value="{{$product->keyword}}" />
		</div>
		<div class="form-group" id="size">
			<label for="">Size - Cỡ</label>
			<?php
			if (isset($product->attr)) {
				$data = $product->attr;
				foreach ($data as $size) {
					if ($size->name == "size") {
						echo '<input class="form-control mt-2" type="text" name="size[]" value="' . $size->value . '"/>';
					}
				}
			} else {
				echo '<input class="form-control mt-2" type="text" name="size[]"/>';
			}
			?>


		</div>
		<button id="btnSize" class="btn btn-info btn-md">Thêm Size</button>
		<hr />
		<div class="form-group" id="color">
			<label for="">Màu</label>
			<?php
			if (isset($product->attr)) {
				$data = $product->attr;
				foreach ($data as $color) {
					if ($color->name == "color") {
						echo '<input class="form-control mt-2" type="text" name="color[]" value="' . $color->value . '"/>';
					}
				}
			} else {
				echo '<input class="form-control" type="text" name="color[]"/>';
			}
			?>
		</div>
		<button id="btnColor" class="btn btn-info btn-md">Thêm Màu</button>
		<hr />
		<div class="form-group" id="img">
			<label for="">Ảnh đại diện sản phẩm</label>
			<input class="form-control mt-2" type="text" name="thumbnail" placeholder="Nhập link hình ảnh" value="{{$product->thumbnail}}" />
		</div>
		<hr />
		<div class="form-group" id="photo">
			<label for="">Ảnh sản phẩm</label>
			<?php
			if (isset($product->image)) {
				$data = $product->image;
				foreach ($data as $image) {
					echo '<input class="form-control mt-2" type="text" name="image[]" placeholder="Nhập link hình ảnh" value="' . $image->image . '"/>';
				}
			} else {
				echo '<input class="form-control mt-2" type="text" name="image[]" placeholder="Nhập link hình ảnh" value=""/>';
			}
			?>

		</div>
		<button id="btnAdd" class="btn btn-info btn-md">Thêm link ảnh</button>
		<hr>
		<button type="submit" class="btn btn-danger btn-md">Cập nhật</button>
	</form>
</div>
@endsection
@section('script')
<script>
	CKEDITOR.replace('content')
</script>
@endsection
@section('title')
Chỉnh sửa sản phẩm
@endsection