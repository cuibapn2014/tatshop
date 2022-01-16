<!--Navigation-->

<nav class="navbar navbar-expand-lg navbar-light navMenu">
    <a class="navbar-brand" href="/">
        <img src="image/_logo1.png" alt="logo-tat" height="50px" />
    </a>
    <button class="navbar-toggler border-light bg-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item font-weight-light active">
                <a class="nav-link" href="/">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item font-weight-light">
                <a class="nav-link" href="san-pham">SẢN PHẨM</a>
            </li>
            <li class="nav-item font-weight-light">
                <a class="nav-link" href="blog">BLOG</a>
            </li>
            <li class="nav-item font-weight-light">
                <a class="nav-link" href="ve-chung-toi">VỀ CHÚNG TÔI</a>
            </li>
        </ul>
    </div>
    <div class="float-right d-flex flex-row-reverse flex-nowrap align-items-center">
        <div class="nevigate">
            <button class="btn btn-white">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <div class="cart">
            <i class="bi bi-cart3" style="font-size:33px;"></i>
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
            <i class="bi bi-search"></i>
        </div>
    </div>
</nav>

<!--Carousel Slide-->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="w-100" src="https://images.unsplash.com/photo-1614990354198-b06764dcb13c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80" style="object-fit:cover;height:500px;" />
        </div>
    </div>

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
                @if(!Auth::check())
                <div>
                    <a href="/login"><button class="btn btn-outline-info">Đăng Nhập</button></a>
                </div>
                @else
                <div>
                    <a href="/login" class="bg-info" style="font-size:1rem;"><i class="bi bi-person"></i> {{Auth::user()->name}}</a>
                </div>
                @endif
            </ul>
        </div>
    </div>