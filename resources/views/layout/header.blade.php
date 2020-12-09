<!--Navigation-->

<nav class="navbar navbar-expand-lg navbar-light navMenu">
  <a class="navbar-brand" href="cart"><i class="fas fa-shopping-bag"></i><sup class="sup_cart">{{Cart::getTotalQuantity()}}</sup> </a>
  <button class="navbar-toggler border-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="san-pham">SẢN PHẨM</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="ve-chung-toi">VỀ CHÚNG TÔI</a>
      </li>
    </ul>
	<p class="my-2">
	@if(!Auth::check())
	<a href="login">ĐĂNG NHẬP |</a>
	@else
		<a href="login"><i class="fas fa-user"></i> {{Auth::user()->name}}|</a>
		<a href="logout">ĐĂNG XUẤT <i class="fas fa-sign-out-alt"></i></a>
		@endif
	</p>
    <form action="search" method="post" class="form-inline my-2 my-lg-0" role="search">
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <input class="form-control mr-sm-2 search" type="search" name="search" placeholder="Quần áo, giày dép,...">
      <button class="btn btn-warning text-light my-2 my-sm-0 search_btn" type="submit">Tìm kiếm <i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>
	
	<!--Carousel Slide-->
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1868&q=80" class="d-block w-100 theme" alt="Shop-Carousel">
      <div class="carousel-caption d-none d-md-block">
		<img class="brand" src="image/logo1.png" width="300px"/>
        <h2 class="display-4">Cửa hàng quần áo trực tuyến</h2>
		<a href="ve-chung-toi"><button class="btn btn-outline-light btn-lg">Về chúng tôi</button></a>
		<a href="sign-up"><button class="btn btn-info btn-lg">Đăng ký</button></a>
        <p>Tin tưởng an toàn tận tâm</p>
      </div>
    </div>
  </div>
