<!--Navigation-->

<nav class="navbar navbar-expand-lg navbar-light navMenu">
  <a class="navbar-brand" href="cart">
  <i class="bi bi-cart3" style="font-size:33px;"></i>
</svg>
  <sup class="sup_cart" id="sup_cart">{{Cart::getTotalQuantity()}}</sup> </a>
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
	<p class="my-2">
	@if(!Auth::check())
	<a href="login" class="btn btn-info btn-sm text-dark p-0 text-center font-weight-light">Đăng nhập</a>
	@else
		<a href="login" class="font-weight-light"><i class="bi bi-person-fill"></i> {{Auth::user()->name}}</a>
		<a href="logout" class="btn btn-info btn-sm text-dark text-center p-1 font-weight-light">Đăng xuất</a>
		@endif
	</p>
  </div>
</nav>
	
	<!--Carousel Slide-->
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="w-100" src="https://images.unsplash.com/photo-1614990354198-b06764dcb13c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80" height="650px" style="object-fit:cover;">
      <div class="carousel-caption d-none d-md-block">
		<img class="brand" src="image/logo1.png" width="300px"/>
        <h2 class="display-4">Cửa hàng quần áo trực tuyến</h2>
		<a href="ve-chung-toi"><button class="btn btn-outline-light btn-lg">Về chúng tôi</button></a>
		<a href="sign-up"><button class="btn btn-info btn-lg">Đăng ký</button></a>
        <p>Tin tưởng an toàn tận tâm</p>
      </div>
    </div>
  </div>
