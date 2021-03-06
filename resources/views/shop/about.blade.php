@extends('layout.layout_master')
@section('content')

<h2 class="display-4 updated_banner text-center">Về chúng tôi</h2>
<hr/>

<div class="container-fluid padding p-4 thanks-notice">
	<blockquote class="col-lg-6 col-md-6 col-sm-12 text-white quotes float-left">
		     "TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi."
	</blockquote>
	<div class="col-lg-6 col-md-6 col-sm-12 float-left">
		<img class="col-12 mx-auto" src="image/logo1.png" height="300px" style="object-fit:contain;"/>
	</div>
</div>
<h2 class="display-4 updated_banner text-center mt-2">Thành viên</h2>
<hr/>
<div class = "container-fluid padding text-center p-2">
	<div class="profile col-lg-4 col-md-12 col-sm-12 my-2 float-left">
		<div class="background">
		<img class="img-mem" src="image/ceo.jpg" width="100px" height="100px" alt=""/>
		</div>
		<div class="col-12">
			<h2 class="card-title ml-4">Lê Quốc An</h2>
			<p class="card-text">CEO</p>
		</div>
	</div>
	<div class="profile col-lg-4 col-md-12 col-sm-12 my-2 float-left">
		<div class="background">
		<img class="img-mem" src="image/me.jpg" width="100px" height="100px" alt=""/>
		</div>
		<div class="col-12">
			<h2 class="card-title ml-4">Nguyễn Mạnh Tuấn</h2>
			<p class="card-text">Nhà phát triển - Developer for TAT</p>
		</div>
	</div>
	<div class="profile col-lg-4 col-md-12 col-sm-12 my-2 float-left">
		<div class="background">
		<img class="img-mem" src="image/marketing.jpg" width="100px" height="100px" alt=""/>
		</div>
		<div class="col-12">
			<h2 class="card-title ml-4">Nguyễn Trung Thật</h2>
			<p class="card-text">Marketing</p>
		</div>
	</div>
</div>
@endsection

@section('title')
Về Chúng Tôi
@endsection

@section('seo')
<meta property="og:url" content="{{asset('')}}ve-chung-toi">
<meta property="og:type" content="article">
<meta property="og:title" content="Về chúng tôi">
<meta property="og:description" content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi">
<meta property="og:image" content="https://scontent-hkt1-1.xx.fbcdn.net/v/t1.0-9/103400790_2653931128210070_7634271707750303358_o.jpg?_nc_cat=110&_nc_sid=8024bb&_nc_ohc=4ivJ6gkuQhMAX8egmH1&_nc_ht=scontent-hkt1-1.xx&oh=aeef07a1e47f93daeea4af34cacf94a8&oe=5F0CB60D">
@endsection