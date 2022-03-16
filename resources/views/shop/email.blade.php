<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>THANH TOÁN HÓA ĐƠN TAT SHOP</title>

    <!-- Bootstrap cdn 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom font montseraat -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">

    <!-- Custom style invoice1.css -->
    <link rel="stylesheet" type="text/css" href="./css/invoice.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="bg-light">

    <section class="back">
        <div class="container-xxl p-4">
            <div class="row">
                <div class="col-xs-12">
                    <div class="invoice-wrapper">
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-top-left">
                                        <h2 class="client-company-name">{{$bill->customer}}</h2>
                                        <h6 class="client-address">
                                            {{$bill->address}}<br />
                                            {{$bill->phone}}
                                            <!-- 31 Lake Floyd Circle, <br>Delaware, AC 987869 <br>India -->
                                        </h6>
                                        <!-- <h4>Reference</h4>
										<h5>UX Design &amp; Development for <br> Android App.</h5> -->
                                    </div>
                                </div>
                                <div class="col-sm-6 d-flex flex-row justify-content-between">
                                    <div class="invoice-top-right">
                                        <h2 class="our-company-name">Tat Shop</h2>
                                        <h6 class="our-address">Phường Tân Sơn Nhì, <br>Quận Tân Phú <br>Thành phố Hồ
                                            Chí Minh</h6>
                                        <h5>
                                            <?php
                                            date_default_timezone_set('Australia/Melbourne');
                                            $date = date('jS F Y h:i a', time());
                                            echo $date;
                                            ?>
                                            <!-- 06 September 2017 -->
                                        </h5>
                                    </div>
                                    <div class="logo-wrapper">
                                        <img src="{{asset('')}}image/brand_logo.png"
                                            class="img-responsive pull-right logo" width="80px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="title">HÓA ĐƠN <span
                                            class="badge bg-{{getColor($bill->stt)}}">{{getStt($bill->stt)}}</span></h2>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-sm-3 col-md-3">
                                    <div class="invoice-bottom-left">
                                        <h5>Mã hóa đơn</h5>
                                        @php $date = \Carbon\Carbon::parse($bill->updated_at) @endphp
                                        <h4 style="font-weight:bold">TSI
                                            {{$date->format('i').$date->format('Y').$date->format('m').$bill->id}}</h4>
                                    </div>
                                </div>
                                <div class="col-md-offset-1 col-md-8 col-sm-9">
                                    <div class="invoice-bottom-right">
                                        <table class="table fs-5">
                                            <thead>
                                                <tr>
                                                    <th>Số lượng</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payment as $payment)
                                                <tr>
                                                    <td>{{$payment->qty}}</td>
                                                    <td><img src="{{$payment->product->thumbnail}}" alt="product"
                                                            width="60px"></td>
                                                    <td>{{$payment->product->title}}({{$payment->attr}})</td>
                                                    <td>{{number_format($payment->price)}}đ</td>
                                                </tr>
                                                @endforeach
                                                <tr style="height: 40px;"></tr>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>Giảm giá</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{number_format(($bill->total / (1 - $bill->discount/100)) *
                                                        ($bill->discount/100))}}đ (-{{$bill->discount}}%)</th>
                                                </tr>
                                                <tr>
                                                    <th>Tạm tính</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{number_format($bill->total)}}đ</th>
                                                </tr>
                                                <tr>
                                                    <th>Phí vận chuyển</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{number_format($bill->fee)}}đ</th>
                                                </tr>
                                                <tr>
                                                    <th>Tổng</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{number_format($bill->total + $bill->fee)}}đ</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <h4 class="terms">Điều kiện</h4>
                                        <ul class="fs-4">
                                            <li>{{$bill->pay > 1 ? "Hóa đơn thanh toán trước" : "Thanh toán khi nhận
                                                hàng"}}</li>
                                            <li>{{$bill->pay > 1 ? "Thanh toán trong 1, 2 ngày sau khi đặt hàng" :
                                                "Thanh toán qua cổng trực tuyến"}}</li>
                                        </ul>
                                        <h4 class="terms">Cổng thanh toán MoMo</h4>
                                        <ul class="fs-4">
                                            <li>Tên người nhận: Nguyễn Mạnh Tuấn</li>
                                            <li>Số điện thoại: 0388.794.195</li>
                                            <li>Nội dung chuyển khoản: Mã hóa đơn + Họ tên</li>
                                            <li><img src="{{asset('')}}image/qr/momo-qr.png" alt="momo" width="200px" />
                                            </li>
                                        </ul>
                                        <h4 class="terms">Thanh toán qua Ngân hàng</h4>
                                        <ul class="fs-4">
                                            <li>Chủ tài khoản: Nguyễn Mạnh Tuấn</li>
                                            <li>Số TK: 7708205030680</li>
                                            <li>Chi nhánh: Ngân hàng Argibank - Chi nhánh Huyện Kiên Hải Kiên Giang</li>
                                            <li>Nội dung chuyển khoản: Mã hóa đơn + Họ tên</li>
                                            <li><img src="{{asset('')}}image/qr/argibank-qr.png" alt="bank"
                                                    width="200px" /></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-xs-12">
                                    <hr class="divider">
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="text-left">tatshop.tech</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="text-center">nmtworks.7250@gmail.com</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="text-right">+84 388 794 915</h6>
                                </div>
                            </div>
                            <div class="bottom-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
    function getStt($stt){
    switch($stt){
    case 1: echo "Chờ xác nhận";break;
    case 2: echo "Đã xác nhận";break;
    case 3: echo "Đang vận chuyển";break;
    case 4: echo "Đã giao";break;
    default: echo "Không xác định";break;
    }
    }

    function getColor($stt){
    switch($stt){
    case 1: echo "warning";break;
    case 2: echo "info";break;
    case 3: echo "success";break;
    case 4: echo "dark";break;
    default: echo "secondary";break;
    }
    }
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <!-- jquery slim version 3.2.1 minified -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</body>

</html>