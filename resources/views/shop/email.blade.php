<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>THANH TOÁN HÓA ĐƠN TAT SHOP</title>

    <!-- Bootstrap cdn 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom font montseraat -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">

    <!-- Custom style invoice1.css -->
    <link rel="stylesheet" type="text/css" href="./css/invoice.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section class="back">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="invoice-wrapper">
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-top-left">
                                        <h2 class="client-company-name">{{$bill->customer}}</h2>
                                        <h6 class="client-address">
                                            {{$bill->address}}<br/>
                                            {{$bill->phone}}
                                            <!-- 31 Lake Floyd Circle, <br>Delaware, AC 987869 <br>India -->
                                        </h6>
                                        <!-- <h4>Reference</h4>
										<h5>UX Design &amp; Development for <br> Android App.</h5> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice-top-right">
                                        <h2 class="our-company-name">Tat Shop</h2>
                                        <h6 class="our-address">Phường Tân Sơn Nhì, <br>Quận Tân Phú <br>Thành phố Hồ Chí Minh</h6>
                                        <div class="logo-wrapper">
                                            <img src="./image/brand_logo.png" class="img-responsive pull-right logo" width="80px" />
                                        </div>
                                        <h5>
                                            <?php
                                            date_default_timezone_set('Australia/Melbourne');
                                            $date = date('jS F Y h:i a', time());
                                            echo $date;
                                            ?>
                                            <!-- 06 September 2017 -->
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="title">Hóa đơn</h2>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-sm-3 col-md-3">
                                    <div class="invoice-bottom-left">
                                        <h5>Mã hóa đơn</h5>
                                        <h4>TSI {{rand(10000,99999).$bill->id}}</h4>
                                    </div>
                                </div>
                                <div class="col-md-offset-1 col-md-8 col-sm-9">
                                    <div class="invoice-bottom-right">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Số lượng</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payment as $payment)
                                                <tr>
                                                    <td>{{$payment->qty}}</td>
                                                    <td>{{$payment->product->title}}({{$payment->attr}})</td>
                                                    <td>{{number_format($payment->price)}}đ</td>
                                                </tr>
                                                @endforeach
                                                <tr style="height: 40px;"></tr>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>Tổng</th>
                                                    <th></th>
                                                    <th>{{number_format($bill->total)}}đ</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <h4 class="terms">Terms</h4>
                                        <ul>
                                            <li>Invoice to be paid in advance.</li>
                                            <li>Make payment in 2,3 business days.</li>
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


    <!-- jquery slim version 3.2.1 minified -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>