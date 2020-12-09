@extends('layout.layout_admin')
@section('dashboard')
<div class="col-12">
	<a class="close" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
	<a class="option col-12 " href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản phẩm</a>
	<a class="option col-12 active" href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
	<a class="option col-12 " href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá từ khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a>
	<a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
	</div>
@endsection

@section('display')
<a href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
<h2 class="display-4" style="font-size:36px;">Quản lý sản phẩm</h2>
		@if(session('notice'))
			<p class="alert alert-success">{{session('notice')}}</p>
			@endif
                        <form action="admin/dashboard/discounts" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="form-group">
					<label for="_discount">Giảm giá toàn sản phẩm: </label>
					<input id="_discount" type="number" class="form-control" name="_discount" min="0" max="100" value="0"/>
				</div>
				<button class="btn btn-outline-info mb-4" name="_update">Cập nhật</button>
			</form>
                        <form method="get">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="form-group">
					<label for="_product">Tìm kiếm sản phẩm: </label>
					<input id="_product" type="text" class="form-control" name="_product" value="" placeholder="Áo thun, quần,..." />
				</div>
			</form>
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên Sản Phẩm</th>
	  <th scope="col">Giá</th>
      <th scope="col">Giảm giá</th>
	  <th scope="col">Size</th>
      <th scope="col">Màu</th>
	  <th scope="col">Kho</th>
	  <th scope="col">Thao Tác</th>
    </tr>
  </thead>
  <tbody id="__product">
  <?php
  	$i = 0;
  	?>
  @if($_product != null)
   @foreach($_product as $product)
    <tr>
      <img class="thumbnail" src="{{$product->thumbnail}}" width="300px" style="object-fit: cover;"/>
      <th scope="row">{{$product->id}}</th>
      <td class="info-product" onmouseover="Img(<?php echo $i;?>)" onmouseout="outImg(<?php echo $i;?>)">{{$product->title}}</td>
	  <td>{{number_format($product->price)}}đ</td>
      <td>- {{$product->discount}}%</td>
	  <td>
	  <?php
	if(!empty($product->attr->size)){
		$data = $product->attr->size;
		$size = json_decode($data,true);
		foreach($size as $size){
			echo $size.", ";
		}
	}
	?>
	</td>
	  <td>
		<?php
			if(!empty($product->attr->color)){
		$data = $product->attr->color;
		$color = json_decode($data,true);
		foreach($color as $color){
			echo $color.", ";
			}
			}
			$i++;
	?>
	  </td>
	  <td>{{$product->qty}}</td>
	  <td><a href="admin/dashboard/edit/{{$product->id}}">Edit <i class="far fa-edit"></i></a></a> | <a href="admin/dashboard/delete/{{$product->id}}">Xóa <i class="far fa-trash-alt"></i></a></td>
    </tr>
	@endforeach
	@else
		<p class="text-center">Chưa có sản phẩm nào</p>
	@endif
  </tbody>
</table>
{{$_product->links()}}
	</div>
@endsection
@section('script')
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/effect.jquery"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
				$('#_product').change(function(event){
					var product = $('#_product').val();
					$.get('ajaxAdmin/' + product,function(data){
						$('#__product').html(data);
					});
			});
			});
</script>
@endsection
@section('title')
Quản lý sản phẩm
@endsection