<h2 class="display-4 fs-3 border-bottom border-3 border-dark">Sản phẩm</h2>
<div id="category" class="border p-2 position-relative">
    <a href="/san-pham#box_1">
        <p class="text-dark border-bottom">Áo Nam</p>
    </a>
    <a href="/san-pham#box_2">
        <p class="text-dark border-bottom">Áo Nữ</p>
    </a>
    <a href="/san-pham#box_3">
        <p class="text-dark border-bottom">Quần Nam</p>
    </a>
    <a href="/san-pham#box_4">
        <p class="text-dark border-bottom">Quần Nữ</p>
    </a>
    <a href="/san-pham#box_5">
        <p class="text-dark border-bottom">Đầm</p>
    </a>
    <a href="/san-pham#box_6">
        <p class="text-dark border-bottom">Giày Nam</p>
    </a>
    <a href="/san-pham#box_7">
        <p class="text-dark border-bottom">Giày Nữ</p>
    </a>
    <a href="/san-pham#box_8">
        <p class="text-dark border-bottom">Balo</p>
    </a>
</div>
<div id="more" class="bg-dark w-100 text-white p-2 text-center">Xem thêm <i class='fas fa-chevron-down pt-1'></i></div>

@if(count($data_share['mostBuy']) > 0)
<h2 class="display-4 fs-3 border-bottom border-3 border-dark mt-2">Mua nhiều nhất</h2>

<div id="most-buy" class="col-12 p-0">
    <div id="carouselMostBuy" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{$data_share['mostBuy']->first()->thumbnail}}" class="d-block w-100"
                    alt="{{$data_share['mostBuy']->first()->title}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$data_share['mostBuy']->first()->title}}</p>
                    @if($data_share['mostBuy']->first()->discount <= 0) <p class="font-weight-light">
                        {{number_format($data_share['mostBuy']->first()->price)}}đ</p>
                        @else
                        <p class="font-weight-light">
                            {{number_format($data_share['mostBuy']->first()->price * (1 - $data_share['mostBuy']->first()->discount/100))}}đ
                            <small
                                class="font-weight-bold"><s>{{number_format($data_share['mostBuy']->first()->price)}}đ</s></small>
                        </p>
                        @endif
                        <a class="btn btn-outline-info"
                            href="san-pham/{{$data_share['mostBuy']->shift()->id}}/{{$data_share['mostBuy']->shift()->_link}}">Mua
                            Ngay</a>
                </div>
            </div>
            @foreach($data_share['mostBuy'] as $buy)
            <div class="carousel-item " data-bs-interval="5000">
                <img src="{{$buy->thumbnail}}" class="d-block w-100" alt="{{$buy->thumbnail}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$buy->title}}</p>
                    @if($buy->discount <= 0) <p class="font-weight-light">{{number_format($buy->price)}}đ</p>
                        @else
                        <p class="font-weight-light">{{number_format($buy->price * (1 - $buy->discount/100))}}đ
                            <small class="font-weight-bold"><s>{{number_format($buy->price)}}đ</s></small>
                        </p>
                        @endif
                        <a class="btn btn-outline-info" href="san-pham/{{$buy->id}}/{{$buy->_link}}">Mua Ngay</a>
                </div>
            </div>
            @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselMostBuy" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselMostBuy" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endif

@if(count($data_share['sale']) > 0)
<h2 class="display-4 fs-3 border-bottom border-3 border-dark mt-2">Đang giảm giá</h2>

<div id="sale" class="col-12 p-0">
    <div id="carouselSale" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{$data_share['sale']->first()->thumbnail}}" class="d-block w-100"
                    alt="{{$data_share['sale']->first()->title}}">
                <span class="display-4 position-absolute text-white"
                    style="top:0; right:0;">-{{$data_share['sale']->first()->discount}}%</span>
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$data_share['sale']->first()->title}}</p>
                    <p class="font-weight-light">
                        {{number_format($data_share['sale']->first()->price * (1 - $data_share['sale']->first()->discount/100))}}đ
                        <small
                            class="font-weight-bold"><s>{{number_format($data_share['sale']->first()->price)}}đ</s></small>
                    </p>
                    <a class="btn btn-outline-info"
                        href="san-pham/{{$data_share['sale']->first()->id}}/{{$data_share['sale']->shift()->_link}}">Mua
                        Ngay</a>
                </div>
            </div>
            @foreach($data_share['sale'] as $data_share['sale'])
            <div class="carousel-item " data-bs-interval="5000">
                <img src="{{$data_share['sale']->thumbnail}}" class="d-block w-100"
                    alt="{{$data_share['sale']->title}}">
                <span class="display-4 position-absolute text-white"
                    style="top:0; right:0;">-{{$data_share['sale']->discount}}%</span>
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$data_share['sale']->title}}</p>
                    <p class="font-weight-light">
                        {{number_format($data_share['sale']->price * (1 - $data_share['sale']->discount/100))}}
                        <small class="font-weight-bold"><s>{{number_format($data_share['sale']->price)}}đ</s></small>
                    </p>
                    <a class="btn btn-outline-info"
                        href="san-pham/{{$data_share['sale']->id}}/{{$data_share['sale']->_link}}">Mua Ngay</a>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselSale" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselSale" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endif

@if(count($data_share['comment']) > 0)
<h2 class="display-4 fs-3 border-bottom border-3 border-dark mt-2">Đánh giá khách hàng</h2>

<div id="sale" class="col-12 p-0">
    <div id="carouselComment" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{$data_share['comment']->first()->product->thumbnail}}" class="d-block w-100 _img-vote"
                    alt="{{$data_share['comment']->first()->product->title}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$data_share['comment']->first()->user->name}}</p>
                    <p>{{$data_share['comment']->first()->content}}</p>
                    <p class="text-warning">
                        @for($i = 0; $i < $data_share['comment']->first()->vote;$i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            @if($data_share['comment']->first()->vote < 5) @for($i=0;$i < 5 - $data_share['comment']->
                                first()->vote;$i++)
                                <i class="far fa-star"></i>
                                @endfor
                                @endif
                                {{$data_share['comment']->shift()->vote}}.0
                    </p>
                </div>
            </div>
            @foreach($data_share['comment'] as $data_share['comment'])
            <div class="carousel-item " data-bs-interval="5000">
                <img src="{{$data_share['comment']->product->thumbnail}}" class="d-block w-100"
                    alt="{{$data_share['comment']->product->title}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$data_share['comment']->user->name}}</p>
                    <p>{{$data_share['comment']->content}}</p>
                    <p class="text-warning">
                        @for($i = 0; $i < $data_share['comment']->vote;$i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            @if($data_share['comment']->vote < 5) @for($i=0;$i < 5 - $data_share['comment']->vote;$i++)
                                <i class="far fa-star"></i>
                                @endfor
                                @endif
                                {{$data_share['comment']->vote}}.0
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if(count($data_share['blog']) > 0)
<h2 class="display-4 fs-3 border-bottom border-3 border-dark mt-2">Blog</h2>

<div id="sale" class="col-12 p-0">
    <div id="carouselBlog" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="{{$data_share['blog']->first()->image}}" class="d-block w-100"
                    alt="{!!$data_share['blog']->first()->content!!}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{!!$data_share['blog']->first()->content!!}</p>
                    <p><i class="fas fa-heart text-danger"></i> {{count($data_share['blog']->shift()->_like)}}</p>
                </div>
            </div>
            @foreach($data_share['blog'] as $data_share['blog'])
            <div class="carousel-item" data-interval="10000">
                <img src="{{$data_share['blog']->image}}" class="d-block w-100"
                    alt="{!!$data_share['blog']->content!!}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{!!$data_share['blog']->content!!}</p>
                    <p><i class="fas fa-heart text-danger"></i> {{count($data_share['blog']->_like)}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<h2 class="display-4 fs-3 border-bottom border-3 border-dark mt-2">Lọc sản phẩm</h2>

<div id="filters" role="form">
    <form action="filter" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @foreach($data_share['filters'] as $filter)
        <details class="w-100 m-0 p-0" open="open">
            <summary class="w-100 p-2 m-0">{{$filter->category}} ({{count($filter->subcategory)}})</summary>
            @foreach($filter->subcategory as $f)
            <div class="form-check">
                <input class="form-check-input check-filter" id="filter-{{$f->id_subcategory}}t"
                    data-id="{{$f->id_subcategory}}" name="filter-{{$f->id_subcategory}}" type="checkbox"
                    value="{{$f->sub_category}}" />
                <label for="filter-{{$f->id_subcategory}}" class="form-check-label">{{$f->sub_category}}<label>
            </div>
            @endforeach
        </details>
        @endforeach
        <button id="filter_btn" class="btn btn-outline-dark btn-md" type="button">Lọc sản phẩm <i
                class="bi bi-funnel"></i></button>
    </form>
</div>