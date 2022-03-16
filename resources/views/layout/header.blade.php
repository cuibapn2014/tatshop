<!--Navigation-->

<nav class="navbar navbar-expand-lg navbar-light navMenu py-0 fade-In">
    <a class="navbar-brand black-mode" href="/">
        <img src="image/_logo1.png" alt="logo-tat" height="50px" />
    </a>
    <button class="navbar-toggler border-light bg-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item font-weight-normal active">
                <a class="nav-link fs-6 black-mode" href="/">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item font-weight-normal">
                <a class="nav-link fs-6 black-mode" href="san-pham">SẢN PHẨM</a>
            </li>
            <li class="nav-item font-weight-normal">
                <a class="nav-link fs-6 black-mode" href="blog">BLOG</a>
            </li>
            <li class="nav-item font-weight-normal">
                <a class="nav-link fs-6 black-mode" href="ve-chung-toi">VỀ CHÚNG TÔI</a>
            </li>
            <li class="nav-item font-weight-normal">
                <a class="nav-link fs-6 black-mode search-invoice" href="#">TRA CỨU HÓA ĐƠN</a>
            </li>
        </ul>
    </div>
    <div class="float-right d-flex flex-row-reverse flex-nowrap align-items-center">
        <div class="nevigate">
            <button class="btn btn-white">
                <i class="bi bi-list black-mode"></i>
            </button>
        </div>
        <div class="btn-login">
            @if(!Auth::check())
            <button class="btn btn-info ml-3 rounded" onclick="location.href='/login'">Đăng nhập</button>
            @else
            <button class="btn btn-info ml-3 rounded" onclick="location.href='/login'">{{Auth::user()->name}}</button>
            @endif
        </div>
        <div class="cart">
            <i class="bi bi-bag-fill fs-4 black-mode"></i>
            <sup class="sup_cart bg-info" id="sup_cart">{{Cart::getTotalQuantity()}}</sup>
        </div>
        <div class="cart-detail p-1 hide">
            <h2 class="w-100 border-bottom font-weight-light p-1">Giỏ hàng <i class="bi bi-bag"></i></h2>
            <button class="close close-cart-detail text-dark">
                <i class="bi bi-x"></i>
            </button>
            @if(count(Cart::getContent()) > 0)
            <div class="frame-cart">
                @foreach(Cart::getContent() as $item)
                <div class="item-cart w-100 text-right mb-2 float-left border-bottom pb-1">
                    <img class="col-4 float-left" src="{{$item->attributes->img}}" style="object-fit:cover" alt="{{$item->name}}" width="100px" height="120px" />
                    <div class="col-8 float-left pl-0" style="font-size:1rem;">
                        <p>{{$item->name}}</p>
                        <p>{{$item->attributes->size}} - {{$item->attributes->color}}</p>
                        <p>{{$item->quantity}} x {{number_format($item->price)}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center w-100 p-1" style="font-size:16px;">Không có sản phẩm nào trong giỏ</p>
            @endif
            <button class="btn btn-dark w-100 btn-payCart" onclick="location.href='cart'">Thanh toán -
                {{number_format(Cart::getTotal())}}<sup>đ</sup></button>
        </div>
        <div id="search">
            <i class="bi bi-search fs-5 black-mode"></i>
        </div>

    </div>
</nav>

<!--Carousel Slide-->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div id="search-form">
        <button type="button" class="btn-close btn-close-white close-search" aria-label="Close"></button>
        <form action="search" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="w-100">
                <label for="" class="float-left w-100 text-white text-left font-weight-light" style="font-size:36px;">Tìm kiếm</label>
                <input type="text" class="search-input w-100" name="search" value="" placeholder="Quần jean, áo thun,..." />
                <button class="btn btn-info float-left mt-1"><i class="bi bi-search"></i> Tìm kiếm</button>
            </div>
        </form>
    </div>
    <div id="nevigation">
        <button type="button" class="btn-close btn-close-white close-nav" aria-label="Close"></button>
        <div class="navbar-link">
            <ul>
                <li class="font-weight-light p-2">
                    <a class="item-nav" href="/">HOME</a>
                </li>
                <li class="font-weight-light p-2">
                    <a class="item-nav" href="san-pham">SẢN PHẨM</a>
                </li>
                <li class="font-weight-light p-2">
                    <a class="item-nav" href="blog">BLOG</a>
                </li>
                <li class="font-weight-light p-2">
                    <a class="item-nav" href="ve-chung-toi">VỀ CHÚNG TÔI</a>
                </li>
                <li class="font-weight-light p-2">
                    <a class="item-nav search-invoice" href="#">TRA CỨU HÓA ĐƠN</a>
                </li>
                @if(!Auth::check())
                <div>
                    <a href="/login"><button class="btn btn-outline-info p-2 text-center">Đăng Nhập</button></a>
                </div>
                @else
                <div>
                    <a href="/login" class="btn btn-info p-2" style="font-size:1rem;"><i class="bi bi-person"></i> {{Auth::user()->name}}</a>
                </div>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="field-invoice position-fixed w-100 bg-info py-3 d-flex flex-row flex-nowrap d-none" style="top:0; left:0;height: 75px; z-index: 100;">
<input class="mx-2 form-control col-7 enter-invoice" type="text" name="invoice-customer" placeholder="Mã hóa đơn">
<button class="btn btn-light rounded text-center align-items-center btn-search-invoice">Tìm kiếm</button>
<span class="close-search-invoice text-white position-absolute fs-3" style="top:10px; right:10px;cursor:pointer;"><i class="bi bi-x-circle-fill"></i></span>
</div>