@php
$visited = session('product');
@endphp
<div class="container-fluid p-0 mt-2">
    @if(count($data_share['deal']) > 0)
    <div id="_event-1">
        <h2 class="font-weight-light" style="font-size:28px;">
            <p class="float-left m-2">DEAL MỚI</p>
            <div id="expire-deals" class="text-white text-center float-left"
                data-time="{{\Carbon\Carbon::parse($data_share['deal']->first()->expired)->toDayDateTimeString()}}">
                <p class="days count bg-dark rounded p-2">0d</p>
                <p class="hours count bg-dark rounded p-2">0h</p>
                <p class="minutes count bg-dark rounded p-2">0m</p>
                <p class="seconds count bg-dark rounded p-2">0s</p>
            </div>
        </h2>
        <div class="clearfix"></div>
        <hr class="bg-dark mt-0" style="height:3px;" />
        <div class="col-12 p-0 float-left">
            @foreach($data_share['code'] as $code)
            <div class="card col-lg-3 col-md-4 col-sm-12 float-left text-center" style="height:200px !important;">
                <p class="font-weight-bold m-0" style="font-size:3rem;"><i class="fas fa-ticket-alt"></i></p>
                <strong>{{$code->code}}</strong>
                <p class="w-100 m-0 text-justify text-secondary">Áp dụng đơn tối thiểu {{number_format($code->min)}}đ
                </p>
                <p class="w-100 m-0 text-justify text-secondary">Giảm {{$code->discount}}% giá trị đơn hàng khi thanh
                    toán</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @if($visited != null)
    <h2 class="font-weight-light" style="font-size:28px;">Sản phẩm đã xem gần đây</h2>
    <hr class="bg-dark mt-0" style="height:3px;" />
    @for($i = (count($visited)-1);$i >= 0;$i--)
    <a href="san-pham/{{$visited[$i]['item']->id}}/{{$visited[$i]['item']->_link}}"
        title="{{$visited[$i]['item']->title}}">
        <div class="card col-lg-3 col-md-4 col-sm-12 p-0 m-1 float-left">
            @if($visited[$i]['item']->discount > 0)
            <span class="discount text-center">-{{$visited[$i]['item']->discount}}%</span>
            @endif
            <div class="thumbnail">
                <img id="img-{{$visited[$i]['item']->id}}x" data-src="{{$visited[$i]['item']->thumbnail}}" style="object-fit:cover;" class="card-img"
                    height="100%" alt="{{$visited[$i]['item']->title}}" />
            </div>
            <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:50px;">
                <ul>
                    @php
                    if(!empty($visited[$i]['item']->image->image)){
                    $data_share = $visited[$i]['item']->image->image;
                    $img = json_decode($data_share,true);
                    if(count($img) > 1){
                    foreach($img as $img){
                    echo '<li class="float-left rounded-circle mr-2 more-img" data-src="'.$img.'" data-id="'.$visited[$i]['item']->id.'x" style="background-image:url('.$img.');">
                    </li>';
                    }
                    }
                    }
                    @endphp
                </ul>
            </div>
            <p class="card-title p-1 text-dark">{{$visited[$i]['item']->title}}</p>
            <p class="p-1 text-dark font-weight-bold text-center mb-0">
                @if($visited[$i]['item']->discount > 0)
                <s class="font-weight-light">{{number_format($visited[$i]['item']->price)}}<u>đ</u></s>
                {{number_format($visited[$i]['item']->price * (1-($visited[$i]['item']->discount / 100)))}}<u>đ</u>
                @else
                {{number_format($visited[$i]['item']->price)}}<u>đ</u>
                @endif
            </p>
        </div>
    </a>
    @endfor
    @endif
</div>