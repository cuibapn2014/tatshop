<h2 class="display-4" style="font-size:28px;">Tìm kiếm</h2>
<hr class="bg-dark mt-0" style="height:3px;" />
<form action="search" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="form-group mb-1 p-0" style="height:60px;">
        <label class="search_btn bg-info p-2 text-center text-white rounded m-0" for="search">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </label>
        <input id="search" class="form-control" type="text" name="search" placeholder="Quần áo, giày dép,..." />
    </div>
</form>
<h2 class="display-4" style="font-size:28px;">Sản phẩm</h2>
<hr class="bg-dark mt-0" style="height:3px;" />
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

@if(count($mostBuy) > 0)
<h2 class="display-4 mt-2" style="font-size:28px;">Mua nhiều nhất</h2>
<hr class="bg-dark mt-0" style="height:3px;" />
<div id="most-buy" class="col-12 p-0">
    <div id="carouselMostBuy" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="{{$mostBuy->first()->thumbnail}}" class="d-block w-100" alt="{{$mostBuy->first()->title}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$mostBuy->first()->title}}</p>
                    @if($mostBuy->first()->discount <= 0)
                    <p class="font-weight-light">{{number_format($mostBuy->first()->price)}}đ</p>
                    @else
                    <p class="font-weight-light">{{number_format($mostBuy->first()->price * (1 - $mostBuy->first()->discount/100))}}đ 
                    <small class="font-weight-bold"><s>{{number_format($mostBuy->first()->price)}}đ</s></small>
                    </p>
                    @endif
                    <a class="btn btn-outline-info"
                        href="san-pham/{{$mostBuy->shift()->id}}/{{$mostBuy->shift()->_link}}">Mua Ngay</a>
                </div>
            </div>
            @foreach($mostBuy as $buy)
            <div class="carousel-item " data-interval="5000">
                <img src="{{$buy->thumbnail}}" class="d-block w-100" alt="{{$buy->thumbnail}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$buy->title}}</p>
                    @if($buy->discount <= 0)
                    <p class="font-weight-light">{{number_format($buy->price)}}đ</p>
                    @else
                    <p class="font-weight-light">{{number_format($buy->price * (1 - $buy->discount/100))}}đ
                    <small class="font-weight-bold"><s>{{number_format($buy->price)}}đ</s></small>
                    </p>
                    @endif
                    <a class="btn btn-outline-info" href="san-pham/{{$buy->id}}/{{$buy->_link}}">Mua Ngay</a>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselMostBuy" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselMostBuy" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endif

@if(count($sale) > 0)
<h2 class="display-4 mt-2" style="font-size:28px;">Đang giảm giá</h2>
<hr class="bg-dark mt-0" style="height:3px;" />
<div id="sale" class="col-12 p-0">
    <div id="carouselSale" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="{{$sale->first()->thumbnail}}" class="d-block w-100" alt="{{$sale->first()->title}}">
                <span class="display-4 position-absolute text-white"
                    style="top:0; right:0;">-{{$sale->first()->discount}}%</span>
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$sale->first()->title}}</p>
                    <p class="font-weight-light">{{number_format($sale->first()->price * (1 - $sale->first()->discount/100))}}đ
                    <small class="font-weight-bold"><s>{{number_format($sale->first()->price)}}đ</s></small>
                    </p>
                    <a class="btn btn-outline-info" href="san-pham/{{$sale->first()->id}}/{{$sale->shift()->_link}}">Mua
                        Ngay</a>
                </div>
            </div>
            @foreach($sale as $sale)
            <div class="carousel-item " data-interval="5000">
                <img src="{{$sale->thumbnail}}" class="d-block w-100" alt="{{$sale->title}}">
                <span class="display-4 position-absolute text-white"
                    style="top:0; right:0;">-{{$sale->discount}}%</span>
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$sale->title}}</p>
                    <p class="font-weight-light">{{number_format($sale->price * (1 - $sale->discount/100))}}
                    <small class="font-weight-bold"><s>{{number_format($sale->price)}}đ</s></small>
                    </p>
                    <a class="btn btn-outline-info" href="san-pham/{{$sale->id}}/{{$sale->_link}}">Mua Ngay</a>
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

@if(count($comment) > 0)
<h2 class="display-4 mt-2" style="font-size:28px;">Đánh giá khách hàng</h2>
<hr class="bg-dark mt-0" style="height:3px;" />
<div id="sale" class="col-12 p-0">
    <div id="carouselComment" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="{{$comment->first()->product->thumbnail}}" class="d-block w-100 _img-vote"
                    alt="{{$comment->first()->product->title}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$comment->first()->user->name}}</p>
                    <p>{{$comment->first()->content}}</p>
                    <p class="text-warning">
                        @for($i = 0; $i < $comment->first()->vote;$i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            @if($comment->first()->vote < 5) 
							@for($i=0;$i < 5 - $comment->first()->vote;$i++)
                                <i class="far fa-star"></i>
                                @endfor
                                @endif
								{{$comment->shift()->vote}}.0
                    </p>
                </div>
            </div>
            @foreach($comment as $comment)
            <div class="carousel-item " data-interval="5000">
			<img src="{{$comment->product->thumbnail}}" class="d-block w-100"
                    alt="{{$comment->product->title}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$comment->user->name}}</p>
                    <p>{{$comment->content}}</p>
                    <p class="text-warning">
                        @for($i = 0; $i < $comment->vote;$i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            @if($comment->vote < 5) 
							@for($i=0;$i < 5 - $comment->vote;$i++)
                                <i class="far fa-star"></i>
                                @endfor
                                @endif
								{{$comment->vote}}.0
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if(count($blog) > 0)
<h2 class="display-4 mt-2" style="font-size:28px;">Blog</h2>
<hr class="bg-dark mt-0" style="height:3px;" />
<div id="sale" class="col-12 p-0">
    <div id="carouselBlog" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="{{$blog->first()->image}}" class="d-block w-100" alt="{!!$blog->first()->content!!}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{!!$blog->first()->content!!}</p>
                    <p><i class="fas fa-heart text-danger"></i> {{count($blog->shift()->_like)}}</p>
                </div>
            </div>
         @foreach($blog as $blog)
		 <div class="carousel-item" data-interval="10000">
                <img src="{{$blog->image}}" class="d-block w-100" alt="{!!$blog->content!!}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{!!$blog->content!!}</p>
                    <p><i class="fas fa-heart text-danger"></i> {{count($blog->_like)}}</p>
                </div>
            </div>
		 @endforeach
        </div>
    </div>
</div>
@endif

<h2 class="display-4 mt-2" style="font-size:28px;">Lọc sản phẩm</h2>
<hr class="bg-dark mt-0" style="height:3px;" />
<div id="filters" role="form">
<form action="filter" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    @foreach($filters as $filter) 
    <details class="w-100 m-0 p-0" open="open">
    <summary class="w-100 p-2 m-0">{{$filter->category}} ({{count($filter->subcategory)}})</summary>
    @foreach($filter->subcategory as $f)
    <div class="form-group w-100 float-left m-0">
    <input class="form-control float-left check-filter" style="width:20px;" data-id="{{$f->id}}" name="filter-{{$f->id}}" type="checkbox" value="{{$f->sub_category}}"/>
    <label for="filter-{{$f->id}}" class="float-left mb-0 p-2" style="height:100%">{{$f->sub_category}}<label>
</div>
@endforeach
</details>
@endforeach
<button id="filter_btn" class="btn btn-outline-dark btn-md" type="button">Lọc sản phẩm <i class="bi bi-funnel"></i></button>
</form>
</div>