@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" height="50px" style="object-fit:contain;" />
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12 p-0">
    <a class="option col-12" href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản
        phẩm</a>
    <a class="option col-12 active" href="admin/dashboard/them-danh-muc"><i class="fas fa-clipboard-list"></i> Thêm danh
        mục</a>
    <a class="option col-12 " href="admin/dashboard/ma-giam-gia"><i class="fas fa-ticket-alt"></i> Mã giảm giá</a>
    <a class="option col-12 " href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản
        phẩm</a>
    <a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý
        khách hàng</a>
    <a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành
        viên</a>
    <a class="option col-12 " href="admin/dashboard/blog"><i class="fas fa-blog"></i> Blog</a>
    <a class="option col-12 " href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments"></i> Đánh giá
        từ khách hàng</a>
    <a class="option col-12 " href="admin/dashboard/cap-nhat-tai-khoan"><i class="fas fa-user-edit"></i> Cập nhật tài
        khoản</a>
    <a class="option col-12 " href="admin"><i class="fas fa-sign-out-alt"></i> Về trang chủ - Admin</a>
</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<div class="container-fluid padding p-0">
    <h2 class="display-4" style="font-size:36px;">Thêm danh mục</h2>
    <hr />
    @if(count($errors)>0)
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{$err}}</p>
    @endforeach
    @endif
    @if(session('notice'))
    <p class="alert alert-success">{{session('notice')}}</p>
    @endif
    <form action="admin/dashboard/them-danh-muc" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="form-group">
            <label for="">Danh mục mới</label>
            <input class="form-control" type="text" name="category" placeholder="Nhập tên danh mục" />
        </div>
        <div class="form-group">
            <label for="">Loại thuộc danh mục</label>
            <select class="form-control mb-1" name="old_category">
                @foreach($category as $cate)
                <option value="{{$cate->id}}">{{$cate->category}}</option>
                @endforeach
            </select>
            <input class="form-control" type="text" name="subcategory" placeholder="Nhập loại" />
        </div>

        <button type="submit" class="btn btn-danger btn-md">+ Thêm danh mục</button>
    </form>
    <hr />
    <h2 class="display-4" sytle="font-size:28px;">Quản lý danh mục</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $cate)
            <tr>
                <th scope="row">{{$cate->id}}</th>
                <td>{{$cate->category}}</td>
                <td>
                    <button class="btn btn-danger rounded-0" data-toggle="modal"
                        data-target="#exampleModal_{{$cate->id}}">Xóa <i class="far fa-trash-alt"></i></button>
                </td>
                
            </tr>
            <div class="modal fade" id="exampleModal_{{$cate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa danh mục sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Hành động này sẽ xóa danh mục khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn
                            muốn xóa <strong>{{$cate->category}}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="admin/dashboard/delete-category/{{$cate->id}}"><button type="button"
                                    class="btn btn-danger">Xóa ngay</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    <hr />
    <h2 class="display-4" sytle="font-size:28px;">Quản lý loại sản phẩm</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Loại</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>

            @foreach($sub as $sub)
            <tr>
                <th scope="row">{{$sub->id}}</th>
                <td>{{$sub->category->category}}</td>
                <td>{{$sub->sub_category}}</td>
                <td>
                    <button class="btn btn-danger rounded-0" data-toggle="modal"
                        data-target="#exampleModal_{{$sub->id}}">Xóa <i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            <div class="modal fade" id="exampleModal_{{$sub->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa loại sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Hành động này sẽ xóa loại sản phẩm khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn
                            muốn xóa <strong>{{$sub->sub_category}}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="admin/dashboard/delete-subcategory/{{$sub->id}}"><button type="button"
                                    class="btn btn-danger">Xóa ngay</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace('content')
</script>
@endsection
@section('title')
Thêm danh mục
@endsection