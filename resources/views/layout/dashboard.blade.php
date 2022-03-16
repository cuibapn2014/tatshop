@php
$visited = session('product');
@endphp
<div class="container-fluid p-0 mt-2 overflow-hidden">
    @if(count($data_share['deal']) > 0)
    <div id="_event-1">
        <h2 class="font-weight-light" style="font-size:28px;">
            <p class="float-left m-2">DEAL MỚI</p>
            <div id="expire-deals" class="text-white text-center float-left" data-time="{{\Carbon\Carbon::parse($data_share['deal']->first()->expired)->toDayDateTimeString()}}">
                <p class="days count bg-dark rounded p-2">0d</p>
                <p class="hours count bg-dark rounded p-2">0h</p>
                <p class="minutes count bg-dark rounded p-2">0m</p>
                <p class="seconds count bg-dark rounded p-2">0s</p>
            </div>
        </h2>
        <div class="clearfix"></div>
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
    <h2 class="font-weight-light mt-2" style="font-size:28px;">Sản phẩm đã xem gần đây</h2>
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @for($i = (count($visited)-1);$i >= 0;$i--)
            <div class="swiper-slide">
                <a href="san-pham/{{$visited[$i]['item']->id}}/{{$visited[$i]['item']->str_slug}}" title="{{$visited[$i]['item']->title}}">
                    <div class="col-sm-12 p-0 m-1 float-left">
                        @if($visited[$i]['item']->discount > 0)
                        <span class="discount text-center">-{{$visited[$i]['item']->discount}}%</span>
                        @endif
                        <div class="thumbnail">
                            <img id="img-{{$visited[$i]['item']->id}}x" data-src="{{$visited[$i]['item']->thumbnail}}" style="object-fit:cover;" class="card-img" height="100%" alt="{{$visited[$i]['item']->title}}" />
                        </div>
                        <div class="w-100 col-12 d-inline-block mt-3" style="overflow:hidden;max-height:30px;">
                            <ul>
                                @php
                                if(count($visited[$i]['item']->image) > 1){
                                $img = $visited[$i]['item']->image;
                                foreach($img as $img){
                                echo '<li class="float-left rounded-circle mr-2 more-img" data-src="'.$img['image'].'" data-id="'.$visited[$i]['item']->id.'x" style="background-image:url('.$img['image'].');">
                                </li>';
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
    @if($data_share['comment']->count() > 0)
    <h2 class="font-weight-light mt-2" style="font-size:24px;">Nhận xét của khách hàng</h2>
    <div class="mySwiper" style="height: 300px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @foreach($data_share['comment'] as $comment)
            <div class="swiper-slide shadow d-flex flex-column bg-dark rounded">
                <div class="w-100 position-relative d-flex justify-content-center wallpaper-comment" style="height: 50%; background-image: url({{$comment->product->thumbnail}});">
                    <img class="rounded-circle position-absolute" src="{{strpos($comment->user->image,'ttps://') == 1 ? $comment->user->image : 'image/'.$comment->user->image}}" width="70px" height="70px" style="object-fit:cover;bottom: -30px;">
                </div>
                <div class="comment col-12 text-white">
                    <p class="fs-5 font-weight-bold mt-4 mb-0">{{$comment->user->name}}</p>
                    <p class="fs-6 text-warning m-0"><i class="bi bi-star-fill"></i> {{$comment->vote}}.0</p>
                    <p class="fs-6 d-cmt text-secondary">{{$comment->content}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @if($data_share['blog']->count() > 0)
    <h2 class="font-weight-light mt-3" style="font-size:24px;">Nhật ký của TAT</h2>
    <div class="mySwiperBlog" style="height: 300px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @foreach($data_share['blog'] as $blog)
            <div class="swiper-slide shadow d-flex flex-column bg-light rounded">
                <div class="w-100 position-relative d-flex justify-content-center wallpaper-comment" style="height: 50%; background-image: url({{$blog->image}});">
                </div>
                <div class="comment col-12 text-dark">
                    <p class="fs-5 font-weight-bold mb-0">{{$blog->written}}</p>
                    <p class="fs-6 m-0"><i class="bi bi-heart-fill text-danger"></i> {{$blog->_like->count()}}</p>
                    <p class="fs-6 d-cmt m-0"> {!!$blog->content!!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
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
        slidesPerView: 3,
        spaceBetween: 30,
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
                    mySwiper.params.slidesPerView = 3;
                } else {
                    mySwiper.params.slidesPerView = 1;
                }
                mySwiper.init();
            },
        },

    });

    var mySwiperBlog = new Swiper(".mySwiperBlog", {
        slidesPerView: 3,
        spaceBetween: 30,
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
                    mySwiperBlog.params.slidesPerView = 3;
                } else {
                    mySwiperBlog.params.slidesPerView = 1;
                }
                mySwiper.init();
            },
        },

    });
</script>