@extends('layout.layout_master')
@section('content')
<div class="col-lg-3 col-md-12 col-sm-12 float-left m-0">
    <div class="container-fluid padding pt-2 px-0">
        @include("layout.display")
    </div>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 float-left m-0">
    <div class="container-fluid padding p-0">
        @foreach($cate as $cate)
        <h2 class="display-4 mt-3 border-bottom border-3 border-dark fs-3">{{$cate->category}}</h2>
        <div id="box_{{$cate->id}}" class="col-12 float-left p-0">
            @if(count($cate->product) > 0)
            @php
            $i = count($cate->product) - 1;
            $end;
            if(count($cate->product) > 20){
            $end = $i - 21;
            }else{
            $end = 0;
            }
            @endphp
            @for($i;$i >= $end;$i--)
            <a href="san-pham/{{$cate->product[$i]->id}}/{{$cate->product[$i]->str_slug}}"
                title="{{$cate->product[$i]->title}}">
                <div class="card col-lg-3 col-md-4 col-sm-12 p-0 m-1 float-left">
                    @if($cate->product[$i]->discount > 0)
                    <span class="discount text-center">-{{$cate->product[$i]->discount}}%</span>
                    @endif
                    <div class="thumbnail">
                        <img id="img-{{$cate->product[$i]->id}}" data-src="{{$cate->product[$i]->thumbnail}}"
                            class="card-img" alt="{{$cate->product[$i]->title}}" />
                        @if($cate->product[$i]->qty <= 0) 
                        <p class="p-4">Hết hàng</p>
                            @endif
                    </div>
                    <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:50px;">
                        <ul>
                            @php
                            if(!empty($cate->product[$i]->image)){
                            $data = $cate->product[$i]->image;
                            if(count($data) > 1){
                            foreach($data as $img){
                            echo '<li class="float-left rounded-circle mr-2 more-img"
                                data-id="'.$cate->product[$i]->id.'" data-src="'.$img->image.'"
                                style="background-image:url('.$img->image.');"></li>';
                            }
                            }
                            }
                            @endphp
                        </ul>
                    </div>
                    <p class="card-title p-1 text-dark">{{$cate->product[$i]->title}}</p>
                    <p class="p-1 w-100 text-dark font-weight-bold text-center price mb-0">
                        @if($cate->product[$i]->discount > 0)
                        <s class="font-weight-light">{{number_format($cate->product[$i]->price)}}<u>đ</u></s>
                        {{number_format($cate->product[$i]->price * (1-($cate->product[$i]->discount / 100)))}}<u>đ</u>
                        @else
                        {{number_format($cate->product[$i]->price)}}<u>đ</u>
                        @endif
                    </p>
                </div>
            </a>
            @endfor

            @if($end > 0)
            <div class="col-12 text-center float-left">
                <a href="category/{{$cate->id_category}}" class="btn btn-outline-dark btn-md" style="width:50%;">Xem thêm</a>
            </div>
            @endif

            @else
            <p class='text-center'>Chưa có sản phẩm nào</p>
            @endif
        </div>
        @endforeach
    </div>
    @include('layout.dashboard')
</div>

@endsection
@section('title')
Sản phẩm - TAT SHOP
@endsection
@section('seo')
<meta type="og:title" content="Sản phẩm - TAT SHOP" />
<meta type="og:type" content="article" />
<meta property="og:keyword"
    content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp, tat shop" />
<meta type="og:description" content="Cửa hàng quần áo trực tuyến tại TP Hồ Chí Minh" />
<meta type="og:image"
    content="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80" />
@endsection