@extends('layout.layout_master')
@section('content')
<div class="container-fluid padding detail mt-4 pt-2">
    @if(session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
    @endif
    <div class="col-lg-6 col-md-12 col-sm-12 img-product float-left position-relative">
        <?php
        if (!empty($product->image)) {
            $data = $product->image;
            $x = count($data);
            echo '<img id="img" class="img_pro" data-src="' . $data[$x - 1]->image . '" width="100%" height="400px"/>';;
        }
        ?>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    if (!empty($product->image)) {
                        $data = $product->image;
                        $i = 0;
                        foreach ($data as $img) {
                            echo '<li class="splide__slide mr-2 border"><img src="' . $img->image . '" width="100%" height="100px" onclick="changeImg(this)"/></li>';
                            $i++;
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 border add-card float-left p-2 bg-light">
        <div class="col-12 text-left p-0">
            <h2 class="display-4" style="font-size:27px">{{$product->title}}</h2>
        </div>
        <div class="col-12 border-bottom m-2 p-0 border-dark d-flex flex-row justify-content-between">
            <p class="mb-1">
                <i class="fas fa-warehouse"></i> 
                @if($product->qty > 0) 
                Còn hàng
                @else
                Hết hàng
                @endif
            <p>
                <i class="bi bi-cart-check-fill"></i>
                {{$product->sold > 0 ? $product->sold : 0}} cái
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
                    if($product->attr != null){
                    $data = $product->attr;
                    echo "<label>Chọn Size</label>: ";
                    echo "<select name='size'>";
                        foreach($data as $size){
                        if($size->name == "size")
                        echo '<option value="'.$size->value.'">'.$size->value.'</option>';
                        }
                        echo "</select>";
                    }
                    @endphp
                </div>
                <div class="form-group">
                    <?php
                    if ($product->attr != null) {
                        $data = $product->attr;
                        echo "<label>Chọn Màu</label>:";
                        foreach ($data as $color) {
                            if ($color->name == "color") {
                                echo '<input id="' . $color->value . '" class="check-size" type="radio" name="color" value="' . $color->value . '"/>';
                                echo "<label for='" . $color->value . "'><span class='text-center color'>" . $color->value . "</span></label>";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Số lượng: </label>
                    <div>
                        <button id="minus" class="float-left btn btn-light text-center p-2 border-0"><i class="bi bi-dash-lg"></i></button>
                        <input id="amount" type="number" name="qty" class="float-left text-center py-1" min="1" max="{!!$product->qty!!}" value="1" style="height:40px;width:50px;" />
                        <button id="plus" class="float-left btn btn-light text-center p-2 border-0"><i class="bi bi-plus-lg"></i></button>
                    </div>
                </div>
                @if($product->discount > 0)
                <p class="display-4 text-info w-100 float-left mt-2" style="font-size:32px;">
                    {{number_format($product->price * (1 - ($product->discount/100)))}}<u>đ</u>
                </p>
                @else
                <p class="display-4 text-info w-100 text-left float-left" style="font-size:32px;">
                    {{number_format($product->price)}}<u>đ</u>
                </p>
                @endif
                @if($product->qty > 0)
                <div class="form-group">
                    <button class="btn btn-info btn-pay" type="submit">Thêm vào giỏ <i class="bi bi-cart-plus-fill"></i></button>
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
                <form action="san-pham/{{$product->id}}/{{$product->str_slug}}" method="post">
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
                        <input id="comment" class="form-control" type="text" placeholder="Bạn cảm thấy sản phẩm này như thế nào.." name="comments" />
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
                    <img data-src="{{strpos($rep->user->image,'ttps://') > 0 ? $rep->user->image : 'image/'.$rep->user->image}}" class="mr-3 rounded-circle" width="64px" height="64px" style="object-fit:cover;" alt="{{$rep->user->name}}">
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
        <div class="container-fluid overflow-hidden float-left">
            @if(count($relate) > 0)
            <h2 class="font-weight-light" style="font-size:28px;">Sản phẩm liên quan</h2>
            <div class="mySwiper p-2">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach($relate as $relate)
                    <div class="swiper-slide">
                        <a href="san-pham/{{$relate->id}}/{{$relate->str_slug}}" title="{{$relate->title}}">
                            <div class="col-12 p-0 m-1 float-left border-0">
                                @if($relate->discount > 0)
                                <span class="discount text-center">-{{$relate->discount}}%</span>
                                @endif
                                <div class="thumbnail">
                                    <img id="img-{{$relate->id}}" data-src="{{$relate->thumbnail}}" style="object-fit:cover;" height="100%" width="100%" />
                                </div>
                                <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:30px;">
                                    <ul>
                                        @php
                                        if(!empty($relate->image)){
                                        $data = $relate->image;
                                        $i = 0;
                                        if(count($data) > 1){
                                        foreach($data as $img){
                                        echo '<li class="float-left rounded-circle mr-2 more-img" data-id="'.$relate->id.'" data-src="'.$img->image.'" style="background-image:url('.$img->image.');"></li>';
                                        $i++;
                                        }
                                        }
                                        }
                                        @endphp
                                    </ul>
                                </div>
                                <p class="card-title p-1 text-dark mb-0 font-weight-bold text-left">{{$relate->title}}</p>
                                <p class="p-1 mb-0 font-weight-bold text-info fs-5">
                                    @if($relate->discount > 0)
                                    <s class="font-weight-light text-dark fs-6">{{number_format($relate->price)}}<u>đ</u></s>
                                    {{number_format($relate->price * (1-($relate->discount / 100)))}}<u>đ</u>
                                    @else
                                    {{number_format($relate->price)}}<u>đ</u>
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        <div class="container-fluid padding p-0 float-left mt-2">
            @if(count(session('product')) > 0)
            <h2 class="font-weight-light fs-3">Sản phẩm đã xem gần đây</h2>
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @for($i = (count($visited)-1);$i >= 0;$i--)
                    <div class="swiper-slide">
                        <a href="san-pham/{{$visited[$i]['item']->id}}/{{$visited[$i]['item']->str_slug}}" title="{{$visited[$i]['item']->title}}">
                            <div class="col-12 p-0 m-1 float-left border-0">
                                @if($visited[$i]['item']->discount > 0)
                                <span class="discount text-center">-{{$visited[$i]['item']->discount}}%</span>
                                @endif
                                <div class="thumbnail">
                                    <img id="img-{{$visited[$i]['item']->id}}x" data-src="{{$visited[$i]['item']->thumbnail}}" style="object-fit:cover;" class="card-img" height="100%" alt="{{$visited[$i]['item']->title}}" />
                                </div>
                                <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:30px;">
                                    <ul>
                                        @php
                                        if(!empty($visited[$i]['item']->image)){
                                        $data = $visited[$i]['item']->image;
                                        if(count($data) > 1){
                                        foreach($data as $img){
                                        echo '<li class="float-left rounded-circle mr-2 more-img" data-id="'.$visited[$i]['item']->id.'x" data-src="'.$img->image.'" style="background-image:url('.$img->image.');"></li>';
                                        }
                                        }
                                        }
                                        @endphp
                                    </ul>
                                </div>
                                <p class="card-title p-1 text-dark mb-0 font-weight-bold text-left">{{$visited[$i]['item']->title}}</p>
                                <p class="p-1 mb-0 font-weight-bold text-info fs-5">
                                    @if($visited[$i]['item']->discount > 0)
                                    <s class="font-weight-light text-dark fs-6">{{number_format($visited[$i]['item']->price)}}<u>đ</u></s>
                                    {{number_format($visited[$i]['item']->price * (1-($visited[$i]['item']->discount / 100)))}}<u>đ</u>
                                    @else
                                    {{number_format($visited[$i]['item']->price)}}<u>đ</u>
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 p-1 float-left">
        <h2 class="display-4 mt-3 fs-4" style="clear:both;">Sản phẩm ngẫu nhiên</h2>
        @if($random)
        @foreach($random->get() as $ran)
        <a href="san-pham/{{$ran->id}}/{{$ran->str_slug}}" title="{{$ran->title}}">
            <div class="p-0 mt-2 ran-pro border d-flex flex-row flex-nowrap">
                <img id="img-slide" data-src="{{$ran->thumbnail}}" class="card-img w-100 flex-grow-1 thumbnail p-0" style="object-fit:cover;min-width:170px;" />
                <div class="col-7" style="height:100%;">
                    <p class="card-title p-1 text-dark mb-0 font-weight-bold text-left">{{$ran->title}}</p>
                    <p class="p-1 mb-0 font-weight-bold text-info fs-5">
                        @if($ran->discount > 0)
                        {{number_format($ran->price * (1-($ran->discount / 100)))}}<u>đ</u><br />
                        <s class="font-weight-light text-dark fs-6">{{number_format($ran->price)}}<u>đ</u></s>
                        @else
                        {{number_format($ran->price)}}<u>đ</u>
                        @endif
                    </p>
                    <p class="p-1 act">
                        <a class="add_cart btn btn-info" href="san-pham/{{$ran->id}}/{{$ran->str_slug}}">
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
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".swiper", {
        slidesPerView: 2,
        spaceBetween: 10,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        on: {
            init: function() {},
            orientationchange: function() {},
            beforeResize: function() {
                let vw = window.innerWidth;
                if (vw > 1000) {
                    swiper.params.slidesPerView = 4;
                } else {
                    swiper.params.slidesPerView = 2;
                }
                swiper.init();
            },
        },

    });

    var mySwiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 10,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        on: {
            init: function() {},
            orientationchange: function() {},
            beforeResize: function() {
                let vw = window.innerWidth;
                if (vw > 1000) {
                    mySwiper.params.slidesPerView = 4;
                } else {
                    mySwiper.params.slidesPerView = 2;
                }
                mySwiper.init();
            },
        },

    });
</script>
@endsection
@section('title')
{{$product->title}} - TAT SHOP
@endsection
@section('seo')
<meta property="og:url" content="{{asset('san-pham')}}/{{$product->id}}/{{$product->str_slug}}" />
<meta property="og:type" content="article" />
<meta property="og:keyword" content="{{$product->keyword}}" />
<meta property="og:title" content="{{$product->title}}" />
<meta property="og:image" content="{{$product->thumbnail}}" />
@endsection