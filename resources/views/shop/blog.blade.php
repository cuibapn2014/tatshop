@extends('layout.layout_master')
@section('content')
@if(session('notice'))
<div class="alert alert-success col-8 mx-auto">
   <span class="closebtn float-right" style="cursor:poiter;"
      onclick="this.parentElement.style.display='none';">&times;</span>
   {{session('notice')}}
</div>
@endif
<div class="container-fluid p-0 mt-4">
   <div class="col-lg-9 col-md-12 col-sm-12 float-left">
      <h2 class="display-4 pb-2 fs-4 mx-0 my-2">Nhật ký TAT SHOP</h2>
      <div class="col-12 m-0">
         @foreach($blog as $blog)
         <div class="mb-4 col-lg-7 col-md-12 col-sm-12 border p-0 mx-auto">
            <figure class="position-relative mb-0">
               <img class="_img-blog" src="{{$blog->image}}" width="100%" alt="{{$blog->content}}" />
               <div class="_interact col-12 d-inline position-absolute text-white" style="bottom: 0;left:0">
                  <p id="_like{{$blog->id}}" class="col-12 float-left pt-2 text-center _like"><i
                        id="_iconx{{$blog->id}}" class="_iconx"></i> {{$blog->_like()->count()}}</p>
               </div>
            </figure>
            <figcaption class="bg-light p-1">
               <p class="text p-0 mb-0"><small><i>Đăng bởi {{$blog->written}}</i></small></p>
               <p class="text">
                  <small><i>{{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}</i></small></p>
               <p class="text">{!!$blog->content!!}</p>
            </figcaption>
         </div>
         <script type="text/javascript">
            $(document).ready(function ($) {
               var like = $("#_like{{$blog->id}}");
               like.on('click', function () {
                  $.get('ajaxLike/' + {
                     {
                        $blog - > id
                     }
                  }, function (data) {
               $("#_like{{$blog->id}}").html(data);
            });
               });
            $.get('getAjaxLike/' + {
                  {
                  $blog - > id
                  }
               }, function (data) {
                  $("#_iconx{{$blog->id}}").attr('class', data);
               });
            });
         </script>
         @endforeach
      </div>
   </div>
   <div class="col-lg-3 col-md-12 col-sm-12 float-left">
      @include('layout.display')
   </div>
   @include('layout.dashboard')
</div>
@endsection
@section('title')
Blog - TAT SHOP
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}blog">
<meta property="og:type" content="article">
<meta property="og:title" content="Blog - TAT SHOP">
<meta property="og:keyword"
   content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp, tat shop" />
<meta property="og:description"
   content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi." />
<meta property="og:image"
   content="https://images.unsplash.com/photo-1614990354198-b06764dcb13c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80">
@endsection