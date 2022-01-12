@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" class="pl-3" height="60px" style="object-fit:contain;" />
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="col-12 pt-2 px-0">
    <a class="option col-12 " href="admin"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</a>
    <a class="option col-12 active" href="admin/bills"><i class="fas fa-truck"></i> Đơn đặt hàng</a>
    <a class="option col-12 " href="admin/analyze"><i class="far fa-chart-bar"></i> Phân tích</a>
    <a class="option col-12 " href="admin/bao-mat"><i class="fas fa-shield-alt"></i> Bảo mật</a>
    <a class="option col-12 " href="logout"><i class="bi bi-box-arrow-right"></i> Đăng Xuất</a>
</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<h2 class="display-4" style="font-size:36px">Đơn đặt hàng</h2>
<hr />
<div class="col-12 w-100 p-0 text-center d-flex flex-row flex-nowrap justify-content-around">
    <p class="col-3 bg-warning p-3 text-white float-left font-weight-light" style="font-size:36px;"><i class="bi bi-clipboard"></i> {{count($confirm)}}</p>
    <p class="col-3 bg-success p-3 text-white float-left font-weight-light" style="font-size:36px;"><i class="bi bi-truck"></i> {{count($transfering)}}</p>
    <p class="col-3 bg-info p-3 text-white float-left font-weight-light" style="font-size:36px;"><i class="bi bi-check-circle"></i> {{count($recieved)}}</p>
</div>
@if(session('notice'))
<p class="alert alert-success">{{session('notice')}}</p>
@endif
@if(count($bills) > 0)
<div class="container d-flex flex-row flex-wrap justify-content-between">
    @foreach($bills as $bill)
    <div class="col-lg-3 col-md-6 col-sm-12 border p-2 d-inline-block m-1" style="height:auto">
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
            <p class="mb-1">Trạng thái:
                @php
                switch($bill->stt){
                case 1:
                echo 'Chờ xác nhận'; break;
                case 2:
                echo 'Đã xác nhận';break;
                case 3:
                echo 'Đang vận chuyển';break;
                case 4:
                echo 'Đã giao';break;
                }
                @endphp
            </p>
            <div class="col-12 p-0">
                @if($bill->stt == 1)
                <a class="btn btn-outline-info float-left m-1" href="admin/bills/{{$bill->id}}">Xác nhận đơn</a>
                @endif
                @if($bill->stt == 2 && $bill->stt != 1)
                <a class="btn btn-outline-success float-left m-1" href="admin/bills/shipping/{{$bill->id}}"><i class="fas fa-truck"></i> Vận chuyển ngay</a>
                @elseif($bill->stt == 3)
                <a class="btn btn-outline-success float-left m-1" href="admin/bills/shipping/{{$bill->id}}">Xác nhận đã
                    giao</a>
                @else
                <a class="btn btn-info float-left m-1" href="admin/bills/{{$bill->id}}">Chi tiết</a>
                @endif
                <button type="button" data-toggle="modal" data-target="#exampleModal_{{$bill->id}}" class="btn btn-danger m-1">Xóa <i class="bi bi-trash-fill"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal_{{$bill->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hành động này sẽ xóa hóa đơn khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn muốn xóa hóa đơn
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