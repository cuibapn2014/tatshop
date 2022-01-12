@extends('layout.layout_master')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 float-left m-0">
    <h2 class="display-4 updated_banner text-left">{{$check->sub_category}} - {{$check->category->category}}</h2>
    <hr class="bg-dark mt-0" style="height:3px;" />
    @if(session('notice'))
    <div class="alert alert-success col-8 mx-auto">
        <span class="closebtn float-right" style="cursor:poiter;"
            onclick="this.parentElement.style.display='none';">&times;</span>
        {{session('notice')}}
    </div>
    @endif
    <div class="container-fluid padding p-0">
        @if(count($filter) > 0)
        @foreach($filter as $filte)
        <a href="san-pham/{{$filte->id}}/{{$filte->str_slug}}" title="{{$filte->title}}">
            <div class="card col-lg-3 col-md-4 col-sm-12 p-0 m-1 float-left">
                @if($filte->discount > 0)
                <span class="discount text-center">-{{$filte->discount}}%</span>
                @endif
                <div class="thumbnail">
                    <img id="img-{{$filte->id}}" data-src="{{$filte->thumbnail}}" style="object-fit:cover;"
                        height="100%" width="100%" alt="{{$filte->title}}" />
                </div>
                <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:50px;">
                    <ul>
                        @php
                        if(!empty($filte->image)){
                        $data = $filte->image;
                        $i = 0;
                        if(count($data) > 1){
                        foreach($data as $img){
                        echo '<li class="float-left rounded-circle mr-2 more-img" data-id="'.$filte->id.'"
                            data-src="'.$img->image.'" style="background-image:url('.$img->image.');"></li>';
                        $i++;
                        }
                        }
                        }
                        @endphp
                    </ul>
                </div>
                <p class="card-title p-1 text-dark">{{$filte->title}}</p>
                <p class="p-1 text-dark font-weight-bold text-center mb-0">
                    @if($filte->discount > 0)
                    <s class=font-weight-light>{{number_format($filte->price)}}<u>đ</u></s>
                    {{number_format($filte->price * (1-($filte->discount / 100)))}}<u>đ</u>
                    @else
                    {{number_format($filte->price)}}<u>đ</u>
                    @endif
                </p>
            </div>
        </a>
        @endforeach
        <div class="col-12 w-100 text-right">
            {{$filter->links()}}
        </div>
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
{{$check->sub_category}} - {{$check->category->category}}
@endsection