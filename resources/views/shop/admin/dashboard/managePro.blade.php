@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" height="50px" style="object-fit:contain;" />
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12 p-0">
	<a class="option col-12 " href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/them-danh-muc"><i class="fas fa-clipboard-list"></i> Thêm danh mục</a>
	<a class="option col-12 " href="admin/dashboard/ma-giam-gia"><i class="fas fa-ticket-alt"></i> Mã giảm giá</a>
	<a class="option col-12 active" href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản phẩm</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành viên</a>
	<a class="option col-12 " href="admin/dashboard/blog"><i class="fas fa-blog"></i> Blog</a>
	<a class="option col-12 " href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá từ khách hàng</a>
	<a class="option col-12 " href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a>
	<a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
	<h2 class="display-4" style="font-size:36px;">Quản lý sản phẩm</h2>
	@if(session('notice'))
	<p class="alert alert-success">{{session('notice')}}</p>
	@endif
	<form action="admin/dashboard/discounts" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="form-group">
			<label for="_discount">Giảm giá toàn sản phẩm: </label>
			<input id="_discount" type="number" class="form-control" name="_discount" min="0" max="100" value="0" />
		</div>
		<button class="btn btn-outline-info mb-4" name="_update">Cập nhật</button>
	</form>
	<form method="get">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
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
				<th scope="col">Danh mục</th>
				<th scope="col">Loại</th>
				<th scope="col">Giá</th>
				<th scope="col">Giảm giá</th>
				<th scope="col">Size</th>
				<th scope="col">Màu</th>
				<th scope="col">Kho</th>
				<th scope="col">Thao Tác</th>
				<th scope="col">Link order</th>
			</tr>
		</thead>
		<tbody id="__product">
			<?php
			$i = 0;
			?>
			@if($_product != null)
			@foreach($_product as $product)
			<tr onmouseover="Img(<?php echo $i; ?>)" onmouseout="outImg(<?php echo $i; ?>)">
				<img class="thumbnail" src="{{$product->thumbnail}}" width="300px" style="object-fit: cover;" />
				<th scope="row">{{$product->id}}</th>
				<td class="info-product">{{$product->title}}</td>
				<td>{{$product->category->category}}</td>
				<td>{{$product->subcategory->sub_category}}</td>
				<td>{{number_format($product->price)}}đ</td>
				<td>- {{$product->discount}}%</td>
				<td>
					<?php
					if (!empty($product->attr)) {
						$data = $product->attr;
						foreach ($data as $size) {
							echo $size->name == "size" ? $size->value . ", " : null;
						}
					}
					?>
				</td>
				<td>
					<?php
					if (!empty($product->attr)) {
						$data = $product->attr;
						foreach ($data as $color) {
							echo $color->name == "color" ? $color->value . ", " : null;
						}
					}
					$i++;
					?>
				</td>
				<td>{{$product->qty}}</td>
				<td>
					<a href="admin/dashboard/edit/{{$product->id}}" class="btn btn-outline-info rounded-0">Edit <i class="far fa-edit"></i></a></a>
					<button class="btn btn-danger rounded-0" data-toggle="modal" data-target="#exampleModal_{{$product->id}}">Xóa <i class="far fa-trash-alt"></i></button>
				</td>
				<td><a class="btn btn-success rounded-0" href="{{$product->order_link}}" target="_blank">Order now</a></td>
			</tr>
			<div class="modal fade" id="exampleModal_{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa sản phẩm</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Hành động này sẽ xóa sản phẩm khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn muốn xóa sản phẩm của <strong>{{$product->title}}</strong>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
							<a href="admin/dashboard/delete/{{$product->id}}"><button type="button" class="btn btn-danger">Xóa ngay</button></a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<p class="text-center">Chưa có sản phẩm nào</p>
			@endif
		</tbody>
	</table>
</div>
@endsection
@section('title')
Quản lý sản phẩm
@endsection