@extends('layout.layout_master')
@section('content')
@if(session('notice'))
<div class="alert alert-success col-8 mx-auto">
   <span class="closebtn float-right" style="cursor:poiter;" onclick="this.parentElement.style.display='none';">&times;</span>
   {{session('notice')}}
</div>
@endif
<div class = "container-fluid padding mt-4">
   <div class="col-lg-9 col-md-12 col-sm-12 float-left">
      <h2 class="display-4 pb-2" style="font-size: 28px;border-bottom:4px solid #000;">Nhật ký TAT SHOP</h2>
      <div class="col-12">
         @foreach($blog as $blog)
         <div class="mt-4 col-lg-7 col-md-12 col-sm-12 border p-0 mx-auto mt-4">
            <figure class="position-relative mb-0">
               <img class="_img-blog" src="{{$blog->image}}" width="100%" alt="{{$blog->content}}"/>
               <div class="_interact col-12 d-inline position-absolute text-white" style="bottom: 0;left:0">
               <p id="_like" class="col-12 float-left pt-2 text-center"><i id="_iconx"></i> {{$blog->_like()->count()}}</p>
                </div>
            </figure>
            <figcaption class="bg-light p-1">
            <p class="text p-0 mb-0"><small><i>Đăng bởi {{$blog->written}}</i></small></p>
            <p class="text"><small><i>{{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}</i></small></p>
            <p class="text">{!!$blog->content!!}</p>  
         </figcaption>
         </div>
         <script type="text/javascript">
   $(document).ready(function($){
      var like = $("#_like");
      like.on('click',function(){
         $.get('ajaxLike/' + {{$blog->id}},function(data){   
           $("#_like").html(data);
         });
      });
      $.get('getAjaxLike/' + {{$blog->id}},function(data){
         $("#_iconx").attr('class',data);
      });
   });
</script>
         @endforeach
      </div>
   </div>
   <div class="col-lg-3 col-md-12 col-sm-12 float-left">
      <h2 class="display-4 text-left p-1" style="font-size: 28px;border-bottom:4px solid !important;">Tìm kiếm</h2>
      <div class="col-12 p-0 mb-2">
         <form action="search" method="post" class="form-inline my-2 my-lg-0 searchForm" role="search">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <label for="search" class="btn btn-info my-2 my-sm-0 search_btn"><i class="fas fa-search"></i></label>
            <input id="search" class="border p-2 w-100 search" type="search" name="search" placeholder="Quần áo, giày dép,...">
         </form>
      </div>
      <h2 class="display-4 text-left pb-1 mt-2" style="font-size: 28px;border-bottom:4px solid !important;">Sản phẩm</h2>
      <div id="category" class="category col-12 p-1 border position-relative">
         <a href="san-pham#_msh">
            <p class="text-dark mx-2 border-bottom">Áo nam<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <a href="san-pham#_wsh">
            <p class="text-dark mx-2 border-bottom">Áo nữ<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <a href="san-pham#_mtr">
            <p class="text-dark mx-2 border-bottom">Quần nam<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <a href="san-pham#_wtr">
            <p class="text-dark mx-2 border-bottom">Quần nữ<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <a href="san-pham#_dress">
            <p class="text-dark mx-2 border-bottom">Đầm<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <a href="san-pham#_mboot">
            <p class="text-dark mx-2 border-bottom">Giày nam<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <a href="san-pham#_wboot">
            <p class="text-dark mx-2 border-bottom">Giày nữ<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <a href="san-pham#_balo">
            <p class="text-dark mx-2 border-bottom" style="margin-bottom: 40px;">Balo<i class="fas fa-chevron-right float-right pt-1"></i></p>
         </a>
         <button id="more" onClick="more()" class="btn btn-dark text-center col-12 position-absolute" style="bottom:0;left: 0;">Xem thêm <i class="fas fa-chevron-down pt-1"></i></button>
      </div>
      @if($mostview->count() > 0)
      <h2 class="display-4 mt-2 pb-2" style="font-size:28px; border-bottom: 4px solid #000;">Mua nhiều nhất</h2>
      <div class="col-12 p-0">
         <div id="carouselControls" class="carousel slide most-view" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                  <?php
                     $first = $mostview->shift();
                     ?>
                  <img src="{{$first->thumbnail}}" class="d-block w-100" alt="Áo thun" loading="lazyload">
                  <div class="col-12 position-absolute p-2 text-white _detail" style="bottom: 0;">
                     <p class="card-title" style="font-size: 18px;">{{$first->title}}</p>
                     <p class="card-text font-weight-light">{{number_format($first->price * (1 - $first->discount/100))}}đ
                        @if($first->discount > 0)
                        <small class="font-weight-bold" style="text-decoration:line-through;">{{number_format($first->price)}}đ</small>
                        @endif
                     </p>
                     <a href="san-pham/{{$first->id}}/{{$first->_link}}" class="btn btn-outline-info">Mua ngay</a>
                  </div>
               </div>
               @foreach($mostview as $most)
               <div class="carousel-item" data-interval="3000">
                  <img src="{{$most->thumbnail}}" class="d-block w-100" alt="Áo thun" loading="lazyload">
                  <div class="col-12 position-absolute p-2 text-white _detail" style="bottom: 0;">
                     <p class="card-title" style="font-size: 18px;">{{$most->title}}</p>
                     <p class="card-text font-weight-light">{{number_format($most->price)}}đ</p>
                      @if($most->discount > 0)
                        <small class="font-weight-bold" style="text-decoration:line-through;">{{number_format($most->price)}}đ</small>
                        @endif
                     <a href="san-pham/{{$most->id}}/{{$most->_link}}" class="btn btn-outline-info">Mua ngay</a>
                  </div>
               </div>
               @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
      @endif
       @if($vote->count() > 0)
      <h2 class="display-4 mt-2 pb-2" style="font-size:28px; border-bottom: 4px solid #000;">Đánh giá khách hàng</h2>
      <div class="col-12 p-0">
         <div id="carouselCommentsControls" class="carousel slide most-view" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active" data-interval="5000">
                  <?php            
                     $first = $vote->first();
                     ?>
                  <img class="_img-vote" src="{{$first->product->thumbnail}}">
                  <div class="col-12 position-absolute p-2 text-white _detail" style="bottom: 0;">
                     <p class="card-title" style="font-size: 24px;">{{$first->user->name}}</p>
                     <p class="card-text">"{{$first->content}}"</p>
                     <p class="card-text text-warning">
                        @for($i=0; $i <= ($first->vote-1);$i++)
                        <i class="fas fa-star"></i>
                        @endfor
                        @for($i=0; $i <= (4-$first->vote);$i++)
                        <i class="far fa-star"></i>
                        @endfor
                        {{$first->vote}}.0
                     </p>
                  </div>
               </div>
               @if($vote->count() > 1)
               @foreach($vote as $vote)
               <div class="carousel-item" data-interval="3000">
                  <img class="_img-vote" src="{{$vote->product->thumbnail}}" class="d-block w-100" alt="Customer">
                  <div class="col-12 position-absolute p-2 text-white _detail" style="bottom: 0;">
                     <p class="card-title" style="font-size: 24px;">{{$vote->user->name}}</p>
                     <p class="card-text">"{{$vote->content}}"</p>
                     <p class="card-text text-warning">
                        @for($i=0; $i<= ($vote->vote-1);$i++)
                        <i class="fas fa-star"></i>
                        @endfor
                         @for($i=0; $i <= (4-$vote->vote);$i++)
                        <i class="far fa-star"></i>
                        @endfor
                        {{$first->vote}}.0
                     </p>
                  </div>
               </div>
               @endforeach
               @endif
            </div>
         </div>
      </div>
      @endif
      @if($sale->count() > 0)
      <h2 class="display-4 mt-2 pb-2" style="font-size:28px; border-bottom: 4px solid #000;">Đang giảm giá</h2>
      <div class="col-12 p-0">
         <div id="carouselCommentsControls" class="carousel slide most-view" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active" data-interval="10000">
                  <?php
                     $first = $sale->shift();
                     ?>
                  <img src="{{$first->thumbnail}}" class="d-block w-100" alt="{{$first->title}}" loading="lazyload">
                  <p class="display-4 position-absolute text-white" style="top:5px; right: 5px;"><i>-{{$first->discount}}%</i></p>
                  <div class="col-12 position-absolute p-2 text-white _detail" style="bottom: 0;">
                     <p class="card-title" style="font-size: 24px;">{{$first->title}}</p>
                     <p class="card-text font-weight-light">{{number_format($first->price * (1 - $first->discount / 100))}}đ <small class="font-weight-bold" style="text-decoration:line-through;">{{number_format($first->price)}}đ</small></p>
                     <a href="san-pham/{{$first->id}}/{{$first->_link}}" class="btn btn-outline-info">Mua ngay</a>
                  </div>
               </div>
               @foreach($sale as $sale)
               <div class="carousel-item" data-interval="5000">
                  <img src="{{$sale->thumbnail}}" class="d-block w-100" alt="{{$sale->title}}" loading="lazyload">
                  <p class="display-4 position-absolute text-white" style="top:0; right: 5px;"><i>-{{$sale->discount}}%</i></p>
                  <div class="col-12 position-absolute p-2 text-white _detail" style="bottom: 0;">
                     <p class="card-title" style="font-size: 24px;">{{$sale->title}}</p>
                      <p class="card-text font-weight-light">{{number_format($sale->price * (1 - $sale->discount / 100))}}đ <small class="font-weight-bold" style="text-decoration:line-through;">{{number_format($sale->price)}}đ</small></p>
                     <a href="san-pham/{{$sale->id}}/{{$sale->_link}}" class="btn btn-outline-info">Mua ngay</a>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      @endif
   </div>
</div>
@endsection
@section('title')
Blog - TAT SHOP
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}blog">
<meta property="og:type" content="article">
<meta property="og:title" content="Blog - Cửa hàng quần áo trực tuyến tại Hồ Chí Minh">
<meta property="og:keyword" content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp, tat shop"/>
<meta property="og:description" content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi."/>
<meta property="og:image" content="https://images.unsplash.com/photo-1614990354198-b06764dcb13c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80">
@endsection
