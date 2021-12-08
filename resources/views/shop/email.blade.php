<!DOCTYPE html>
<html>

<head>
    <meta name="csrf_token" content="{{csrf_token()}}" />
    <!--CSS include Bootstrap 4-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Thông tin thanh toán TAT</title>
</head>

<body>


    <h1>{{$details['title']}}</h1>
    <p>TAT Shop xin chào <strong style="font-size: 22px;"><i>{{$bill->customer}}</i></strong>! Bên dưới là biên lai
        thanh toán của bạn.</p>
    @if(count($payment)> 0)
    <img src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/118379953_167989068266141_5669582622106849448_o.jpg?_nc_cat=105&ccb=2&_nc_sid=dd9801&_nc_ohc=KexTuhKJe9wAX_TUzeJ&_nc_ht=scontent.fsgn2-1.fna&oh=5e487a56a5cdb6e7fe9814a3c380ac6d&oe=5FD6D7B6"
        width="100%" height="175px" style="object-fit: cover;object-position: center;">
    <table width="100%">
        <thead>
            <tr>
                <th scope="col" style="background: #17a2b8;color:#fff;">Mã đơn hàng</th>
                <th scope="col" style="background: #17a2b8;color:#fff;">Tên sản phẩm</th>
                <th scope="col" style="background: #17a2b8;color:#fff;">Giá</th>
                <th scope="col" style="background: #17a2b8;color:#fff;">Số lượng</th>
                <th scope="col" style="background: #17a2b8;color:#fff;">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payment as $pay)
            <tr>
                <td style="text-align:center;border: 1px solid #000;">{{"TS".substr(hash('md5',$pay->code_bill), 0, 6)}}
                </td>
                <td style="text-align:center;border: 1px solid #000;">{{$pay->name}}</td>
                <td style="text-align:center;border: 1px solid #000;">{{number_format($pay->price)}}</td>
                <td style="text-align:center;border: 1px solid #000;">{{$pay->qty}}</td>
                <td style="text-align:center;border: 1px solid #000;">{{number_format($pay->price * $pay->qty)}}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5"
                    style="text-align:right;border: 1px solid #000;width:100%;vertical-align: middle;width: 100%;font-size:24px">
                    Giảm giá: <i style="color:red;"><strong>{{$bill->discount}}% ~
                            {{number_format((($bill->discount/100 + 1) * $bill->total) * ($bill->discount/100))}}
                            VNĐ</strong></i><br />
                    Tổng tiền(có thể chưa bao gồm phí vận chuyển): <i
                        style="color:red;"><strong>{{number_format($bill->total)}}VNĐ</strong></i></td>
            </tr>
        </tbody>
    </table>
    @endif
    <p>*Lưu ý: TAT Shop chỉ miễn phí giao hàng ở nội thành TP Hồ Chí Minh. Giao hàng đến các tỉnh phí ship từ 33,000đ
        đến 35,000đ</p>
    <p>{{$details['body']}}</p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!---->
</body>

</html>