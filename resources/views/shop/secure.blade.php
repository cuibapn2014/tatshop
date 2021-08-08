@extends('layout.layout_master')
@section('content')

<h2 class="display-4 updated_banner text-center">Bảo mật</h2>
<hr />
<div class="container-fluid padding text-center p-2">
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
        <h2 class="text-left">Chúng tôi thu thập những thông tin gì ?</h2>
        <p class="text-justify">- Chúng tôi sẽ thu thập các thông tin tên, địa chỉ, số điện thoại của quý khách.</p>
        <p class="text-justify">- Chúng tôi sẽ bảo mật quyền riêng tư về thông tin của quý khách.
        </p>
        <h2 class="text-left">Chúng tôi sử dụng thông tin để làm gì ?</h2>
        <p class="text-justify">- Chúng tôi sẽ dùng thông tin của quý khách để thuận tiện cho việc bán hàng cho quý
            khách.</p>
        <p class="text-justify">- Chúng tôi sẽ cung cấp thông tin của quý khách cho bên thứ ba trong việc giao hàng cho
            quý khách.</p>
    </div>
</div>
@endsection

@section('title')
Bảo mật - TAT SHOP
@endsection

@section('seo')
<meta property="og:url" content="{{asset('')}}bao-mat">
<meta property="og:type" content="article">
<meta property="og:title" content="Bảo mật - TAT SHOP">
<meta property="og:description"
    content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi">
<meta property="og:image" content="image/tat.jpg">
@endsection