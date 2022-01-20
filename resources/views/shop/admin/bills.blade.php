@extends('layout.layout_admin')
@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<h2 class="display-4" style="font-size:36px">Đơn đặt hàng</h2>
<hr />
<div class="col-12 w-100 p-0 text-center d-flex flex-row flex-wrap justify-content-around">
    <p class="col-lg-3 col-sm-12 bg-warning p-3 text-white float-left font-weight-light d-flex flex-column"
        style="font-size:36px;">
        {{count($confirm)}}
        <span class="fs-4"><i class="bi bi-clipboard"></i> Chờ xác nhận</span>
    </p>
    <p class="col-lg-3 col-sm-12 bg-success p-3 text-white float-left font-weight-light d-flex flex-column"
        style="font-size:36px;">
        {{count($transfering)}}
        <span class="fs-4"><i class="bi bi-truck"></i> Đang vận chuyển</span>
    </p>
    <p class="col-lg-3 col-sm-12 bg-info p-3 text-white float-left font-weight-light d-flex flex-column"
        style="font-size:36px;">
        {{count($recieved)}}
        <span class="fs-4"> <i class="bi bi-check-circle"></i> Đã giao</span>
    </p>
</div>
@if(session('notice'))
<p class="alert alert-success">{{session('notice')}}</p>
@endif
@if(count($bills) > 0)
<div class="container d-flex flex-row flex-wrap justify-content-between">
    @foreach($bills as $bill)
    <div class="col-lg-3 col-md-6 col-sm-12 border p-2 d-inline-block m-1 bg-light" style="height:auto">
        <div class="col-12">
            <p class="mb-1" style="font-size:22px">{{$bill->customer}}</p>
            <p class="mb-1"><i class="fas fa-phone text-info"></i> {{$bill->phone}}</p>
            <p class="mb-1"><i class="bi bi-house-fill"></i> {{$bill->address}}</p>
            @if($bill->email != null)
            <p class="mb-1"><i class="fas fa-envelope text-warning"></i> {{$bill->email}}</p>
            @endif
            <p class="mb-1"><i class="fas fa-money-bill text-success"></i> {{number_format($bill->total)}}đ -
                @php
                switch($bill->pay){
                case 1:
                echo 'COD'; break;
                case 2:
                echo 'VNPay';break;
                default:
                echo 'Unknown';break;
                }
                @endphp
            </p>
            <p class="mb-1"><i class="bi bi-truck text-info"></i> {{number_format($bill->fee)}}đ</p>
            <p class="mb-1"><i class="fas fa-ticket-alt text-danger"></i> {{$bill->discount}}% ~
                {{number_format(($bill->total / (1 - $bill->discount/100)) * ($bill->discount/100))}}đ
            </p>
            @php
            switch($bill->stt){
            case 1:
            echo '<p class="mb-1 btn btn-warning btn-sm fs-6">Chờ xác nhận</p>'; break;
            case 2:
            echo '<p class="mb-1 btn btn-info btn-sm fs-6">Đã xác nhận</p>';break;
            case 3:
            echo '<p class="mb-1 btn btn-success btn-sm fs-6">Đang vận chuyển</p>';break;
            case 4:
            echo '<p class="mb-1 btn btn-info btn-sm fs-6">Đã giao</p>';break;
            }
            @endphp
            <div class="col-12 p-0">
                @if($bill->stt == 1)
                <a class="btn btn-outline-info float-left m-1" href="admin/bills/{{$bill->id}}">Xác nhận đơn</a>
                @endif
                @if($bill->stt == 2 && $bill->stt != 1)
                <a class="btn btn-outline-success float-left m-1" href="admin/bills/shipping/{{$bill->id}}"><i
                        class="fas fa-truck"></i> Vận chuyển ngay</a>
                @elseif($bill->stt == 3)
                <a class="btn btn-outline-success float-left m-1" href="admin/bills/shipping/{{$bill->id}}">Xác nhận
                    đã
                    giao</a>
                @else
                <a class="btn btn-info float-left m-1" href="admin/bills/{{$bill->id}}">Chi tiết</a>
                @endif
                <button type="button" data-toggle="modal" data-target="#exampleModal_{{$bill->id}}"
                    class="btn btn-danger m-1">Xóa <i class="bi bi-trash-fill"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal_{{$bill->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hành động này sẽ xóa hóa đơn khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn muốn xóa hóa
                    đơn
                    của {{$bill->customer}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <a href="admin/deleteBill/{{$bill->id}}"><button type="button" class="btn btn-danger">Xóa
                            ngay</button></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<p class="text-center">Chưa có đơn đặt hàng nào</p>
@endif
@endsection
@section('title')
Đơn đặt hàng
@endsection