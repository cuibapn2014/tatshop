@extends('layout.layout_master')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 float-left m-0">
    <h2 class="display-4 updated_banner text-left">Kết quả tìm kiếm</h2>
    <hr class="bg-dark mt-0" style="height:3px;" />
    @if(session('notice'))
    <div class="alert alert-success col-8 mx-auto">
        <span class="closebtn float-right" style="cursor:poiter;"
            onclick="this.parentElement.style.display='none';">&times;</span>
        {{session('notice')}}
    </div>
    @endif
    <div class="container-fluid padding p-0">
        @if(count($product) > 0)
        <p class="alert alert-secondary">Tìm thấy {{count($product)}} kết quả với từ khóa
            "<strong>{{$keyword}}</strong>"</p>
        @foreach($product as $product)
        <a href="san-pham/{{$product->id}}/{{$product->_link}}" title="{{$product->title}}">
            <div class="card col-lg-3 col-md-4 col-sm-12 p-0 m-1 float-left">
                @if($product->discount > 0)
                <span class="discount text-center">-{{$product->discount}}%</span>
                @endif
                <div class="thumbnail">
                    <img id="img-{{$product->id}}" data-src="{{$product->thumbnail}}" style="object-fit:cover;" height="100%" width="100%"
                        alt="{{$product->title}}" />
                </div>
                <p class="card-title p-1 text-dark mb-1">{{$product->title}}</p>
                <div class="w-100 col-12 d-inline-block mt-0" style="overflow:hidden;max-height:50px;">
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
        @else
        <p class='text-center'>Không tìm thấy kết quả</p>
        @endif

    </div>
</div>
<div class="col-lg-3 col-md-12 col-sm-12 float-left m-0">
    <div class="container-fluid padding pt-2 px-0">
        @include("layout.display")
    </div>
</div>
@endsection

@section('title')
Tìm kiếm từ khóa '{{$keyword}}'
@endsection