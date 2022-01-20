@extends('layout.layout_master')
@section('content')
<div class="container-fluid padding text-center p-2">
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto text-justify" style="min-height:350px;">
        <p><span style="font-size:20px"><strong>A. Thu thập th&ocirc;ng tin c&aacute; nh&acirc;n</strong></span></p>

        <p>C&aacute;c loại th&ocirc;ng tin c&aacute; nh&acirc;n sau đ&acirc;y c&oacute; thể được thu thập, lưu trữ v&agrave; sử dụng:</p>

        <ol>
            <li>th&ocirc;ng tin về m&aacute;y t&iacute;nh của bạn bao gồm địa chỉ IP, vị tr&iacute; địa l&yacute;, loại v&agrave; phi&ecirc;n bản tr&igrave;nh duyệt, hệ điều h&agrave;nh;</li>
            <li>th&ocirc;ng tin về c&aacute;c lượt truy cập v&agrave; sử dụng website n&agrave;y của bạn bao gồm nguồn giới thiệu, thời lượng truy cập, lượt xem trang v&agrave; đường dẫn điều hướng website;</li>
            <li>th&ocirc;ng tin chẳng hạn như địa chỉ email m&agrave; bạn nhập khi đăng k&yacute; với website của ch&uacute;ng t&ocirc;i;</li>
            <li>th&ocirc;ng tin bạn nhập khi tạo một hồ sơ tr&ecirc;n website của ch&uacute;ng t&ocirc;i&mdash;v&iacute; dụ như t&ecirc;n, h&igrave;nh ảnh hồ sơ, giới t&iacute;nh, ng&agrave;y sinh, t&igrave;nh trạng mối quan hệ, sở th&iacute;ch v&agrave; th&uacute; vui, th&ocirc;ng tin học vấn v&agrave; th&ocirc;ng tin c&ocirc;ng việc;</li>
            <li>th&ocirc;ng tin chẳng hạn như t&ecirc;n v&agrave; địa chỉ email m&agrave; bạn nhập để thiết lập đăng k&yacute; nhận email v&agrave;/hoặc bản tin của ch&uacute;ng t&ocirc;i;</li>
            <li>th&ocirc;ng tin m&agrave; bạn nhập trong khi sử dụng c&aacute;c dịch vụ tr&ecirc;n website của ch&uacute;ng t&ocirc;i;</li>
            <li>th&ocirc;ng tin được tạo trong khi sử dụng website của ch&uacute;ng t&ocirc;i, bao gồm thời gian, tần suất v&agrave; những trường hợp bạn sử dụng n&oacute;;</li>
            <li>th&ocirc;ng tin li&ecirc;n quan đến bất cứ thứ g&igrave; bạn mua, c&aacute;c dịch vụ bạn sử dụng hoặc c&aacute;c giao dịch bạn thực hiện th&ocirc;ng qua website của ch&uacute;ng t&ocirc;i, bao gồm t&ecirc;n, địa chỉ, số điện thoại, địa chỉ email v&agrave; th&ocirc;ng tin thẻ t&iacute;n dụng của bạn;</li>
            <li>th&ocirc;ng tin m&agrave; bạn đăng l&ecirc;n website của ch&uacute;ng t&ocirc;i với mục đ&iacute;ch c&ocirc;ng khai n&oacute; tr&ecirc;n internet, bao gồm t&ecirc;n người d&ugrave;ng, h&igrave;nh ảnh hồ sơ v&agrave; nội dung những b&agrave;i đăng của bạn;</li>
            <li>th&ocirc;ng tin c&oacute; trong bất kỳ li&ecirc;n lạc n&agrave;o m&agrave; bạn gửi cho ch&uacute;ng t&ocirc;i bằng email hoặc th&ocirc;ng qua website của ch&uacute;ng t&ocirc;i, bao gồm nội dung li&ecirc;n lạc v&agrave; si&ecirc;u dữ liệu của n&oacute;;</li>
            <li>bất kỳ th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o kh&aacute;c m&agrave; bạn gửi cho ch&uacute;ng t&ocirc;i.</li>
        </ol>

        <p>Trước khi bạn tiết lộ cho ch&uacute;ng t&ocirc;i th&ocirc;ng tin c&aacute; nh&acirc;n của người kh&aacute;c, bạn phải c&oacute; được sự đồng &yacute; của người đ&oacute; đối với cả việc tiết lộ lẫn xử l&yacute; th&ocirc;ng tin c&aacute; nh&acirc;n đ&oacute; theo ch&iacute;nh s&aacute;ch n&agrave;y.</p>

        <p><span style="font-size:20px"><strong>B. Sử dụng th&ocirc;ng tin c&aacute; nh&acirc;n của bạn</strong></span></p>

        <p>Th&ocirc;ng tin c&aacute; nh&acirc;n được gửi cho ch&uacute;ng t&ocirc;i th&ocirc;ng qua website của ch&uacute;ng t&ocirc;i sẽ được sử dụng cho c&aacute;c mục đ&iacute;ch được x&aacute;c định trong ch&iacute;nh s&aacute;ch n&agrave;y hoặc tr&ecirc;n c&aacute;c trang c&oacute; li&ecirc;n quan của website. Ch&uacute;ng t&ocirc;i c&oacute; thể sử dụng th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho những việc sau đ&acirc;y:</p>

        <ol>
            <li>Quản trị website v&agrave; c&ocirc;ng việc của ch&uacute;ng t&ocirc;i;</li>
            <li>C&aacute; nh&acirc;n h&oacute;a website của ch&uacute;ng t&ocirc;i cho bạn;</li>
            <li>Cho ph&eacute;p bạn sử dụng c&aacute;c dịch vụ c&oacute; sẵn tr&ecirc;n website của ch&uacute;ng t&ocirc;i;</li>
            <li>Gửi cho bạn sản phẩm được mua th&ocirc;ng qua website của ch&uacute;ng t&ocirc;i;</li>
            <li>Cung cấp c&aacute;c dịch vụ được mua th&ocirc;ng qua website của ch&uacute;ng t&ocirc;i;</li>
            <li>Gửi c&aacute;c b&aacute;o c&aacute;o, h&oacute;a đơn, nhắc nhở thanh to&aacute;n cho bạn v&agrave; thu c&aacute;c khoản thanh to&aacute;n từ bạn;</li>
            <li>Gửi cho bạn c&aacute;c th&ocirc;ng tin thương mại kh&ocirc;ng phải tiếp thị;</li>
            <li>Gửi cho bạn c&aacute;c th&ocirc;ng b&aacute;o qua email m&agrave; bạn đ&atilde; y&ecirc;u cầu cụ thể;</li>
            <li>Gửi cho bạn bản tin của ch&uacute;ng t&ocirc;i qua email, nếu bạn đ&atilde; y&ecirc;u cầu n&oacute; (bạn c&oacute; thể th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i bất cứ l&uacute;c n&agrave;o nếu bạn kh&ocirc;ng c&oacute; nhu cầu nhận bản tin nữa);</li>
            <li>Gửi cho bạn c&aacute;c th&ocirc;ng tin tiếp thị li&ecirc;n quan đến doanh nghiệp của ch&uacute;ng t&ocirc;i hoặc doanh nghiệp của c&aacute;c b&ecirc;n thứ ba được lựa chọn cẩn thận m&agrave; ch&uacute;ng t&ocirc;i nghĩ rằng c&oacute; thể bạn quan t&acirc;m qua đường bưu điện, nơi bạn đ&atilde; đồng &yacute; cụ thể về điều n&agrave;y, hoặc bằng email hay c&ocirc;ng nghệ tương tự (bạn c&oacute; thể th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i bất cứ l&uacute;c n&agrave;o nếu bạn kh&ocirc;ng c&oacute; nhu cầu nhận c&aacute;c th&ocirc;ng tin tiếp thị nữa);</li>
            <li>Cung cấp cho c&aacute;c b&ecirc;n thứ ba th&ocirc;ng tin thống k&ecirc; về người d&ugrave;ng của ch&uacute;ng t&ocirc;i (nhưng c&aacute;c b&ecirc;n thứ ba đ&oacute; sẽ kh&ocirc;ng thể nhận dạng bất kỳ người d&ugrave;ng c&aacute; nh&acirc;n n&agrave;o từ th&ocirc;ng tin đ&oacute;);</li>
            <li>Xử l&yacute; c&aacute;c y&ecirc;u cầu v&agrave; khiếu nại được thực hiện bởi hoặc về bạn li&ecirc;n quan đến website của ch&uacute;ng t&ocirc;i;</li>
            <li>Giữ cho website của ch&uacute;ng t&ocirc;i bảo mật v&agrave; ngăn chặn gian lận;</li>
            <li>X&aacute;c minh việc tu&acirc;n thủ c&aacute;c điều khoản v&agrave; điều kiện quản l&yacute; việc sử dụng website của ch&uacute;ng t&ocirc;i (bao gồm gi&aacute;m s&aacute;t c&aacute;c tin nhắn ri&ecirc;ng tư được gửi qua dịch vụ nhắn tin ri&ecirc;ng tư tr&ecirc;n website của ch&uacute;ng t&ocirc;i); v&agrave;</li>
            <li>C&aacute;c việc sử dụng kh&aacute;c.</li>
        </ol>

        <p>Nếu bạn gửi th&ocirc;ng tin c&aacute; nh&acirc;n để đăng l&ecirc;n website của ch&uacute;ng t&ocirc;i, ch&uacute;ng t&ocirc;i sẽ c&ocirc;ng khai hoặc sử dụng th&ocirc;ng tin đ&oacute; theo sự cho ph&eacute;p m&agrave; bạn cấp cho ch&uacute;ng t&ocirc;i.</p>

        <p>C&aacute;c c&agrave;i đặt ri&ecirc;ng tư của bạn c&oacute; thể được sử dụng để giới hạn việc c&ocirc;ng khai th&ocirc;ng tin của bạn tr&ecirc;n website của ch&uacute;ng t&ocirc;i v&agrave; c&oacute; thể được điều chỉnh bằng c&aacute;c kiểm so&aacute;t quyền ri&ecirc;ng tư tr&ecirc;n website.</p>

        <p>Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng cung cấp th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho bất kỳ b&ecirc;n thứ ba n&agrave;o để họ hoặc bất kỳ b&ecirc;n thứ ba n&agrave;o kh&aacute;c tiếp thị trực tiếp nếu kh&ocirc;ng c&oacute; sự đồng &yacute; r&otilde; r&agrave;ng của bạn.</p>

        <p><span style="font-size:20px"><strong>C. Tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n</strong></span></p>

        <p>Ch&uacute;ng t&ocirc;i c&oacute; thể tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho bất kỳ nh&acirc;n vi&ecirc;n, c&aacute;n bộ, nh&agrave; bảo hiểm, cố vấn chuy&ecirc;n nghiệp, đại l&yacute;, nh&agrave; cung cấp hoặc nh&agrave; thầu phụ n&agrave;o khi thấy cần thiết hợp l&yacute; cho c&aacute;c mục đ&iacute;ch được n&ecirc;u trong ch&iacute;nh s&aacute;ch n&agrave;y.</p>

        <p>Ch&uacute;ng t&ocirc;i c&oacute; thể tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho bất kỳ th&agrave;nh vi&ecirc;n n&agrave;o trong nh&oacute;m c&aacute;c c&ocirc;ng ty của ch&uacute;ng t&ocirc;i (nghĩa l&agrave; c&aacute;c c&ocirc;ng ty con của ch&uacute;ng t&ocirc;i, c&ocirc;ng ty mẹ của ch&uacute;ng t&ocirc;i v&agrave; tất cả c&aacute;c c&ocirc;ng ty con của n&oacute;) khi thấy cần thiết hợp l&yacute; cho c&aacute;c mục đ&iacute;ch được n&ecirc;u trong ch&iacute;nh s&aacute;ch n&agrave;y.</p>

        <p>Ch&uacute;ng t&ocirc;i c&oacute; thể tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn:</p>

        <ol>
            <li>Đến mức độ m&agrave; ch&uacute;ng t&ocirc;i được y&ecirc;u cầu phải l&agrave;m như vậy theo ph&aacute;p luật;</li>
            <li>Li&ecirc;n quan đến bất kỳ thủ tục ph&aacute;p l&yacute; n&agrave;o đang hoặc c&oacute; thể diễn ra trong tương lai;</li>
            <li>để thiết lập, thực hiện hoặc bảo vệ c&aacute;c quyền hợp ph&aacute;p của ch&uacute;ng t&ocirc;i (bao gồm việc cung cấp th&ocirc;ng tin cho người kh&aacute;c với mục đ&iacute;ch ph&ograve;ng chống gian lận v&agrave; giảm rủi ro t&iacute;n dụng);</li>
            <li>Cho người mua (hoặc người mua tiềm năng) của bất kỳ doanh nghiệp hoặc t&agrave;i sản n&agrave;o m&agrave; ch&uacute;ng t&ocirc;i đang (hoặc dự t&iacute;nh) b&aacute;n; v&agrave;</li>
            <li>Cho bất kỳ ai m&agrave; ch&uacute;ng t&ocirc;i kh&aacute; tin tưởng c&oacute; thể nộp đơn l&ecirc;n một t&ograve;a &aacute;n hoặc cơ quan c&oacute; thẩm quyền kh&aacute;c để y&ecirc;u cầu tiết lộ về th&ocirc;ng tin c&aacute; nh&acirc;n đ&oacute; theo quan điểm hợp l&yacute; của ch&uacute;ng t&ocirc;i, nơi t&ograve;a &aacute;n hoặc cơ quan n&agrave;y hầu như sẽ c&oacute; khả năng ra lệnh tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n đ&oacute;.</li>
        </ol>

        <p>Trừ khi được quy định trong ch&iacute;nh s&aacute;ch n&agrave;y, nếu kh&ocirc;ng ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng cung cấp th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho c&aacute;c b&ecirc;n thứ ba.</p>

        <p><span style="font-size:20px"><strong>E. Lưu giữ th&ocirc;ng tin c&aacute; nh&acirc;n</strong></span></p>

        <ol>
            <li>Mục G n&agrave;y đặt ra c&aacute;c ch&iacute;nh s&aacute;ch v&agrave; thủ tục lưu giữ dữ liệu của ch&uacute;ng t&ocirc;i, ch&uacute;ng được thiết kế nhằm gi&uacute;p đảm bảo rằng ch&uacute;ng t&ocirc;i tu&acirc;n thủ c&aacute;c nghĩa vụ ph&aacute;p l&yacute; của m&igrave;nh về việc lưu giữ v&agrave; x&oacute;a bỏ th&ocirc;ng tin c&aacute; nh&acirc;n.</li>
            <li>Th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; ch&uacute;ng t&ocirc;i xử l&yacute; cho bất kỳ mục đ&iacute;ch hoặc c&aacute;c mục đ&iacute;ch n&agrave;o đều sẽ kh&ocirc;ng được giữ lại l&acirc;u hơn cần thiết cho mục đ&iacute;ch đ&oacute; hoặc c&aacute;c mục đ&iacute;ch đ&oacute;.</li>
            <li>Kh&ocirc;ng ảnh hưởng đến điều F-2, ch&uacute;ng t&ocirc;i thường sẽ x&oacute;a dữ liệu c&aacute; nh&acirc;n thuộc c&aacute;c danh mục được liệt k&ecirc; dưới đ&acirc;y v&agrave;o ng&agrave;y/giờ được n&ecirc;u b&ecirc;n dưới:
                <ol style="list-style-type:lower-alpha">
                    <li>Loại dữ liệu c&aacute; nh&acirc;n sẽ bị x&oacute;a {NHẬP NG&Agrave;Y/GIỜ}; v&agrave;</li>
                    <li>{NHẬP NG&Agrave;Y/GIỜ BỔ SUNG}.</li>
                </ol>
            </li>
            <li>Bất kể c&aacute;c quy định kh&aacute;c của Mục G n&agrave;y, ch&uacute;ng t&ocirc;i vẫn sẽ giữ lại c&aacute;c t&agrave;i liệu (bao gồm cả c&aacute;c t&agrave;i liệu điện tử) c&oacute; chứa dữ liệu c&aacute; nh&acirc;n:
                <ol style="list-style-type:lower-alpha">
                    <li>Đến&nbsp;mức độ m&agrave; ch&uacute;ng t&ocirc;i được y&ecirc;u cầu phải l&agrave;m như vậy theo ph&aacute;p luật;</li>
                    <li>Nếu ch&uacute;ng t&ocirc;i tin rằng c&aacute;c t&agrave;i liệu đ&oacute; c&oacute; thể li&ecirc;n quan đến bất kỳ thủ tục ph&aacute;p l&yacute; n&agrave;o đang hoặc c&oacute; thể diễn ra; v&agrave;</li>
                    <li>Để thiết lập, thực hiện hoặc bảo vệ c&aacute;c quyền hợp ph&aacute;p của ch&uacute;ng t&ocirc;i (bao gồm việc cung cấp th&ocirc;ng tin cho người kh&aacute;c với mục đ&iacute;ch ph&ograve;ng chống gian lận v&agrave; giảm rủi ro t&iacute;n dụng).</li>
                </ol>
            </li>
        </ol>

        <p><span style="font-size:20px"><strong>F. Bảo mật th&ocirc;ng tin c&aacute; nh&acirc;n của bạn</strong></span></p>

        <ol>
            <li>Ch&uacute;ng t&ocirc;i sẽ thực hiện c&aacute;c biện ph&aacute;p ph&ograve;ng ngừa hợp l&yacute; về mặt kỹ thuật v&agrave; tổ chức để ngăn chặn thất tho&aacute;t, lạm dụng hoặc thay đổi th&ocirc;ng tin c&aacute; nh&acirc;n của bạn.</li>
            <li>Ch&uacute;ng t&ocirc;i sẽ lưu trữ tất cả th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; bạn cung cấp tr&ecirc;n c&aacute;c m&aacute;y chủ (được bảo vệ bằng mật khẩu v&agrave; tường lửa) bảo mật của ch&uacute;ng t&ocirc;i.</li>
            <li>Tất cả c&aacute;c giao dịch t&agrave;i ch&iacute;nh điện tử được nhập th&ocirc;ng qua website của ch&uacute;ng t&ocirc;i sẽ được bảo vệ bởi c&ocirc;ng nghệ m&atilde; h&oacute;a.</li>
            <li>Bạn chấp nhận rằng việc chuyển giao th&ocirc;ng tin qua internet vốn kh&ocirc;ng an to&agrave;n v&agrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng thể đảm bảo t&iacute;nh bảo mật của dữ liệu được gửi qua internet.</li>
            <li>Bạn c&oacute; tr&aacute;ch nhiệm giữ k&iacute;n mật khẩu m&agrave; m&igrave;nh sử dụng để truy cập website của ch&uacute;ng t&ocirc;i; ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng hỏi bạn về mật khẩu của bạn (trừ khi bạn đăng nhập v&agrave;o website của ch&uacute;ng t&ocirc;i).</li>
        </ol>

        <p><span style="font-size:20px"><strong>G. Sửa đổi</strong></span></p>

        <p>Ch&uacute;ng t&ocirc;i c&oacute; thể cập nhật ch&iacute;nh s&aacute;ch n&agrave;y bất cứ l&uacute;c n&agrave;o bằng việc c&ocirc;ng bố một phi&ecirc;n bản mới tr&ecirc;n website của m&igrave;nh. Thỉnh thoảng bạn n&ecirc;n kiểm tra trang n&agrave;y để đảm bảo bạn hiểu hết mọi thay đổi đối với ch&iacute;nh s&aacute;ch n&agrave;y. Ch&uacute;ng t&ocirc;i c&oacute; thể th&ocirc;ng b&aacute;o cho bạn về những thay đổi trong ch&iacute;nh s&aacute;ch n&agrave;y bằng email hoặc th&ocirc;ng qua hệ thống nhắn tin ri&ecirc;ng tr&ecirc;n website của ch&uacute;ng t&ocirc;i.</p>

        <p><span style="font-size:20px"><strong>I. Website của b&ecirc;n thứ ba</strong></span></p>

        <p>Website của ch&uacute;ng t&ocirc;i bao gồm c&aacute;c si&ecirc;u li&ecirc;n kết đến v&agrave; th&ocirc;ng tin chi tiết về c&aacute;c website của b&ecirc;n thứ ba. Ch&uacute;ng t&ocirc;i kh&ocirc;ng kiểm so&aacute;t v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm đối với c&aacute;c ch&iacute;nh s&aacute;ch v&agrave; thực h&agrave;nh về quyền ri&ecirc;ng tư của c&aacute;c b&ecirc;n thứ ba.</p>

        <p><span style="font-size:20px"><strong>J. Cập nhật th&ocirc;ng tin</strong></span></p>

        <p>Vui l&ograve;ng cho ch&uacute;ng t&ocirc;i biết nếu th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; ch&uacute;ng t&ocirc;i lưu giữ về bạn cần được sửa chữa hoặc cập nhật.</p>

        <p><span style="font-size:20px"><strong>K. Cookie</strong></span></p>

        <p>Website của ch&uacute;ng t&ocirc;i sử dụng cookie. Một cookie l&agrave; một tệp c&oacute; chứa m&atilde; định danh (một chuỗi c&aacute;c k&yacute; tự v&agrave; số) được một m&aacute;y chủ web gửi tới một tr&igrave;nh duyệt web v&agrave; được tr&igrave;nh duyệt n&agrave;y lưu trữ. M&atilde; định danh sau đ&oacute; được gửi trở lại m&aacute;y chủ mỗi khi tr&igrave;nh duyệt y&ecirc;u cầu một trang từ m&aacute;y chủ. Cookie c&oacute; thể l&agrave; cookie &ldquo;d&agrave;i hạn&rdquo; hoặc cookie &ldquo;theo phi&ecirc;n&rdquo;: một cookie d&agrave;i hạn sẽ được một tr&igrave;nh duyệt web lưu trữ v&agrave; sẽ c&ograve;n hiệu lực cho đến ng&agrave;y n&oacute; hết hạn, trừ phi bị người d&ugrave;ng x&oacute;a trước ng&agrave;y hết hạn; mặt kh&aacute;c, một cookie theo phi&ecirc;n sẽ hết hạn v&agrave;o cuối phi&ecirc;n của người d&ugrave;ng, khi tr&igrave;nh duyệt web bị đ&oacute;ng. C&aacute;c cookie thường kh&ocirc;ng chứa bất kỳ th&ocirc;ng tin n&agrave;o nhận dạng đ&iacute;ch danh một người d&ugrave;ng, nhưng th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; ch&uacute;ng t&ocirc;i lưu trữ về bạn c&oacute; thể được li&ecirc;n kết đến th&ocirc;ng tin được lưu trữ v&agrave; lấy từ c&aacute;c cookie. {CHỌN CỤM TỪ CH&Iacute;NH X&Aacute;C Ch&uacute;ng t&ocirc;i chỉ sử dụng cookie theo phi&ecirc;n / chỉ sử dụng cookie d&agrave;i hạn / sử dụng cả cookie theo phi&ecirc;n lẫn cookie d&agrave;i hạn tr&ecirc;n website của ch&uacute;ng t&ocirc;i.}</p>

        <ol>
            <li>T&ecirc;n của c&aacute;c cookie m&agrave; ch&uacute;ng t&ocirc;i sử dụng tr&ecirc;n website của m&igrave;nh v&agrave; c&aacute;c mục đ&iacute;ch m&agrave; ch&uacute;ng được sử dụng được n&ecirc;u ra dưới đ&acirc;y:
                <ol style="list-style-type:lower-alpha">
                    <li>ch&uacute;ng t&ocirc;i sử dụng Google Analytics v&agrave; Adwords tr&ecirc;n website của m&igrave;nh để nhận ra một m&aacute;y t&iacute;nh khi một người d&ugrave;ng {BAO GỒM TẤT CẢ VIỆC SỬ DỤNG CỦA C&Aacute;C COOKIE Đ&Oacute; TR&Ecirc;N WEBSITE CỦA BẠN truy cập website / theo d&otilde;i người d&ugrave;ng khi họ điều hướng website / cho ph&eacute;p sử dụng giỏ h&agrave;ng tr&ecirc;n website / cải thiện t&iacute;nh khả dụng của website / ph&acirc;n t&iacute;ch việc sử dụng website / quản trị website / ngăn ngừa gian lận v&agrave; cải thiện t&iacute;nh bảo mật của website / c&aacute; nh&acirc;n h&oacute;a website cho từng người d&ugrave;ng / nhắm mục ti&ecirc;u c&aacute;c quảng c&aacute;o c&oacute; thể l&agrave; sở th&iacute;ch đặc biệt đối với những người d&ugrave;ng cụ thể / m&ocirc; tả (c&aacute;c) mục đ&iacute;ch};</li>
                </ol>
            </li>
            <li>Hầu hết tr&igrave;nh duyệt cho ph&eacute;p bạn từ chối chấp nhận cookie&mdash;v&iacute; dụ:
                <ol style="list-style-type:lower-alpha">
                    <li>Trong Internet Explorer (phi&ecirc;n bản 10), bạn c&oacute; thể chặn c&aacute;c cookie bằng c&aacute;ch sử dụng c&agrave;i đặt ghi đ&egrave; xử l&yacute; cookie c&oacute; sẵn khi nhấp v&agrave;o &ldquo;Tools&rdquo; (&ldquo;C&ocirc;ng cụ&rdquo;), &ldquo;Internet Options&rdquo; (&ldquo;T&ugrave;y chọn Internet&rdquo;), &ldquo;Privacy&rdquo; (&ldquo;Quyền ri&ecirc;ng tư&rdquo;) v&agrave; &ldquo;Advanced&rdquo; (&ldquo;N&acirc;ng cao&rdquo;);</li>
                    <li>Trong Firefox (phi&ecirc;n bản 24), bạn c&oacute; thể chặn tất cả cookie bằng c&aacute;ch nhấp v&agrave;o &ldquo;Tools&rdquo;, &ldquo;Options&rdquo;, &ldquo;Privacy&rdquo;, chọn &ldquo;Use custom settings for history&rdquo; (&ldquo;Sử dụng c&agrave;i đặt t&ugrave;y chỉnh cho lịch sử&rdquo;) từ tr&igrave;nh đơn thả xuống v&agrave; bỏ chọn &ldquo;Accept cookies from sites&rdquo; (&ldquo;Chấp nhận cookie từ c&aacute;c website&rdquo;); v&agrave;</li>
                    <li>Trong Chrome (phi&ecirc;n bản 29), bạn c&oacute; thể chặn tất cả c&aacute;c cookie bằng c&aacute;ch truy cập tr&igrave;nh đơn &ldquo;Customize and control&rdquo; (&ldquo;T&ugrave;y chỉnh v&agrave; kiểm so&aacute;t&rdquo;) rồi nhấp v&agrave;o &ldquo;Settings&rdquo; (&ldquo;C&agrave;i đặt&rdquo;), &ldquo;Show advanced settings&rdquo; (&ldquo;Hiển thị c&agrave;i đặt n&acirc;ng cao&rdquo;) v&agrave; &ldquo;Content settings&rdquo; (&ldquo;C&agrave;i đặt nội dung&rdquo;), sau đ&oacute; chọn &ldquo;Block sites from setting any data&rdquo; (&ldquo;Chặn c&aacute;c website c&agrave;i đặt bất kỳ dữ liệu n&agrave;o&rdquo;) b&ecirc;n dưới ti&ecirc;u đề &ldquo;Cookies&rdquo;.</li>
                </ol>
            </li>
        </ol>

        <p>Việc chặn tất cả c&aacute;c cookie sẽ c&oacute; t&aacute;c động ti&ecirc;u cực đến t&iacute;nh khả dụng của nhiều website. Nếu bạn chặn cookie, bạn sẽ kh&ocirc;ng thể sử dụng mọi t&iacute;nh năng tr&ecirc;n website của ch&uacute;ng t&ocirc;i.</p>

        <ol start="3">
            <li>Bạn c&oacute; thể x&oacute;a c&aacute;c cookie đ&atilde; được lưu trữ tr&ecirc;n m&aacute;y t&iacute;nh của m&igrave;nh&mdash;v&iacute; dụ:
                <ol style="list-style-type:lower-alpha">
                    <li>Trong Internet Explorer (phi&ecirc;n bản 10), bạn phải x&oacute;a thủ c&ocirc;ng c&aacute;c tệp cookie (bạn c&oacute; thể t&igrave;m thấy hướng dẫn để l&agrave;m điều đ&oacute; tại&nbsp;<a href="http://support.microsoft.com/kb/278835">http://support.microsoft.com/kb/278835</a>);</li>
                    <li>Trong Firefox (phi&ecirc;n bản 24), bạn c&oacute; thể x&oacute;a c&aacute;c cookie bằng c&aacute;ch nhấp v&agrave;o &ldquo;Tools&rdquo;, &ldquo;Options&rdquo; v&agrave; &ldquo;Privacy&rdquo;, sau đ&oacute; chọn &ldquo;Use custom settings for history&rdquo;, nhấp v&agrave;o &ldquo;Show Cookies&rdquo; (&ldquo;Hiển thị cookie&rdquo;), sau đ&oacute; nhấp v&agrave;o &ldquo;Remove All Cookies&rdquo; (&ldquo;X&oacute;a tất cả cookie&rdquo;); v&agrave;</li>
                    <li>Trong Chrome (phi&ecirc;n bản 29), bạn c&oacute; thể x&oacute;a tất cả cookie bằng c&aacute;ch truy cập tr&igrave;nh đơn &ldquo;Customize and control&rdquo; v&agrave; nhấp v&agrave;o &ldquo;Settings&rdquo;, &ldquo;Show advanced settings&rdquo; v&agrave; &ldquo;Clear browsing data&rdquo; (&ldquo;X&oacute;a dữ liệu duyệt web&rdquo;), sau đ&oacute; chọn &ldquo;Delete cookies and other site and plug-in data&rdquo; (&ldquo;X&oacute;a c&aacute;c cookie v&agrave; dữ liệu tr&igrave;nh cắm v&agrave; website kh&aacute;c&rdquo;) trước khi nhấp v&agrave;o &ldquo;Clear browsing data&rdquo;.</li>
                </ol>
            </li>
            <li>Việc x&oacute;a cookie sẽ c&oacute; t&aacute;c động ti&ecirc;u cực đến t&iacute;nh khả dụng của nhiều website.</li>
        </ol>

    </div>
</div>
@endsection

@section('title')
Bảo mật - TAT SHOP
@endsection

@section('seo')
<meta property="og:url" content="{{asset('')}}bao-mat">
<meta property="og:type" content="article">
<meta property="og:title" content="Bảo mật - TAT SHOP">
<meta property="og:description" content="TAT được thành lập bởi một nhóm sinh viên với mục tiêu cung cấp các sản phẩm chất lượng tốt, giá cả hợp lý cho mọi đối tượng khách hàng đặc biệt là sinh viên. Với tiêu chí uy tín, an toàn, shop xin cam kết chất lượng sản phẩm hoàn toàn giống như hình ảnh quảng cáo và đảm bảo quyền lợi khách hàng theo đúng như trong Quy định về quyền lợi khách hàng mà TAT đã đưa ra. Xin chân thành ơn quý khách đã tin tưởng và mua hàng của chúng tôi">
<meta property="og:image" content="image/tat.jpg">
@endsection