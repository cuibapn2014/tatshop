@extends('layout.layout_master')
@section('content')
<h2 class="display-4 text-center">Oops!<br/> You don't have access to this page</h2>
        <div class='hover mb-5'>
            <div class='background'>
                <div class='door'>403</div>
                <div class='rug'></div>
            </div>
            <div class='foreground'>
                <div class='bouncer'>
                    <div class='head'>
                        <div class='neck'></div>
                        <div class='eye left'></div>
                        <div class='eye right'></div>
                        <div class='ear'></div>
                    </div>
                    <div class='body'></div>
                    <div class='arm'></div>
                </div>
                <div class='poles'>
                    <div class='pole left'></div>
                    <div class='pole right'></div>
                    <div class='rope'></div>
                </div>
            </div>
        </div>
@endsection

@section('title')
TAT SHOP - Cửa hàng quần áo trực tuyến tại Hồ Chí Minh
@endsection
@section('script')
<link rel="stylesheet" href="403.css"/>
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}">
<meta property="og:type" content="article">
<meta property="og:title" content="Cửa hàng quần áo trực tuyến tại Hồ Chí Minh">
<meta property="og:keyword"
    content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp, tat shop" />
<meta property="og:description"
    content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi." />
<meta property="og:image"
    content="https://images.unsplash.com/photo-1614990354198-b06764dcb13c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80">
@endsection