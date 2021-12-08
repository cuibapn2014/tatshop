@extends('layout.layout_master')
@section('content')
<div class="container-fluid padding detail mt-4">
    @if(session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
    @endif
    <div class="col-lg-6 col-md-12 col-sm-12 img-product float-left position-relative">
        <?php
	if(!empty($product->image->image)){
		$data = $product->image->image;
		$img = json_decode($data,true);
		$x = count($img);
		echo '<img id="img" class="img_pro" data-src="'.$img[$x-1].'" width="100%" height="400px"/>';;
	}
	?>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
	if(!empty($product->image->image)){
		$data = $product->image->image;
		$img = json_decode($data,true);
		$i = 0;
		foreach($img as $img){
		echo '<li class="splide__slide mr-2 border"><img src="'.$img.'" width="100%" height="100px" onclick="changeImg(this)"/></li>';
		$i++;
		}
	}
	?>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 border add-card float-left p-2">
        <div class="col-12 text-left p-0">
            <h2 class="display-4" style="font-size:27px">{{$product->title}}</h2>
        </div>
        <div class="col-12 border-bottom m-2 p-0 border-dark d-flex flex-row justify-content-between">
            <p class="mb-1">
                <i class="fas fa-warehouse"></i> Còn {{$product->qty}} cái
            <p>
                <i class="bi bi-cart-check-fill"></i>
                {{$product->sold}} cái
            </p>
            </p>
            @if($product->discount > 0)
            <h2 class="display-4" style="font-size:24px;"><s>{{number_format($product->price)}}đ</s> |
                -{{$product->discount}}%</h2>
            @endif
        </div>
        <div class="col-12 form-order">
            <form action="cart/add/{{$product->id}}" method="get">
                <div class="form-group">
                    @php
                    if($product->attr->size != "[null]"){
                    $data = $product->attr->size;
                    $size = json_decode($data,true);
                    echo "<label>Chọn Size</label>: ";
                    echo "<select name='size'>";
                        foreach($size as $size){
                        echo '<option value="'.$size.'">'.$size.'</option>';
                        }
                        echo "</select>";
                    }
                    @endphp
                </div>
                <div class="form-group">
                    <?php
	if($product->attr->color != "[null]"){
		$data = $product->attr->color;
		$color = json_decode($data,true);
		echo "<label>Chọn Màu</label>:";
		foreach($color as $color){
		echo '<input id="'.$color.'" class="check-size" type="radio" name="color" value="'.$color.'"/>';
		echo "<label for='".$color."'><span class='text-center color'>".$color."</span></label>";
		}
	}
	?>
                </div>
                <div class="form-group">
                    <label>Số lượng: </label>
                    <div>
                        <button id="minus" class="float-left btn btn-light text-center p-2 border-0"><i
                                class="bi bi-dash-lg"></i></button>
                        <input id="amount" type="number" name="qty" class="float-left text-center py-1" min="1"
                            max="{!!$product->qty!!}" value="1" style="height:40px;width:50px;" />
                        <button id="plus" class="float-left btn btn-light text-center p-2 border-0"><i
                                class="bi bi-plus-lg"></i></button>
                    </div>
                </div>
                @if($product->discount > 0)
                <p class="display-4 text-info w-100 float-left mt-2" style="font-size:32px;">
                    {{number_format($product->price * (1 - ($product->discount/100)))}}<u>đ</u></p>
                @else
                <p class="display-4 text-info w-100 text-left float-left" style="font-size:32px;">
                    {{number_format($product->price)}}<u>đ</u></p>
                @endif
                @if($product->qty > 0)
                <div class="form-group">
                    <button class="btn btn-info btn-pay" type="submit">Thêm vào giỏ <i
                            class="bi bi-cart-plus-fill"></i></button>
                </div>
                @else
                <div class="form-group">
                    <a class="btn btn-secondary text-white p-2">Hết hàng</a>
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="container-fluid col-lg-8 col-md-6 col-sm-12 p-0 float-left">
        <div class="col-12 p-1">
            <h2 class="display-4 mt-3" style="font-size:24px;clear:both;">Mô tả sản phẩm</h2>
            <hr />
            <p class="text">
                {!!$product->content!!}
            </p>
        </div>
        <div class="col-12 p-0">
            <h2 class="display-4 mt-3" style="font-size:24px;clear:both;">Đánh giá từ khách hàng</h2>
            <hr />
            @if(count($errors) >0)
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{$err}}</p>
            @endforeach
            @endif
            @if(session('danger1'))
            <p class="alert alert-danger">{{session('danger1')}}</p>
            @endif
            @if(session('notice1'))
            <p class="alert alert-success">{{session('notice1')}}</p>
            @endif
            <div class="col-12">
                <form action="san-pham/{{$product->id}}/{{$product->_link}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    <div class="form-group">
                        <label for="comment">Nhập đánh giá</label>
                        <input id="comment" class="form-control" type="text"
                            placeholder="Bạn cảm thấy sản phẩm này như thế nào.." name="comments" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Gửi đánh giá</button>
                    </div>
                </form>
                <hr />
            </div>
            <div class="col-12">
                @if(count($reply)>0)
                @foreach($reply as $rep)
                <div class="media">
                    <img data-src="{{strpos($rep->user->image,'ttps://') > 0 ? $rep->user->image : 'image/'.$rep->user->image}}"
                        class="mr-3 rounded-circle" width="64px" height="64px" style="object-fit:cover;"
                        alt="{{$rep->user->name}}">
                    <div class="media-body">
                        <h5 class="mt-0">
                            {{$rep->user->name}}
                        </h5>
                        <p><i class="far fa-clock"></i> {{\Carbon\Carbon::parse($rep->created_at)->diffForHumans()}}</p>
                        <p class="text-warning">
                            @for($i=0;$i < $rep->vote;$i++)
                                <i class="bi bi-star-fill"></i>
                                @endfor
                        </p>
                        {{$rep->content}}
                    </div>
                </div>
                <hr />
                @endforeach
                @else
                <p class="text-center">Chưa có đánh giá mới</p>
                @endif
            </div>
        </div>
        <div class="container-fluid padding p-0 float-left">
            @if(count($relate) > 0)
            <h2 class="font-weight-light" style="font-size:28px;">Sản phẩm liên quan</h2>
            <hr class="bg-dark mt-0" style="height:3px;" />
            @foreach($relate as $relate)
            <a href="san-pham/{{$relate->id}}/{{$relate->_link}}" title="{{$relate->title}}">
                <div class="card col-lg-3 col-md-4 col-sm-12 p-0 m-1 float-left">
                    @if($relate->discount > 0)
                    <span class="discount text-center">-{{$relate->discount}}%</span>
                    @endif
                    <div class="thumbnail">
                        <img id="img-{{$relate->id}}" data-src="{{$relate->thumbnail}}" style="object-fit:cover;"
                            height="100%" width="100%" />
                    </div>
                    <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:50px;">
                        <ul>
                            @php
                            if(!empty($relate->image->image)){
                            $data = $relate->image->image;
                            $img = json_decode($data,true);
                            $i = 0;
                            if(count($img) > 1){
                            foreach($img as $img){
                            echo '<li class="float-left rounded-circle mr-2 more-img" data-id="'.$relate->id.'"
                                data-src="'.$img.'" style="background-image:url('.$img.');"></li>';
                            $i++;
                            }
                            }
                            }
                            @endphp
                        </ul>
                    </div>
                    <p class="card-title p-1 text-dark">{{$relate->title}}</p>
                    <p class="p-1 text-dark font-weight-bold text-center mb-0">
                        @if($relate->discount > 0)
                        <s class=font-weight-light>{{number_format($relate->price)}}<u>đ</u></s>
                        {{number_format($relate->price * (1-($relate->discount / 100)))}}<u>đ</u>
                        @else
                        {{number_format($relate->price)}}<u>đ</u>
                        @endif
                    </p>
                </div>
            </a>
            @endforeach
            @endif
        </div>
        <div class="container-fluid padding p-0 float-left mt-2">
            @if(count(session('product')) > 0)
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
                        <img id="img-{{$visited[$i]['item']->id}}x" data-src="{{$visited[$i]['item']->thumbnail}}"
                            style="object-fit:cover;" class="card-img" height="100%"
                            alt="{{$visited[$i]['item']->title}}" />
                    </div>
                    <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:50px;">
                        <ul>
                            @php
                            if(!empty($visited[$i]['item']->image->image)){
                            $data = $visited[$i]['item']->image->image;
                            $img = json_decode($data,true);
                            if(count($img) > 1){
                            foreach($img as $img){
                            echo '<li class="float-left rounded-circle mr-2 more-img"
                                data-id="'.$visited[$i]['item']->id.'x" data-src="'.$img.'"
                                style="background-image:url('.$img.');"></li>';
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
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 p-0 float-left">
        <h2 class="display-4 mt-3" style="font-size:24px;clear:both;">Sản phẩm ngẫu nhiên</h2>
        <hr />
        @if($random)
        @foreach($random->get() as $ran)
        <a href="san-pham/{{$ran->id}}/{{$ran->_link}}" title="{{$ran->title}}">
            <div class="p-0 mt-2 ran-pro border d-flex flex-row flex-nowrap">
                <img id="img-slide" data-src="{{$ran->thumbnail}}" class="card-img w-100 flex-grow-1 thumbnail p-0"
                    style="object-fit:cover;min-width:200px;" />
                <div class="col-7" style="height:100%;">
                    <p class="card-title p-1 text-dark" style="font-size:18px;">{{$ran->title}}</p>
                    <p class="p-1 text-dark font-weight-bold">
                        @if($ran->discount > 0)
                        {{number_format($ran->price * (1-($ran->discount / 100)))}}<u>đ</u><br />
                        <s class="font-weight-light">{{number_format($ran->price)}}<u>đ</u></s>
                        @else
                        {{number_format($ran->price)}}<u>đ</u>
                        @endif
                    </p>
                    <p class="p-1 act">
                        <a class="add_cart btn btn-info" href="san-pham/{{$ran->id}}/{{$ran->_link}}">
                            Xem chi tiết
                        </a>
                    </p>
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Splide('.splide', {
        perPage: 3,
        rewind: true,
    }).mount();
});
</script>
@endsection
@section('title')
{{$product->title}} - TAT SHOP
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}san-pham/{{$product->id}}/{{$product->_link}}" />
<meta property="og:type" content="article" />
<meta property="og:keyword" content="{{$product->keyword}}" />
<meta property="og:title" content="{{$product->title}}" />
<meta property="og:image" content="{{$product->thumbnail}}" />
@endsection