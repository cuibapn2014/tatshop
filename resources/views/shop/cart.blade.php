@extends('layout.layout_master')
@section('content')
<div class="container-fluid padding detail mt-4">
    <h2 class="font-weight-light" style="font-size:28px;">Giỏ hàng của bạn
        <i class="bi bi-basket"></i>
    </h2>
    <hr class="bg-dark mt-0" style="height:3px;" />
    @if(session('notice'))
    <div class="alert alert-success">
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
    <div class="col-lg-7 col-md-6 col-sm-12 p-0 cart-info border float-left">
        @if(count($cart)>0)
        @php $key = 0 @endphp
        @foreach($cart as $item)
        <div class="shop-cart col-12 position-relative">
            <img class="col-4 img-cart float-left" src="{{$item->attributes->img}}" height="200px" />
            <div class="col-8 float-left">
                <div class="close-icon">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i
                            class="bi bi-x-square-fill text-danger"></i></a>
                </div>
                <p style="font-size:24px">{{$item->name}}</p>
                <p class="my-1">{{$item->attributes->size}}, {{$item->attributes->color}}</p>
                <p class="my-1">{{number_format($item->price)}}đ</p>
                <i class="float-left w-100">Tạm tính: {{number_format($item->price * $item->quantity)}}đ</i>
                <p class="w-100 float-left">Số lượng:</p>
                <div class="w-100 float-left mt-0 pt-0">
                    <button class="btn btn-info float-left minus"><i class="bi bi-dash-lg"></i></button>
                    <input id="amount_{{$key}}" class="float-left text-center border-0 amount" data-id="{{$item->id}}"
                        style="height:37px;width:50px;" type="number" readonly value="{{$item->quantity}}" />
                    <button class="btn btn-info float-left plus"><i class="fbi bi-plus-lg"></i></button>
                </div>
                <a class="btn btn-success my-2 text-white update-cart float-left" data="{{$key}}">Cập nhật <i
                        class="far fa-edit"></i></a>
            </div>
        </div>
        <hr style="clear:both;" />
        @php $key++ @endphp
        <!--MODAL FORM-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông báo từ TAT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắc muốn bỏ sản phẩm này khỏi giỏ hàng ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <a href="cart/delete/{{$item->id}}"><button type="button" class="btn btn-danger">Đồng
                                ý</button></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <a class="btn btn-warning m-2 text-white" href="cart/cancel">Xóa giỏ hàng <i
                class="fas fa-trash-alt"></i></a>
        @else
        <p class="text-center">Chưa có sản phẩm nào trong giỏ hàng</p>
        @endif
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 cart-paymentborder border float-right m-1">
        <div class="col-12">
            <h2 class="display-4 text-center" style="font-size:32px;">Đơn giá</h2>
            <hr />
            @if(count($cart)<= 0) <p class="text-center">Hiện giỏ hàng trống</p>
                @endif
                <form id="bills" action="cart" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    @foreach($cart as $item)
                    <div class="col-12 p-0 clearfix">
                        <p class="col-6 p-0 float-left text-left">{{$item->name}}</p>
                        <p class="col-6 p-0 float-left text-right">{{number_format($item->price)}}đ</p>
                        <p class="col-6 float-right text-right">x{{$item->quantity}}</p>
                    </div>
                    <input type="hidden" name="name[]" value="{{$item->name}}" />
                    <input type="hidden" name="attr[]"
                        value="{{$item->attributes->size}},{{$item->attributes->color}}" />
                    <input type="hidden" name="price[]" value="{{$item->price}}" />
                    <input type="hidden" name="qty[]" value="{{$item->quantity}}" />
                    @endforeach
                    <hr />
                    <div class="form-group">
                        <label for="fullname">Họ tên</label>
                        <input id="fullname" class="form-control" type="text" name="customer"
                            placeholder="Nguyễn Văn A" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input id="phone" class="form-control" type="text" name="phone" placeholder="037xxxxx24" />
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input id="address" class="form-control" type="text" name="address"
                            placeholder="Số nhà/hẻm, tên đường, phường/xã, quận/huyện, tỉnh/thành phố" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email (Nếu có)</label>
                        <input id="email" class="form-control" type="email" name="email"
                            placeholder="mail@example.com" />
                    </div>
                    <hr />
                    <div class="form-group">
                        <label for="code">Mã giảm giá</label>
                        <input id="code" class="form-control" type="text" name="code" placeholder="Nhập mã giảm" />
                    </div>
                    <div id="notify"></div>
                    <i class="font-weight-bold">*Miễn phí vận chuyển đối với nội thành TP Hồ Chí Minh</i>
                    <p>Hình thức thanh toán</p>
                    <div class="col-12 w-100 p-0 pay">
                        <div class="form-group">
                            <input id="cod" type="radio" name="payments" checked/>
                            <label class="cod text-center" for="cod">
                                <img height="70%" src="https://hebo.vn/library/module_new/chinh-sach-thanh-toan-giao-nhan_s3072.png">
                                <p class="w-100 p-1">Thanh toán khi tại nhà <i class="bi bi-check-circle-fill text-success"></i></p>
                            </label>
                        </div>
                        <div class="form-group">
                            <input id="vnpay" type="radio" name="payments" disabled/>
                            <label class="vnpay text-center" for="vnpay">
                            <img height="70%" src="https://static.ybox.vn/2020/1/1/1578299260236-Thi%E1%BA%BFt%20k%E1%BA%BF%20kh%C3%B4ng%20t%C3%AAn-152.png">
                                <p class="w-100 p-1">Thanh toán VNPay <i class="bi bi-check-circle-fill text-success"></i></p>
                            </label>
                        </div>
                        </div>
                    <p>Tạm tính: <strong><i>{{number_format(Cart::getTotal())}}</i><u>đ</u></strong></p>
                    <p>Giảm giá:
                    <h3>
                        @if(Cart::getTotal() > 300000 && Cart::getTotal() < 1000000) <i class="_discnt">5% ~
                            {{number_format(Cart::getTotal()*0.05)}}đ</i>
                            @elseif(Cart::getTotal() > 1000000)
                            <i class="_discnt">10% ~ {{number_format(Cart::getTotal()*0.1)}}đ</i>
                            @else
                            <i class="_discnt">0%</i>
                            @endif
                    </h3>
                    </p>
                    <p>Thành tiền:
                    <h3>
                        @if(Cart::getTotal() > 300000 && Cart::getTotal() < 1000000) <i class="_pay">
                            {{number_format(Cart::getTotal() - Cart::getTotal()*0.05)}} <u>đ</u></i>
                            @elseif(Cart::getTotal() > 1000000)
                            <i class="_pay">{{number_format(Cart::getTotal() - Cart::getTotal()*0.1)}} <u>đ</u></i>
                            @else
                            <i class="_pay">{{number_format(Cart::getTotal())}} <u>đ</u></i>
                            @endif
                    </h3>
                    </p>
                    <button class="btn btn-danger w-100 mb-2">Đặt hàng ngay</button>
                </form>
        </div>
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
            <i class="bi bi-exclamation-circle text-danger"  style="font-size:100px;"></i>
            </p>
            <p class="display-4 font-weight-normal" style="font-size:1.7rem;">{{session('danger')}}</p>
        </div>
    </div>
    @endif
</div>
<script>
     $(document).ready(() => {
    var stt = $('#status-payment');
    if(stt){
            stt.delay(3000).fadeOut();
    }
    });
    </script>
@endsection
@section('script')
<script src="js/__script.js"></script>
<script type="text/javascript">
$(document).ready(($) => {
    var code = $("#code");
    var bill = $("#bill-pay");
    var total = {{Cart::getTotal()}};
    var orgi = $("._discnt:eq(0)").html();
    var _orgi = $("._pay:eq(0)").html()
    code.on("keyup", (e) => {
        $.get("ajaxCode/" + code.val() + "/" + total, (data) => {
            if (code.val() != null) {
                if (data > 0) {
                    if (total > 300000 && total < 1000000) {
                        $("._discnt:eq(0)").html("5% + Mã giảm " + data + "% ~" + (total * (
                            data /
                            100 + 0.05)).toLocaleString('vi', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                        $("._pay:eq(0)").html((total * ((100 - data - 5) / 100)).toLocaleString(
                            'vi', {
                                style: 'currency',
                                currency: 'VND'
                            }));
                    } else if (total > 1000000) {
                        $("._discnt:eq(0)").html("10% + Mã giảm " + data + "% ~" + (total * (
                            data /
                            100 + 0.1)).toLocaleString('vi', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                        $("._pay:eq(0)").html((total * ((100 - data - 10) / 100))
                            .toLocaleString(
                                'vi', {
                                    style: 'currency',
                                    currency: 'VND'
                                }));
                    } else {
                        $("._discnt:eq(0)").html("0% + Mã giảm " + data + "% ~" + (total * (
                            data / 100)).toLocaleString('vi', {
                            style: 'currency',
                            currency: 'VND'
                        }));
                        $("._pay:eq(0)").html((total * ((100 - data) / 100)).toLocaleString(
                            'vi', {
                                style: 'currency',
                                currency: 'VND'
                            }));
                    }
                } else if (data == -1) {
                    $("._discnt:eq(0)").html(orgi);
                    $("._pay:eq(0)").html(_orgi);
                    $("#notify").html(
                        "<p class='alert alert-warning'>Giá trị đơn hàng chưa đạt điều kiện</p>"
                    );
                } else if (data == -2) {
                    $("._discnt:eq(0)").html(orgi);
                    $("._pay:eq(0)").html(_orgi);
                    $("#notify").html(
                        "<p class='alert alert-warning'>Mã giảm giá đã hết hiệu lực</p>");
                } else if (data == 0) {
                    $("._discnt:eq(0)").html(orgi);
                    $("._pay:eq(0)").html(_orgi);
                    $("#notify").html(null);
                }
            }

        });
    });
});
</script>
@endsection
@section('title')
Giỏ hàng của bạn
@endsection