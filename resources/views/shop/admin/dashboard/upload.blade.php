@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" height="50px" style="object-fit:contain;" />
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12 p-0">
    <a class="option col-12" href="admin/dashboard/them-san-pham"><i class="fas fa-tshirt"></i> Thêm sản
        phẩm</a>
    <a class="option col-12 " href="admin/dashboard/them-danh-muc"><i class="fas fa-clipboard-list"></i> Thêm danh
        mục</a>
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
    <form action="admin/dashboard/upload" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="custom-file">
        <input type="file" class="form-control" name="_file"/>
    </div>
        <button class="btn btn-info mt-1" type="submit">Tải lên</button>
</div>

    </form>

</div>

@endsection
@section('title')
Blog
@endsection