@extends('layout.layout_master')
@section('content')
<div class="col-lg-3 col-md-12 col-sm-12 float-left m-0">
    <div class="container-fluid padding pt-2 px-0">
        @include("layout.display")
    </div>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 float-left m-0 p-0">
    <h2 class="display-4 updated_banner text-left m-0 border-bottom border-3 border-dark">MỚI CẬP NHẬT</h2>
    @if(session('notice'))
    <div class="alert alert-success col-8 mx-auto">
        <span class="closebtn float-right" style="cursor:poiter;"
            onclick="this.parentElement.style.display='none';">&times;</span>
        {{session('notice')}}
    </div>
    @endif
    <div class="container-fluid padding p-0">
        @if(count($product) > 0)
        @foreach($product as $product)
        <a href="san-pham/{{$product->id}}/{{$product->_link}}" title="{{$product->title}}">
            <div class="card col-lg-3 col-md-4 col-sm-12 p-0 m-1 float-left">
                @if($product->discount > 0)
                <span class="discount text-center">-{{$product->discount}}%</span>
                @endif
                <div class="thumbnail">
                    <img id="img-{{$product->id}}" data-src="{{$product->thumbnail}}" style="object-fit:cover;"
                        height="100%" width="100%" alt="{{$product->title}}" />
                    @if($product->qty <= 0) <p class="p-4">Hết hàng</p>
                        @endif
                </div>
                <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:50px;">
                    <ul>
                        @php
                        if(!empty($product->image->image)){
                        $data = $product->image->image;
                        $img = json_decode($data,true);
                        $i = 0;
                        if(count($img) > 1){
                        foreach($img as $img){
                        echo '<li class="float-left rounded-circle mr-2 more-img" data-id="'.$product->id.'"
                            data-src="'.$img.'" style="background-image:url('.$img.');"></li>';
                        $i++;
                        }
                        }
                        }
                        @endphp
                    </ul>
                </div>
                <p class="card-title p-1 text-dark mb-0">{{$product->title}}</p>

                <p class="p-1 text-dark font-weight-bold text-center mb-0">
                    @if($product->discount > 0)
                    <s class=font-weight-light>{{number_format($product->price)}}<u>đ</u></s>
                    {{number_format($product->price * (1-($product->discount / 100)))}}<u>đ</u>
                    @else
                    {{number_format($product->price)}}<u>đ</u>
                    @endif
                </p>

            </div>
        </a>
        @endforeach
        <div class="container-fluid padding text-center" style="clear:both;">
            <a class="btn btn-outline-dark btn-lg col-6 my-2 text-center font-weight-light" href="san-pham">Xem tất
                cả</a>
        </div>
        @else
        <p class='text-center'>Chưa có sản phẩm nào</p>
        @endif

    </div>
    @include('layout.dashboard')
</div>
@endsection

@section('title')
TAT SHOP - Cửa hàng quần áo trực tuyến tại Hồ Chí Minh
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