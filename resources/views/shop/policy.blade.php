@extends('layout.layout_master')
@section('content')

<h2 class="display-4 updated_banner text-center">Chính Sách</h2>
<hr/>
<div class = "container-fluid padding text-center p-2">
<div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
	<p class="text-left">1.Được tư vấn trực tuyến thông qua các thành viên của shop.</p>
	<p class="text-left">2.Được yêu cầu các thêm  các thông tin như màu sắc, kích cỡ, size tùy thuộc vào loại sản phẩm mà khách hàng có nhu cầu.</p>
	<p class="text-left">3.Được quyền khiến nại và báo cáo với shop về chất lượng sản phẩm.</p>
	<p class="text-left">4.Đựơc khuyến mãi theo đơn giá mua, cụ thể:</p>
         + giảm 5% đối với các đơn hàng từ 200k-500k.</p>
         + giảm 10% đối với các đơn hàng từ 500k trở lên.</p>
	<p class="text-left">5.Các chương trình khuyến mãi kèm theo của shop được áp dụng đối với tất cả khách hàng và luôn được đảm bảo thực hiện.</p>
</div>
</div>
@endsection

@section('title')
Chính Sách
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}">
<meta property="og:type" content="article">
<meta property="og:title" content="Về chúng tôi">
<meta property="og:image" content="https://images.unsplash.com/photo-1555529771-7888783a18d3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1942&q=80">
@endsection