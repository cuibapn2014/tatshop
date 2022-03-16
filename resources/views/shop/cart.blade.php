@extends('layout.layout_master')
@section('content')
<div class="container-fluid padding detail mt-4">
    @if(session('notice'))
    <div class="alert alert-success mt-2">
        <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
        {{session('notice')}}
    </div>
    @endif
    <div id="notice" class="alert alert-success">
        <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
        Cập nhật đơn hàng thành công <i class="bi bi-check2-circle"></i>
    </div>
    @if(session('danger'))
    <div class="alert alert-danger">
        <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
        {{session('danger')}}
    </div>
    @endif
    @if(count($errors) > 0)
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif
    <div class="col-lg-9 col-md-6 col-sm-12 px-0 py-2 cart-info float-left">
        <h2 class="font-weight-light border-bottom py-2" style="font-size:28px;">Giỏ hàng của bạn
            <i class="bi bi-basket"></i>
        </h2>
        @if(count($cart)>0)
        @php $key = 0 @endphp
        @foreach($cart as $item)
        <div class="shop-cart col-12 position-relative d-flex flex-row flex-nowrap border-bottom">
            <img class="col-3 img-cart float-left" src="{{$item->attributes->img}}" height="200px" />
            <div class="col-9 float-left">
                <div class="close-icon">
                    <button type="button" class="btn btn-dark btn-sm rounded-circle" data-bs-toggle="modal"
                        data-bs-target="#exampleModal-{{$key}}">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <p style="font-size:24px">{{$item->name}}</p>
                <p class="my-1">{{$item->attributes->size}}, {{$item->attributes->color}}</p>
                <p class="my-1">{{number_format($item->price)}}đ</p>
                <i class="float-left w-100">Tạm tính: {{number_format($item->price * $item->quantity)}}đ</i>
                <p class="w-100 float-left">Số lượng:</p>
                <div class="w-100 float-left mt-0 pt-0">
                    <button class="btn btn-light float-left minus"><i class="bi bi-dash-lg"></i></button>
                    <input id="amount_{{$key}}" class="float-left text-center border-0 amount" data-id="{{$item->id}}"
                        style="height:37px;width:50px;" type="number" readonly value="{{$item->quantity}}" />
                    <button class="btn btn-light float-left plus"><i class="fbi bi-plus-lg"></i></button>
                </div>
                <a class="btn btn-dark my-2 text-white update-cart float-left" data="{{$key}}">Cập nhật <i
                        class="far fa-edit"></i></a>
            </div>
        </div>
        <div class="modal fade" id="exampleModal-{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm khỏi giỏ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <a href="cart/delete/{{$item->id}}"><button type="button" class="btn btn-primary">Đồng
                                ý</button></a>
                    </div>
                </div>
            </div>
        </div>
        @php $key++ @endphp
        <!--MODAL FORM-->


        @endforeach
        <a class="btn btn-warning m-2 text-white" href="cart/cancel">Xóa giỏ hàng <i
                class="fas fa-trash-alt"></i></a>
        <button id="btn-order" type="button" class="btn btn-danger m-2 text-white" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">Đặt hàng</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Đặt hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @php
                    $qty = 0;
                    foreach(Cart::getContent() as $item){
                    $qty += $item->quantity;
                    }
                    @endphp
                    <div class="modal-body" id="order-form" data-quantity="{{$qty}}">
                        @include('layout.info-order')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <p class="text-center">Chưa có sản phẩm nào trong giỏ hàng</p>
        @endif
        @include('layout.dashboard')
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 p-0 cart-info float-left p-2">
        @include('layout.display')
    </div>
    @if(session('success'))
    <div id="status-payment">
        <div class="col-lg-5 col-md-8 col-sm-12 text-center _notify">
            <h2 class="col-12 font-weight-light p-2" style="font-size:24px;">THÔNG TIN THANH TOÁN ĐƠN HÀNG
            </h2>
            <hr class="my-0" />
            <p class="w-100 mt-4">
                <i class="bi bi-check2-circle text-success" style="font-size:100px;"></i>
            </p>
            <p class="display-4 font-weight-normal" style="font-size:1.7rem;">{{session('success')}}</p>
        </div>
    </div>
    @elseif(session('danger'))
    <div id="status-payment">
        <div class="col-lg-5 col-md-8 col-sm-12 text-center _notify">
            <h2 class="col-12 font-weight-light p-2" style="font-size:24px;">THÔNG TIN THANH TOÁN ĐƠN HÀNG
            </h2>
            <hr class="my-0" />
            <p class="w-100 mt-4">
                <i class="bi bi-exclamation-circle text-danger" style="font-size:100px;"></i>
            </p>
            <p class="display-4 font-weight-normal" style="font-size:1.7rem;">{{session('danger')}}</p>
        </div>
    </div>
    @endif
</div>
<script>
    $(document).ready(() => {
        var stt = $('#status-payment');
        if (stt) {
            stt.delay(3000).fadeOut();
        }
    });
</script>
<div class="payment-screen position-fixed "></div>
@endsection
@section('script')
<script src="js/__script.js"></script>
<script src="js/ajax-payment.js"></script>
<script type="text/javascript">
    let value = {{ session() -> get('totalPrice')}};
    let qty;
    var feeship = 0;
    const totalPrice = {{ session() -> get('totalPrice')}};

    $(document).ready(($) => {
        var code = $("#code");
        var bill = $("#bill-pay");
        var total = {{ Cart:: getTotal()
    }};
    let districts = $("#district");
    var orgi = $("._discnt:eq(0)").html();
    qty = $("#order-form").attr("data-quantity");

    code.on("keyup", (e) => {
        $.get("ajaxCode/" + code.val() + "/" + total, (data) => {
            if (code.val() != null) {
                if (data > 0) {
                    value = totalPrice - (data / 100 * total);
                    let percent;
                    if (total > 300000 && total < 1000000) {
                        percent = 5;
                    } else if (total > 1000000) {
                        percent = 10;
                    } else {
                        percent = 0;
                    }
                    $("._discnt:eq(0)").html(percent + "% + Mã giảm " + data + "% ~" + (total * (
                        data / 100)).toLocaleString('vi', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                    $("._pay:eq(0)").html((value + feeship).toLocaleString(
                        'vi', {
                        style: 'currency',
                        currency: 'VND'
                    }));
                } else if (data == -1) {
                    value = totalPrice + feeship;
                    $("._discnt:eq(0)").html(orgi);
                    $("._pay:eq(0)").html(value.toLocaleString(
                        'vi', {
                        style: 'currency',
                        currency: 'VND'
                    }));
                    $("#notify").html(
                        "<p class='alert alert-warning'>Giá trị đơn hàng chưa đạt điều kiện</p>"
                    );
                } else if (data == -2) {
                    value = totalPrice + feeship;
                    $("._discnt:eq(0)").html(orgi);
                    $("._pay:eq(0)").html(value.toLocaleString(
                        'vi', {
                        style: 'currency',
                        currency: 'VND'
                    }));
                    $("#notify").html(
                        "<p class='alert alert-warning'>Mã giảm giá đã hết hiệu lực</p>");
                } else if (data == 0) {
                    value = totalPrice + feeship;
                    $("._discnt:eq(0)").html(orgi);
                    $("._pay:eq(0)").html(value.toLocaleString(
                        'vi', {
                        style: 'currency',
                        currency: 'VND'
                    }));
                    $("#notify").html(null);
                }

            }

        });
    });

    districts.change((e) => {
        let province = $("#province").val();
        let district = $("#district").val();
        let shipFee = $(".ship-fee");
        $.get("/cal-fee/province=" + province + "&district=" + district + "&qty=" + qty + "&value=" + value, (data) => {
            let obj = JSON.parse(data);
            let fee = obj.fee.fee;
            feeship = fee;
            $("#fee").val(fee);
            $("._pay:eq(0)").html((value + feeship).toLocaleString(
                'vi', {
                style: 'currency',
                currency: 'VND'
            }));
            if (feeship != 0) {
                shipFee.text(fee.toLocaleString('vi', {
                    style: 'currency',
                    currency: 'VND'
                }))
            } else {
                shipFee.text("0đ");
            }
        });
    });

    });
</script>
@if(session('success'))
<script>
    $(document).ready(() => {
        $.get('/notification', data => {
            console.log("success");
        });
    });
</script>
@endif
@endsection
@section('title')
Giỏ hàng của bạn
@endsection