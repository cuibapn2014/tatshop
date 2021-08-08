@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" height="50px" style="object-fit:contain;" />
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12 p-0">
    <a class="option col-12" href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản
        phẩm</a>
    <a class="option col-12 " href="admin/dashboard/them-danh-muc"><i class="fas fa-clipboard-list"></i> Thêm danh mục</a>
    <a class="option col-12 " href="admin/dashboard/ma-giam-gia"><i class="fas fa-ticket-alt"></i> Mã giảm giá</a>
    <a class="option col-12 " href="admin/dashboard/quan-ly-san-pham"><i class="fas fa-cogs"></i> Quản lý sản
        phẩm</a>
    <a class="option col-12 " href="admin/dashboard/quan-ly-khach-hang"><i class="fas fa-users-cog"></i> Quản lý
        khách hàng</a>
    <a class="option col-12 " href="admin/dashboard/quan-ly-thanh-vien"><i class="fas fa-users"></i> Quản lý thành
        viên</a>
    <a class="option col-12 active" href="admin/dashboard/blog"><i class="fas fa-blog"></i> Blog</a>
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
    <h2 class="display-4" style="font-size:36px;">Thêm nhật ký mới</h2>
    <hr />
    @if(count($errors)>0)
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{$err}}</p>
    @endforeach
    @endif
    @if(session('notice'))
    <p class="alert alert-success">{{session('notice')}}</p>
    @endif
    <form action="admin/dashboard/blog" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="form-group">
            <label for="">Nội dung</label>
            <input class="form-control" type="text" name="_content" placeholder="Nhập nội dung" />
        </div>
        <div class="form-group">
            <label for="">Link hình ảnh</label>
            <input class="form-control" type="text" name="image" />
        </div>
        <button type="submit" class="btn btn-danger btn-md">+ Thêm blog</button>
    </form>
    <hr />
    <h2 class="display-4" sytle="font-size:28px;">Quản lý blog</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Lượt thích</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Ngày đăng</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blog as $blog)
            <tr>
                <th scope="row">{{$blog->id}}</th>
                <td>{!!$blog->content!!}</td>
                <td>{{count($blog->_like)}}</td>
                <td><img src="{{$blog->image}}" width="100px"/></td>
                <td>{{\Carbon\Carbon::parse($blog->created_at)->format("d/m/Y")}}</td>
                <td>{{$blog->written}}</td>
                <td>            
                <button class="btn btn-danger rounded-0" data-toggle="modal"
                        data-target="#exampleModal_{{$blog->id}}">Xóa <i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            <div class="modal fade" id="exampleModal_{{$blog->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa Blog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Hành động này sẽ xóa Blog khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn
                            muốn xóa?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="admin/dashboard/deleteBlog/{{$blog->id}}"><button type="button"
                                    class="btn btn-danger">Xóa ngay</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    <hr />
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace('content')
</script>
@endsection
@section('title')
Blog
@endsection