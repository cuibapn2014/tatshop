@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<div class="container-fluid padding p-0">
    <h2 class="display-4" style="font-size:36px;">Quản lý khách hàng</h2>
    @if(session('notice'))
    <p class="alert alert-success">{{session('notice')}}</p>
    @endif
    <div class="col-lg-3 col-md-6 col-sm-12 mb-2 d-inline-block border item-option p-2 text-center"><a
            href="admin/dashboard/danh-gia-tu-khach-hang"><i class="fas fa-comments fa-7x text-info w-100 mb-2"></i>
            Đánh giá từ khách
            hàng</a></div>
    <br>
    <button class="btn btn-warning my-2" onclick="location.href='{{ url()->previous()}}'">Trở lại</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Quyền</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>

            @foreach($customer as $customer)
            @php
            $urlImage = str_contains($customer->image,"https") == false ? "./image/".$customer->image :
            $customer->image;
            @endphp
            <tr>
                <th scope="row">{{$customer->id}}</th>
                <td><img class="rounded-circle" height="50px" width="50px" src="{{$urlImage}}"
                        alt="{{$customer->name}}" /></td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                    @php
                    changeRole($customer->level);
                    @endphp
                </td>
                <td>
                    <a class="btn btn-outline-info rounded-0" href="admin/dashboard/edit-user/{{$customer->id}}">Edit <i
                            class="far fa-edit"></i></a>
                    <button class="btn btn-danger rounded-0" data-toggle="modal"
                        data-target="#exampleModal_{{$customer->id}}">Xóa <i class="far fa-trash-alt"></i></button>
            </tr>
            <div class="modal fade" id="exampleModal_{{$customer->id}}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa khách hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Hành động này sẽ xóa khách hàng khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn
                            muốn xóa <strong>{{$customer->name}}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="admin/dashboard/delete-user/{{$customer->id}}"><button type="button"
                                    class="btn btn-danger">Xóa ngay</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@php
function changeRole($numRole){
switch($numRole)
{
case 0:echo 'Khách hàng';break;
case 1:echo 'Admin';break;
default: echo 'Unknown';break;
}
}
@endphp
@endsection
@section('title')
Quản lý khách hàng
@endsection