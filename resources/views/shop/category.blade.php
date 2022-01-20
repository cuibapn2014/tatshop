@extends('layout.layout_master')
@section('content')
<div class="col-lg-3 col-md-12 col-sm-12 float-left m-0">
    <div class="container-fluid padding pt-2 px-0">
        @include("layout.display")
    </div>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 float-left m-0">
    <div class="container-fluid padding p-0">

        <h2 class="display-4 mt-2" style="font-size:28px;">{{$product->first()->category->category}}</h2>
        <div class="col-12 float-left p-0">
            @if(count($product) > 0)
            @foreach($product as $p)
            <a href="san-pham/{{$p->id}}/{{$p->str_slug}}" title="{{$p->title}}">
                <div class="card col-lg-3 col-md-4 col-sm-12 p-0 m-1 float-left border-0">
                    @if($p->discount > 0)
                    <span class="discount text-center">-{{$p->discount}}%</span>
                    @endif
                    <div class="thumbnail">
                        <img id="img-{{$p->id}}" data-src="{{$p->thumbnail}}" style="object-fit:cover;" height="100%" width="100%" alt="{{$p->title}}" />
                    </div>
                
                    <div class="w-100 col-12 d-inline-block mt-2" style="overflow:hidden;max-height:30px;">
                        <ul>
                            @php
                            if(!empty($p->image)){
                            $data = $p->image;
                            $i = 0;
                            if(count($data) > 1){
                            foreach($data as $img){
                            echo '<li class="float-left rounded-circle mr-2 more-img" data-id="'.$p->id.'" data-src="'.$img->image.'" style="background-image:url('.$img->image.');"></li>';
                            $i++;
                            }
                            }
                            }
                            @endphp
                        </ul>
                    </div>
                    <p class="card-title p-1 text-dark mb-0 font-weight-bold text-left">{{$p->title}}</p>
                    <p class="p-1 mb-0 font-weight-bold text-info fs-5">
                        @if($p->discount > 0)
                        <s class="font-weight-light text-dark">{{number_format($p->price)}}<u>đ</u></s>
                        {{number_format($p->price * (1-($p->discount / 100)))}}<u>đ</u>
                        @else
                        {{number_format($p->price)}}<u>đ</u>
                        @endif
                    </p>
                </div>
            </a>
            @endforeach
            <div class="w-100 text-right">
                {{$product->links()}}
            </div>
            @else
            <p class='text-center'>Chưa có sản phẩm nào</p>
            @endif
        </div>
    </div>
    @include('layout.dashboard')
</div>
@endsection
@section('title')
{{$product->first()->category->category}} - TAT SHOP
@endsection
@section('seo')
<meta type="og:title" content="Sản phẩm - TAT SHOP" />
<meta type="og:type" content="article" />
<meta property="og:keyword" content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp, tat shop" />
<meta type="og:description" content="Cửa hàng quần áo trực tuyến tại TP Hồ Chí Minh" />
<meta type="og:image" content="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80" />
@endsection