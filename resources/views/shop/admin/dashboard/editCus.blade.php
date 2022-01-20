@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<div class="container-fluid padding p-0">
    <h2 class="display-4" style="font-size:36px;">Chỉnh sửa khách hàng</h2>
    <form action="admin/dashboard/edit-user/{{$id}}" method="post">
        <p>Quyền hiện tại:
            @php
            switch($user->level)
            {
            case 0:echo 'Khách hàng';break;
            case 1:echo 'Admin';break;
            default: echo 'Unknown';break;
            }
            @endphp</p>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="form-check form-check-inline">
            <input id="cus" checked class="form-check-input" type="radio" name="permis" value="0" />
            <label for="cus" class="form-check-label">Khách hàng</label>
        </div>
        <div class="form-check form-check-inline">
            <input id="ad" class="form-check-input" type="radio" name="permis" value="1" />
            <label for="ad" class="form-check-label">Admin</label>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-info" type="submit">Thay đổi</button>
        </div>
    </form>

</div>
@endsection
@section('title')
Chỉnh sửa khách hàng
@endsection