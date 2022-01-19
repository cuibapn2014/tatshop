<div class="col-12 cart-paymentborder p-0 float-right m-1">
    <div class="col-12">
        <h2 class="display-4 text-center" style="font-size:32px;">Đơn giá</h2>
        <hr />
        @if(count($cart)<= 0) <p class="text-center">Hiện giỏ hàng trống</p>
            @endif
            <form id="bills" action="cart" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input id="fee" type="hidden" name="fee_ship" value="" />
                @foreach($cart as $item)
                <div class="col-12 p-0 clearfix">
                    <p class="col-6 p-0 float-left text-left">{{$item->name}}</p>
                    <p class="col-6 p-0 float-left text-right">{{number_format($item->price)}}đ</p>
                    <p class="col-6 float-right text-right">x{{$item->quantity}}</p>
                </div>
                <input type="hidden" name="name[]" value="{{$item->name}}" />
                <input type="hidden" name="attr[]" value="{{$item->attributes->size}},{{$item->attributes->color}}" />
                <input type="hidden" name="price[]" value="{{$item->price}}" />
                <input type="hidden" data-productID="{{$item->id}}" name="qty[]" value="{{$item->quantity}}" />
                @endforeach
                <hr />
                <div class="form-group">
                    <label for="fullname">Họ tên</label>
                    <input id="fullname" class="form-control" type="text" name="customer" placeholder="Nguyễn Văn A" />
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input id="phone" class="form-control" type="text" name="phone" placeholder="037xxxxx24" />
                </div>
                <div class="form-group">
                    <label for="">Chọn Tỉnh/Thành phố</label>
                    <select id="province" class="form-select" name="province" aria-label="Default select example">
                        <option selected disabled>Chọn tỉnh/thành phố</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Chọn Quận/Huyện</label>
                    <select id="district" class="form-select" name="district" aria-label="Default select example">
                        <option selected disabled>Chọn quận/huyện</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input id="address" class="form-control" type="text" name="address" placeholder="Số nhà/hẻm, tên đường, phường/xã" />
                </div>
                <div class="form-group">
                    <label for="email">Email (Nếu có)</label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="mail@example.com" />
                </div>
                <hr />
                <div class="form-group">
                    <label for="code">Mã giảm giá</label>
                    <input id="code" class="form-control" type="text" name="code" placeholder="Nhập mã giảm" />
                </div>
                <div id="notify"></div>
                <i class="font-weight-bold">*Miễn phí vận chuyển đối với nội thành TP Hồ Chí Minh với đơn hàng từ 300,000đ</i>
                <p>Hình thức thanh toán</p>
                <div class="col-12 w-100 p-0 pay">
                    <div class="form-group">
                        <input id="cod" type="radio" name="payments" checked />
                        <label class="cod text-center" for="cod">
                            <img height="70%" src="https://hebo.vn/library/module_new/chinh-sach-thanh-toan-giao-nhan_s3072.png">
                            <p class="w-100 p-1">Thanh toán tại nhà <i class="bi bi-check-circle-fill text-success"></i></p>
                        </label>
                    </div>
                    <div class="form-group">
                        <input id="vnpay" type="radio" name="payments" disabled />
                        <label class="vnpay text-center" for="vnpay">
                            <img height="70%" src="https://static.ybox.vn/2020/1/1/1578299260236-Thi%E1%BA%BFt%20k%E1%BA%BF%20kh%C3%B4ng%20t%C3%AAn-152.png">
                            <p class="w-100 p-1">Thanh toán VNPay <i class="bi bi-check-circle-fill text-success"></i></p>
                        </label>
                    </div>
                </div>
                <p>Tạm tính: <strong><i>{{number_format(Cart::getTotal())}}</i><u>đ</u></strong></p>
                <p>Phí vận chuyển: <strong><i class="ship-fee">0</i></strong></p>
                @php
                $total = 0;
                @endphp
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
                        @php
                        $total = Cart::getTotal() - Cart::getTotal() * 0.05;
                        @endphp
                        {{number_format($total)}} <u>đ</u></i>
                        @elseif(Cart::getTotal() > 1000000)
                        @php
                        $total = Cart::getTotal() - Cart::getTotal()*0.1;
                        @endphp
                        <i class="_pay">{{number_format($total)}} <u>đ</u></i>
                        @else
                        @php
                        $total = Cart::getTotal();
                        @endphp
                        <i class="_pay">{{number_format($total)}} <u>đ</u></i>
                        @endif
                        @php 
                            session(['totalPrice' => $total]);
                        @endphp
                </h3>
                </p>
                <button class="btn btn-danger w-100 mb-2">Đặt hàng ngay</button>
            </form>
    </div>
</div>