@extends('layout.layout_master')
@section('content')

<h2 class="display-4 updated_banner text-center">Chính Sách</h2>
<hr />
<div class="container-fluid padding text-center p-2">
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
        <h2 class="text-left">Chính sách bán hàng</h2>
        <p class="text-justify">1. Được tư vấn trực tuyến thông qua các thành viên của shop.</p>
        <p class="text-justify">2. Được yêu cầu các thêm các thông tin như màu sắc, kích cỡ, size tùy thuộc vào loại sản
            phẩm mà khách hàng có nhu cầu.</p>
        <p class="text-justify">3. Được quyền khiến nại và báo cáo với shop về chất lượng sản phẩm.</p>
        <h2 class="text-left">Chính sách khuyến mãi</h2>
        <p class="text-justify">4. Được khuyến mãi theo đơn giá mua, cụ thể:</p>
        <p class="text-justify">
            + giảm 5% đối với các đơn hàng tối thiểu từ 300k.<br />
            + giảm 10% đối với các đơn hàng tối thiểu từ 1000k trở lên.
            </pre>
        <p class="text-justify">5. Các chương trình khuyến mãi kèm theo của shop được áp dụng đối với tất cả khách hàng
            và
            luôn được đảm bảo thực hiện.</p>
        <h2 class="text-left">Chính sách giao hàng và đổi trả hàng</h2>
        <p class="text-justify">6. Khi nhận hàng từ 1 đến 3 ngày, quý khách phát hiện sản phẩm không đúng mong muốn hoặc
            sản phẩm bị lỗi, quý khách có thể liên hệ với chúng tôi qua sđt, email hoặc fanpage của TAT SHOP để chúng
            tôi tiến hàng hướng dẫn quý khách các bước đổi trả hàng. Quá 3 ngày chúng tôi sẽ không chấp nhận bất kỳ yêu
            cầu đổi trả nào khác. Mong quý khách thông cảm.</p>
        <p class="text-justify">7. Thời gian nhận hàng sau khi quý khách đặt hàng:</p>
        <p class="text-justify">
            + Với đơn hàng thuộc nội thành TP Hồ Chí Minh cụ thể (Q1, 2, 3, 5, 6, 10, 11, 12, Tân Bình, Tân Phú, Phú
            Nhuận, Bình Thạnh, Bình Tân, Gò Vấp) thời gian giao hàng sẽ từ 3 ngày đến 4 ngày.<br/>
            + Với các đơn hàng ngoại thành TP Hồ Chí Minh, thời gian giao hàng sẽ lâu hơn từ 5 ngày đến 6 ngày tùy khu
            vực
        </p>
    </div>
</div>
@endsection

@section('title')
Chính Sách - TAT SHOP
@endsection
@section('seo')
<meta property="og:url" content="{{asset('')}}chinh-sach">
<meta property="og:type" content="article">
<meta property="og:title" content="Chính sách - TAT SHOP">
<meta property="og:description"
    content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi">
<meta property="og:image"
    content="https://images.unsplash.com/photo-1614990354198-b06764dcb13c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80">
@endsection