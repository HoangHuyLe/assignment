<?php
session_start();
?>


<!DOCTYPE html>
<html lang="vi">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width">

    <!-- Site Metas -->
    <title>Ultraman Company</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="lib/pogo-slider/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Footer CSS -->
    <link rel="stylesheet" href="css/footer.css" />
    <!-- Animate CSS-->
    <link rel="stylesheet" href="css/homepage/animate.min.css" />
    <!-- Services CSS -->
    <link rel="stylesheet" href="css/services/services.css" />

</head>

<body id="services" class="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- ====== HEADER SECTION ====== -->
    <?php include("include/header.php") ?>

    <!-- ====== BANNER SECTION ====== -->
    <div class="container-fluid banner">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 section-part text-center">
                <h1>DỊCH VỤ CỦA CHÚNG TÔI</h1>
                <p>Công ty thiết kế website Ultraman không chỉ tư vấn mà còn trực tiếp cùng bạn đưa ra những chiến lược
                    web toàn diện cho việc kinh doanh trở nên tốt hơn.</p>
                <button class="btn btn-danger"><a href="#service1" style="color: white;">Xem thêm </a></button>
            </div>
        </div>
        <i class="fa fa-angle-double-down blink" aria-hidden="true"></i>
    </div>
    <!-- end Banner -->

    <!-- ====== SMALL NAVBAR SECTION ====== -->
    <!--Navbar on Desktop-->
    <div class="main-container desktop-nav nav-bkg-color d-none d-lg-block sticky-top">
        <div class="inside-container nav-contain ">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                <div class="navbar-nav nav-list ">
                    <a class="menu" href="#service1">THIẾT KẾ WEBSITE</a>
                    <a class="menu" href="#service2">VIẾT NỘI DUNG WEB</a>
                    <a class="menu" href="#service3">THƯƠNG MẠI ĐIỆN TỬ</a>
                    <a class="menu" href="#service4">LẬP TRÌNH APP WEB</a>
                    <a class="menu" href="#service5">CHIẾN DỊCH QUẢNG CÁO</a>
                    <a class="menu" href="#service6">HOSTING, TÊN MIỀN</a>
                </div>
            </nav>
        </div>
    </div>
    <!--Navbar Mobile-->
    <div class="main-container mobile-nav nav-bkg-color d-block d-lg-none sticky-top">
        <div class="inside-container nav-contain">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-small" aria-controls="navbar-small" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <span class="title">Dịch vụ</span>
                <div class="collapse navbar-collapse" id="navbar-small">
                    <div class="navbar-nav nav-list">
                        <a class="menu" href="#service1">THIẾT KẾ WEBSITE</a>
                        <a class="menu" href="#service2">VIẾT NỘI DUNG WEB</a>
                        <a class="menu" href="#service3">THƯƠNG MẠI ĐIỆN TỬ</a>
                        <a class="menu" href="#service4">LẬP TRÌNH APP WEB</a>
                        <a class="menu" href="#service5">CHIẾN DỊCH QUẢNG CÁO</a>
                        <a class="menu" href="#service6">HOSTING, TÊN MIỀN</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- ====== SERVICES SECTION ====== -->
    <!-- ====== 1) Design website ====== -->
    <div id="service1" class="main-container">
        <div class="inside-container">
            <div class="row service-content">
                <div class="col-12">
                    <h2><span style="color:#f2184f;">THIẾT KẾ WEBSITE</span> CHUYÊN NGHIỆP </h2>
                    <hr>
                    <p>Dịch vụ thiết kế website không chỉ đẹp mắt mà còn mang về nhiều lượt truy cập, nhiều đơn hàng.
                        Đội ngũ thiết kế web luôn chăm chút từ nội dung, chức năng đến cả cách thức vận hành.</p>
                </div>
            </div>
            <div class="row wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="col-12">
                    <img src="images/services_img/service1.jpg" class="img-fluid" alt="service1">
                </div>
            </div>
            <div class="row">
                <div class="col-12 service-content">
                    <h3>Tất cả những gì bạn cần, chúng tôi có</h3>
                    <p>Tự hào là công ty thiết kế web uy tín, chuyên nghiệp hàng đầu Việt Nam, Ultraman cung cấp dịch vụ
                        thiết kế web cao cấp mang lại nhiều lợi ích ưu việt. Tuyệt đối nói không với việc thiết kế web
                        giá rẻ, kém chất lượng</p>
                </div>
            </div>
            <div class="row service-colum wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="col-lg-4 star-hover">
                    <div class="row">
                        <div class="col-3 icon-img">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                        </div>
                        <div class="col-9">
                            <h3>Tương thích mọi thiết bị</h3>
                            <p>Thiết kế web với công nghệ responsive giúp website có thể tự động thích ứng trên mọi
                                thiết bị, phát huy hết sức mạnh của nó. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row star-hover">
                        <div class="col-3 icon-img">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                        </div>
                        <div class="col-9">
                            <h3>Quản lý đơn giản</h3>
                            <p>Hệ thống quản lí nội dung hiện đại, tiện lợi, đồng thời tối ưu dữ liệu để phù hợp hơn với
                                mọi thiết bị. Giúp dễ dàng cập nhật và quản lí nội dung trên website của bạn.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 star-hover">
                    <div class="row content-colum">
                        <div class="col-3 icon-img">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <div class="col-9">
                            <h3>Chi phí hiệu quả</h3>
                            <p>Cho dù nhu cầu thiết kế web như thế nào thì động cơ quyết định vẫn là tiết kiệm nhiều chi
                                phí. Nhiều đãi đi kèm giúp hạn chế mức chi phí bỏ ra. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== 2) Write website Content ====== -->
    <div id="service2" class="main-container">
        <div class="inside-container">
            <div class="row service-content">
                <div class="col-12">
                    <h2><span style="color:#f2184f;">VIẾT NỘI </span> DUNG WEB </h2>
                    <hr>
                    <p>Xây dựng nội dung website sáng tạo, thu hút và giữ chân khách hàng hiệu quả, đặc biệt từ khóa,
                        nội dung được tối ưu chuẩn SEO giúp gia tăng thứ hạng trên công cụ tìm kiếm, bởi đội ngũ
                        Copywriter dày dặn kinh nghiệm.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="images/services_img/service2.jpg" class="img-fluid" alt="service1">
                </div>
            </div>
            <div class="row wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="col-12 service-content">
                    <h3>Tại sao cần phải xây dựng nội dung web?</h3>
                </div>
            </div>
            <div class="row wow slideInRight" data-wow-duration="1.5s" data-wow-delay="0.7s">
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>HOẠCH ĐỊNH BÀI BẢN</h3>
                        <p>Quản trị nội dung tập trung vào khách hàng và mục tiêu chung của doanh nghiệp. </p>
                    </div>
                </div>
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-arrows" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>ĐIỀU HƯỚNG DỄ DÀNG</h3>
                        <p>Nội dung website trực quan, copywriting định hướng người đọc đến thông tin cần thiết. </p>
                    </div>
                </div>
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>ĐỌC LƯỚT NHANH CHÓNG</h3>
                        <p>Sản xuất nội dung kết hợp kỹ thuật sắp xếp, in đậm, đoạn văn ngắn giúp dễ đọc lướt. </p>
                    </div>
                </div>
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>TỐI ƯU HÓA CÔNG CỤ TÌM KIẾM</h3>
                        <p>Nội dung tiếp thị theo chuẩn SEO mang đến hiệu quả tìm kiếm, chia sẻ và liên kết. </p>
                    </div>
                </div>
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>HIỆU CHỈNH ĐA DẠNG</h3>
                        <p>Viết nội dung đơn giản, trực quan giúp định dạng chính xác mọi yếu tố của văn bản. </p>
                    </div>
                </div>
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-camera-retro" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>THƯ VIỆN ĐA PHƯƠNG TIỆN</h3>
                        <p>Thư viện hình ảnh, âm nhạc, video và tài liệu để thêm vào trang bất cứ khi nào cần thiết.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>ĐA DẠNG NỘI DUNG</h3>
                        <p>Đội ngũ viết bài thuê chuyên nghiệp giúp sáng tạo nội dung đa dạng.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-3 service2-col star-hover">
                    <div class="icon-img">
                        <i class="fa fa-magic" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3>THAY ĐỔI LINH HOẠT</h3>
                        <p>Copywriter sẵn sàng sáng tạo nội dung, thay đổi nội dung linh hoạt theo thiết kế.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== 3) E-commerce ======= -->
    <div id="service3" class="main-container Ecommerce-sec">
        <div class="inside-container Ecommerce-row">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row detail-Ecommerce wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="col-12">
                            <h2><span style="color:#f2184f;">THƯƠNG MẠI </span> ĐIỆN TỬ </h2>
                            <hr>
                            <p>Gia tăng doanh số bán hàng trên kênh online cũng như xây dựng vị thế trên thị trường của
                                bạn với những giải pháp thương mại điện tử (TMĐT) hàng đầu. Đó là những gì dịch vụ thiết
                                kế website của chúng tôi mang lại.</p>
                        </div>
                    </div>
                    <div class="row Ecommerce-cols wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 detail">
                                    <div class="row">
                                        <div class="col-3 icon-img">
                                            <i class="fa fa-signal"></i>
                                        </div>
                                        <div class="col-9">
                                            <h3>Lượt truy cập tăng</h3>
                                            <p>Nền tảng thương mại điện tử được tối ưu hóa nhằm gia tăng khả năng hiển
                                                thị và thứ hạng trên công cụ tìm kiếm. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 detail">
                                    <div class="row">
                                        <div class="col-3 icon-img">
                                            <i class="fa fa-cogs"></i>
                                        </div>
                                        <div class="col-9">
                                            <h3> Tính linh hoạt cao </h3>
                                            <p> Phát triển kinh doanh, hỗ trợ nhu cầu tiếp cận thị trường mới với chiến
                                                lược địa phương hóa tại từng thị trường </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 detail">
                                    <div class="row">
                                        <div class="col-3 icon-img">
                                            <i class="fa fa-smile-o"></i>
                                        </div>
                                        <div class="col-9">
                                            <h3>Cải thiện doanh số</h3>
                                            <p>Truyền cảm hứng, chuyển đổi người xem thành người mua và người mua thành
                                                khách hàng trung thành của thương hiệu. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 detail">
                                    <div class="row">
                                        <div class="col-3 icon-img">
                                            <i class="fa fa-send"></i>
                                        </div>
                                        <div class="col-9">
                                            <h3>Giữ khách hàng ở lại </h3>
                                            <p>Gia tăng tỉ lệ khách hàng quay trở lại tạo ra nguồn khách hàng trung
                                                thành, gắn bó lâu dài với thương hiệu. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 Ecommerce-img d-none d-lg-block">
                    <img src="images/services_img/e-commerce.jpg" class="img-fluid " alt="e1">
                    <img src="images/services_img/e-commerce2.jpg" class="img-fluid " alt="e2">
                </div>
            </div>
        </div>
    </div>

    <!-- ====== 4) Programming Web App ====== -->
    <div id="service4" class="main-container">
        <div class="inside-container">
            <div class="row service4-title">
                <div class="col-12">
                    <h2><span style="color:#f2184f;">LẬP TRÌNH </span> APP WEB </h2>
                    <hr>
                    <p>Phát triển App web với thiết kế chuyên biệt khiến quy trình kinh doanh trở nên hợp lý hơn và tạo
                        ra những trải nghiệm người dùng đầy lôi cuốn.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5 text-center">
                    <img src="images/services_img/service4.png" class="img-fluid " alt="service1">
                </div>
                <div class="col-12 col-md-7 service4-content">
                    <h3>Biến mọi ý tưởng thành hiện thực</h3>
                    <p>
                        Chúng tôi tạo ra App web chuyên biệt tương thích với mọi yêu cầu của bạn. Sử dụng công nghệ mới
                        nhất giúp bạn nâng cao hiệu quả, hướng đến sự cách tân và sở hữu lợi thế cạnh tranh. Với một ứng
                        dụng riêng biệt, bạn có thể mang sự đột phá đến thị trường, đẩy mạnh họat động bán hàng, cắt
                        giảm chi phí vận hành và nâng cao năng suất. Web app sẽ được tinh chỉnh nhiều lần trước khi đưa
                        vào sử dụng nhờ vào sự phản hồi của một nhóm khách hàng đại diện.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- ====== 5) Marketing Campaign ====== -->
    <div id="service5" class="main-container">
        <div class="inside-container">
            <div class="row">
                <div class="col-12 col-lg-6 service5-img text-center">
                    <img src="images/services_img/service5.png" class="img-fluid " alt="service5">
                </div>
                <div class="col-12 col-lg-6 service5-detail wow slideInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h2>CHIẾN DỊCH QUẢNG CÁO</h2>
                    <hr>
                    <p class="desc">Chiến dịch quảng cáo bám sát mục tiêu kinh doanh sẽ mang bạn đến gần khách hàng tiềm
                        năng một cách nhanh chóng.</p>
                    <p><i class="fa fa-heart"></i>Truyền cảm hứng cho khách hàng tiềm năng, tạo động lực cho họ ra quyết
                        định mua hàng.</p>
                    <p><i class="fa fa-tags"></i>Gia tăng khả năng hiển thị trực tuyến nhằm phát triển và nhắc nhớ về
                        nhận
                        diện thương hiệu.</p>
                    <p><i class="fa fa-clock-o"></i>Cải thiện việc quản lý bằng những kết quả được báo cáo và cập nhật
                        liên
                        tục.</p>
                    <p><i class="fa fa-retweet"></i>Dẫn dắt lưu lượng truy cập trang web, khách hàng tiềm năng, tỷ lệ
                        chuyển đổi và doanh số tăng.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== 6) Hosting, Domain ====== -->
    <div id="service6" class="main-container">
        <div class="inside-container">
            <div class="row service6-title">
                <div class="col-12">
                    <h2><span style="color:#f2184f;">HOSTING, </span> TÊN MIỀN </h2>
                    <hr>
                    <p> Ultraman đã được công nhận là nhà đăng ký tên miền .vn và nhà đăng ký tên miền quốc tế.
                        Chúng tôi dễ dàng quản lý tên miền trực tuyến chỉ cần có kết nối internet và ngăn chặn việc
                        chuyển đổi tên miền trái phép bằng cách khóa tên miền
                    </p>
                </div>
            </div>
            <div class="row service6-content wow slideInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <h3>BẢNG GIÁ TÊN MIỀN</h3>
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">Tên miền</th>
                            <th scope="col">Phí cài đặt (VND)</th>
                            <th scope="col">Phí duy trì hàng năm (VND/năm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>.vn</td>
                            <td>300.000</td>
                            <td>480.000</td>
                        </tr>
                        <tr>
                            <td>com.vn / net.vn / biz.vn</td>
                            <td>300.000</td>
                            <td>380.000</td>
                        </tr>
                        <tr>
                            <td>gov.vn / org.vn / edu.vn</td>
                            <td>220.000</td>
                            <td>250.000</td>
                        </tr>
                        <tr>
                            <td>.org</td>
                            <td>Miễn phí</td>
                            <td>350.000</td>
                        </tr>
                        <tr>
                            <td>.com</td>
                            <td>Miễn phí</td>
                            <td>300.000</td>
                        </tr>
                        <tr>
                            <td>.net</td>
                            <td>Miễn phí</td>
                            <td>300.000</td>
                        </tr>
                        <tr>
                            <td>.info</td>
                            <td>Miễn phí</td>
                            <td>300.000</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <!-- ====== FOOTER ====== -->
    <?php include("include/footer.php") ?>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>


    <!-- ALL JS FILES -->
    <script src="lib/bootstrap/jquery.min.js"></script>
    <script src="lib/bootstrap/popper.min.js"></script>
    <script src="lib/bootstrap/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/smoothscroll.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/homepage/wow.min.js"></script>
    <script src="js/services/service.js"></script>
    <script>
        $(document).ready(function(){
            $("a#services").css("color", "#f2184f");
        })
    </script>
</body>

</html>