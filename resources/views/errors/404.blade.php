@extends('layout.layout_master')
@section('content')
<style>
    .page_404{ 
        padding:40px 0; 
        background:#fff; 
        font-family: 'Arvo', serif;
        height: 550px;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 400px;
    background-position: center;
 }
 
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
       font-size:80px;
       }
       
       .link_404{      
  color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
  .contant_box_404{ margin-top:-50px;}
</style>
<section class="page_404">
            <div class="container">
              <div class="row"> 
              <div class="col-sm-12 ">
              <div class="col-sm-12 col-sm-offset-1 text-center">
              <div class="four_zero_four_bg">
                <h1 class="text-center ">404</h1>     
              </div>
              
              <div class="contant_box_404">
              <h3 class="h2">
              Look like you're lost
              </h3>
              
              <p>the page you are looking for not avaible!</p>
              
              <a href="https://tatshop.tech/" class="link_404">Go to Home</a>
            </div>
              </div>
              </div>
              </div>
            </div>
          </section>
@endsection

@section('title')
TAT SHOP - Cửa hàng quần áo trực tuyến tại Hồ Chí Minh
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}">
<meta property="og:type" content="article">
<meta property="og:title" content="Cửa hàng quần áo trực tuyến tại Hồ Chí Minh">
<meta property="og:keyword"
    content="tatshop, tat, cửa hàng quần áo, quần áo nam, quần áo nữ, tat shop ho chi minh, quan ao online, áo sweater nam nữ, quần jean nam, quần kaki nam, áo khoác nam nữ, áo thun nam cao cấp, tat shop" />
<meta property="og:description"
    content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi." />
<meta property="og:image"
    content="https://images.unsplash.com/photo-1614990354198-b06764dcb13c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80">
@endsection