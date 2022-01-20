<h2 class="display-4 fs-3 fst-normal mt-2">Danh mục</h2>
<div id="filters">
    @foreach($data_share['filters'] as $filter)
    <div class="w-100 p-2">
        <a class="text-dark fs-5" data-bs-toggle="collapse" href="#collapseCategory-{{$filter->id_category}}" role="button" aria-expanded="false" aria-controls="collapseCategory-{{$filter->id_category}}">
            {{$filter->category}}
            <i class="bi bi-chevron-down float-right"></i>
        </a>
        <div class="collapse" id="collapseCategory-{{$filter->id_category}}">
            @foreach($filter->subcategory as $f)
            <div class="w-100 border-top pl-2 p-2">
                <a class="text-dark fs-6" href="/filter/{{$f->id_subcategory}}">{{$f->sub_category}}</a>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
<div class="w-100 my-2">
    <img src="./image/ads/ads01.jpg" alt="QC-01" width="100%" />
</div>
@if(count($data_share['mostBuy']) > 0)
<h2 class="display-4 fs-3 mt-3 fst-normal">Mua nhiều nhất</h2>

<div id="most-buy" class="col-12 p-0">
    <div id="carouselMostBuy" class="carousel slide bg-dark" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{$data_share['mostBuy']->first()->thumbnail}}" class="d-block w-100" alt="{{$data_share['mostBuy']->first()->title}}">
                <div class="_detail p-2 w-100 text-white">
                    <p>{{$data_share['mostBuy']->first()->title}}</p>
                    @if($data_share['mostBuy']->first()->discount <= 0) <p class="font-weight-light">
                        {{number_format($data_share['mostBuy']->first()->price)}}đ</p>
                        @else
                        <p class="font-weight-light">
                            {{number_format($data_share['mostBuy']->first()->price * (1 - $data_share['mostBuy']->first()->discount/100))}}đ
                            <small class="font-weight-bold"><s>{{number_format($data_share['mostBuy']->first()->price)}}đ</s></small>
                        </p>
                        @endif
                        <a class="btn btn-outline-info" href="san-pham/{{$data_share['mostBuy']->shift()->id}}/{{$data_share['mostBuy']->shift()->str_slug}}">Mua
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
                        <a class="btn btn-outline-info" href="san-pham/{{$buy->id}}/{{$buy->str_slug}}">Mua Ngay</a>
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