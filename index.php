<?php
session_start();
include_once('include/dbconnect.php');
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
    <!-- Ionicons CSS -->
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!-- Lightbox CSS -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- Owlcarousel CSS -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Footer CSS -->
    <link rel="stylesheet" href="css/footer.css" />
    <!-- Homepage CSS-->
    <link rel="stylesheet" href="css/homepage/animate.min.css" />
    <link rel="stylesheet" href="css/homepage/homepage.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <!-- <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div> -->
    <!-- END LOADER -->

    <!-- ====== HEADER SECTION ====== -->
    <?php include("include/header.php") ?>

    <!-- ====== BANNER SECTION ====== -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <?php
                    $query_slider = "SELECT * FROM page_images_tbl WHERE Page='home'AND Type='slider'AND Number > 0 ORDER BY Number";
                    $sliders = mysqli_query($con, $query_slider);
                    $slider_array = array();
                    if ($sliders) {
                        while ($row = mysqli_fetch_assoc($sliders)) {
                            array_push($slider_array, $row['Image']);
                        }
                    }
                    ?>

                    <div class="pogoSlider-slide" style="background-image:url(upload/slider/<?php echo $slider_array[0] ?>);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3>Công ty thiết kế <br> website ULTRAMAN </h3>
                                        <br>
                                        <h4><span class="theme_color">Uy tín - Chất lượng</span></h4>
                                        <br>
                                        <p>Chúng tôi có mọi thứ bạn cần</p>
                                        <a class="contact_bt" href="about.html">Về chúng tôi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    for ($i = 1; $i < count($slider_array); $i++) {
                        echo "<div class='pogoSlider-slide' style='background-image:url(images/banner/{$slider_array[$i]});'></div>";
                    }
                    ?>

                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- ====== 1) ABOUT US SECTION ====== -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <div class="left">
                                <p class="section_count">01</p>
                            </div>
                            <div class="right">
                                <p class="small_tag">GIỚI THIỆU</p>
                                <h2><span class="theme_color">Chúng tôi </span> có thể giúp bạn pháp triển việc kinh
                                    doanh qua 4 bước đơn giản</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section dark_bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 text_align_center padding_0">
                    <div class="full">
                        <img class="img-responsive" src="images/about-us-bg.png" alt="#" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 white_fonts padding_left_right">
                    <h3 class="small_heading">MỌI THỨ BẠN CẦN CHỈ QUA 4 BƯỚC</h3>
                    <p class="mt-lg-0"><u>BƯỚC 1</u>: Khách hàng lựa chọn giao diện website phù hợp. </p>
                    <p class="mt-lg-0"><u>BƯỚC 2</u>: Cung cấp thông tin và yêu cầu chỉnh sửa website. </p>
                    <p class="mt-lg-0"><u>BƯỚC 3</u>: ULTRAMAN chỉnh sửa theo yêu cầu và tiến hành demo. </p>
                    <p class="mt-lg-0"><u>BƯỚC 4</u>: Tiến hành chạy thử nghiệm và bàn giao sản phẩm. </p>
                    <h4 id="text_contact">* Liên hệ với chúng tôi qua SĐT <u>(+84)358-121-719</u> hoặc email <u>info@ultraman.com</u>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- End ABOUT US -->

    <!-- ====== 2) SERVICES SECTION ====== -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <div class="left">
                                <p class="section_count">02</p>
                            </div>
                            <div class="right">
                                <p class="small_tag">DỊCH VỤ</p>
                                <h2><span class="theme_color">Chúng tôi</span> cung cấp dịch vụ thiết kế website chuyên
                                    nghiệp và đa dạng</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top_30">

                <div class="col-sm-6 col-md-4">
                    <div class="service_blog">
                        <div class="service_icons">
                            <img width="75" height="75" src="images/services_img/icon_1.png" alt="#">
                        </div>
                        <div class="full">
                            <h4> THIẾT KẾ WEBSITE</h4>
                        </div>
                        <div class="full">
                            <p class="text-justify"> Công nghệ thiết kế web tùy biến Reponsive Design, ngôn ngữ lập
                                trình tối ưu dễ thay
                                đổi bố cục các khối thông tin, giúp website linh hoạt với mọi thiết bị.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="service_blog">
                        <div class="service_icons">
                            <img width="75" height="75" src="images/services_img/icon_2.png" alt="#">
                        </div>
                        <div class="full">
                            <h4>VIẾT NỘI DUNG WEB</h4>
                        </div>
                        <div class="full">
                            <p class="text-justify">Website hoàn chỉnh đủ nội dung chuẩn SEO gồm từ khóa chuyên ngành
                                được cập nhật đều đặn
                                để giữ chân, thu hút khách hàng quay trở lại.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="service_blog">
                        <div class="service_icons">
                            <img width="75" height="75" src="images/services_img/icon_3.png" alt="#">
                        </div>
                        <div class="full">
                            <h4>THƯƠNG MẠI ĐIỆN TỬ</h4>
                        </div>
                        <div class="full">
                            <p class="text-justify">Với giải pháp thương mại điện tử hàng đầu, sản phẩm cuối cùng Cánh
                                Cam trao cho bạn là vị
                                thế trên thị trường và doanh số bán hàng.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="service_blog">
                        <div class="service_icons">
                            <img width="75" height="75" src="images/services_img/icon_4.png" alt="#">
                        </div>
                        <div class="full">
                            <h4>LẬP TRÌNH APP WEB</h4>
                        </div>
                        <div class="full">
                            <p class="text-justify">Cánh Cam tạo ra thiết kế & lập trình App chuyên biệt với mục tiêu
                                mang đến người dùng
                                trải nghiệm đầy lôi cuốn, ấn tượng trên thiết bị di động.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="service_blog">
                        <div class="service_icons">
                            <img width="75" height="75" src="images/services_img/icon_5.png" alt="#">
                        </div>
                        <div class="full">
                            <h4>CHIẾN DỊCH QUẢNG CÁO</h4>
                        </div>
                        <div class="full">
                            <p class="text-justify">Chiến dịch quảng cáo hấp dẫn ứng dụng công nghệ mới là phương thức
                                tối ưu đưa bạn nhanh
                                chóng đến gần khách hàng mục tiêu.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="service_blog">
                        <div class="service_icons">
                            <img width="75" height="75" src="images/services_img/icon_6.png" alt="#">
                        </div>
                        <div class="full">
                            <h4>HOSTING, TÊN MIỀN</h4>
                        </div>
                        <div class="full">
                            <p class="text-justify">Bảo vệ thương hiệu khi đăng ký tên miền đồng thời lưu trữ, phát
                                triển web với dịch vụ
                                hosting chất lượng cao, ổn định.</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end SERVICES -->

    <!-- ====== 3) PORTFOLIO SECTION ====== -->
    <div class="section ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <div class="left">
                                <p class="section_count">03</p>
                            </div>
                            <div class="right">
                                <p class="small_tag">HỒ SƠ NĂNG LỰC</p>
                                <h2><span class="theme_color">CHÚNG TÔI</span> ĐÃ LÀM ĐƯỢC NHỮNG GÌ TRONG MỘT
                                    NĂM QUA?</h2>
                                <p class="large">Các dự án gần đây của chúng tôi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top_30">
                <section id="portfolio" class="section-bg">
                    <div class="container">
                        <div class="row portfolio-container">
                            <?php
                            $query_num_product = "SELECT NumProduct FROM page_tbl WHERE PageType='home'";
                            $result = mysqli_query($con, $query_num_product);
                            $num_product = mysqli_fetch_assoc($result)['NumProduct'];
                            $query_product = "SELECT * FROM products ORDER BY CompleteDate DESC, Id DESC";
                            $products = mysqli_query($con, $query_product);
                            $count = 1;

                            if ($products) {
                                while ($product = mysqli_fetch_assoc($products)) {
                                    if($count++ > $num_product){
                                        break;
                                    } else {
                            ?>
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow slideInUp" data-wow-duration="1s" data-wow-delay="0s">
                                        <div class="portfolio-wrap">
                                            <figure>
                                                <img src="upload/products/<?php echo $product['Image'] ?>" class="img-fluid" alt="product">
                                                <a href="upload/products/<?php echo $product['Image'] ?>" data-lightbox="portfolio" data-title="Sản phẩm" class="link-preview" title="Xem trước"><i class="ion ion-eye"></i></a>
                                                <a href="<?php echo $product['Link'] ?>" target="_blank" class="link-details" title="Xem chi tiết"><i class="ion ion-android-open"></i></a>
                                            </figure>
                                            <div class="portfolio-info">
                                                <h4><a href="<?php echo $product['Link'] ?>" target="_blank">
                                                        <?php echo $product['Title'] ?>
                                                    </a></h4>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    }
                                }
                            }
                            mysqli_close($con)
                            ?>


                            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app wow slideInUp" data-wow-duration="1s" data-wow-delay="0s">
                                <div class="portfolio-wrap">
                                    <figure>
                                        <img src="images/portfolio/product_1.PNG" class="img-fluid" alt="">
                                        <a href="images/portfolio/product_1.PNG" data-lightbox="portfolio" data-title="Sản phẩm 1" class="link-preview" title="Xem trước"><i class="ion ion-eye"></i></a>
                                        <a href="https://store.sony.com.vn/" target="_blank" class="link-details" title="Xem chi tiết"><i class="ion ion-android-open"></i></a>
                                    </figure>
                                    <div class="portfolio-info">
                                        <h4><a href="https://store.sony.com.vn/" target="_blank">SONY Center tăng trưởng
                                                doanh số ấn tượng</a></h4>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </section><!-- #portfolio -->
            </div>

        </div>
    </div>
    <!-- end PORTFOLIO-->

    <!-- ====== 4) CLIENTS SECTION ====== -->
    <div class="section layout_padding dark_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left white_fonts">
                            <div class="left">
                                <p class="section_count">04</p>
                            </div>
                            <div class="right">
                                <h2>HƠN 200 <span class="theme_color">KHÁCH HÀNG ĐÃ TIN TƯỞNG VÀ LỰA CHỌN CHÚNG TÔI</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top_30">
                <div class="col-lg-12 margin-top_30 white_fonts">
                    <p>Chúng tôi tự hào được đồng hành cùng với sự phát triển lớn mạnh của hơn 200 doanh nghiệp trong
                        và ngoài nước đến từ nhiều ngành nghề với quy mô lớn nhỏ khác nhau. Với chúng tôi, thiết kế
                        website là một niềm
                        đam mê, nhìn thấy khách hàng hài lòng với sản phẩm là hạnh phúc</p>
                </div>
            </div>
            <div class="row margin-top_30 counter_section wow fadeInUp" data-wow-duration="2s">
                <div class="col-sm-12 col-md-4">
                    <div class="counter margin-top_30">
                        <h2 class="timer count-title count-number" data-to="212" data-speed="1500"></h2>
                        <p class="count-text">KHÁCH HÀNG</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="counter margin-top_30">

                        <h2 class="timer count-title count-number" data-to="421" data-speed="1500"></h2>
                        <p class="count-text">DỰ ÁN</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="counter margin-top_30">
                        <h2 class="timer count-title count-number" data-to="1330" data-speed="1500"></h2>
                        <p class="count-text">GIỜ LÀM VIỆC</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="clients" class="wow fadeInUp">
        <div class="container">

            <header class="section-header">
                <h3>Khách hàng thân thiết</h3>
            </header>

            <div class="owl-carousel clients-carousel">
                <img src="images/clients/client-1.png" alt="">
                <img src="images/clients/client-2.png" alt="">
                <img src="images/clients/client-3.png" alt="">
                <img src="images/clients/client-4.png" alt="">
                <img src="images/clients/client-5.png" alt="">
                <img src="images/clients/client-6.png" alt="">
                <img src="images/clients/client-7.png" alt="">
                <img src="images/clients/client-8.png" alt="">
            </div>

        </div>
    </section>
    <!-- end CLIENT -->

    <!-- ====== 5) TESTIMONIALS SECTION ====== -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <div class="left">
                                <p class="section_count">05</p>
                            </div>
                            <div class="right">
                                <p class="small_tag">ĐIỂM NHẤN</p>
                                <h2>ẤN TƯỢNG <span class="theme_color">CỦA KHÁCH HÀNG VỀ ULTRAMAN </span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="testimonials" class="section-bg wow fadeInUp" data-wow-duration="1s">
            <div class="container">

                <header class="section-header">
                    <h3>Khách hàng nghĩ gì?</h3>
                </header>

                <div class="owl-carousel testimonials-carousel">

                    <div class="testimonial-item">
                        <img src="images/testimonial/customer-1.jpg" class="testimonial-img" alt="">
                        <h3>Ông Lý Anh Quân</h3>
                        <h4>Trưởng bộ phận phân phối Sony</h4>
                        <p>
                            <img src="images/testimonial/quote-sign-left.png" class="quote-sign-left" alt="">
                            Vị thế của Sony so với các đối thủ cũng như trong lòng khách hàng đã tăng lên gấp nhiều lần
                            so với trước khi website chính thức ra mắt. Một câu chuyện hoàn toàn sống động về sự chuyển
                            mình đột phá trong thời đại số hóa đã được truyền tải trọn vẹn trong website như ý muốn của
                            Sony.
                            <img src="images/testimonial/quote-sign-right.png" class="quote-sign-right" alt="">
                        </p>
                    </div>

                    <div class="testimonial-item">
                        <img src="images/testimonial/customer-2.jpg" class="testimonial-img" alt="">
                        <h3>Bà Ngô Thị Phụng</h3>
                        <h4>Ceo &amp; Founder Công ty Vĩnh Tường</h4>
                        <p>
                            <img src="images/testimonial/quote-sign-left.png" class="quote-sign-left" alt="">
                            Hiện nay khách hàng gửi email về để hỏi thăm về sản phẩm Vĩnh Tường ngày một nhiều, cho
                            thấy trang web mới thực sự hấp dẫn người xem và hiệu quả hơn cho việc tương tác với khách
                            hàng. Cảm ơn Ultraman nhé.
                            <img src="images/testimonial/quote-sign-right.png" class="quote-sign-right" alt="">
                        </p>
                    </div>

                    <div class="testimonial-item">
                        <img src="images/testimonial/customer-3.jpg" class="testimonial-img" alt="">
                        <h3>Chị Anie Granda</h3>
                        <h4>Trưởng phòng nhân sự Công ty Elca</h4>
                        <p>
                            <img src="images/testimonial/quote-sign-left.png" class="quote-sign-left" alt="">
                            Hiện nay khách hàng gửi email về để hỏi thăm về sản phẩm Elca ngày một nhiều, cho
                            thấy trang web mới thực sự hấp dẫn người xem và hiệu quả hơn cho việc tương tác với khách
                            hàng. Cảm ơn Ultraman nhé.
                            <img src="images/testimonial/quote-sign-right.png" class="quote-sign-right" alt="">
                        </p>
                    </div>

                    <div class="testimonial-item">
                        <img src="images/testimonial/customer-4.jpg" class="testimonial-img" alt="">
                        <h3>Anh Trần Đức Anh</h3>
                        <h4>Trưởng phòng đối ngoại Công ty Đất Xanh</h4>
                        <p>
                            <img src="images/testimonial/quote-sign-left.png" class="quote-sign-left" alt="">
                            Hiện nay khách hàng gửi email về để hỏi thăm về sản phẩm Đất Xanh ngày một nhiều, cho
                            thấy trang web mới thực sự hấp dẫn người xem và hiệu quả hơn cho việc tương tác với khách
                            hàng. Cảm ơn Ultraman nhé.
                            <img src="images/testimonial/quote-sign-right.png" class="quote-sign-right" alt="">
                        </p>
                    </div>

                    <div class="testimonial-item">
                        <img src="images/testimonial/customer-5.jpg" class="testimonial-img" alt="">
                        <h3>Ông Alex Nguyễn</h3>
                        <h4>Ceo &amp; Founder Công ty CBRE Việt Nam</h4>
                        <p>
                            <img src="images/testimonial/quote-sign-left.png" class="quote-sign-left" alt="">
                            Hiện nay khách hàng gửi email về để hỏi thăm về sản phẩm CBRE ngày một nhiều, cho
                            thấy trang web mới thực sự hấp dẫn người xem và hiệu quả hơn cho việc tương tác với khách
                            hàng. Cảm ơn Ultraman nhé.
                            <img src="images/testimonial/quote-sign-right.png" class="quote-sign-right" alt="">
                        </p>
                    </div>

                </div>

            </div>
        </section><!-- #testimonials -->

    </div>
    <!-- end TESTIMONIALS -->

    <!-- ====== 6) OUR TEAM SECTION ====== -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <div class="left">
                                <p class="section_count">06</p>
                            </div>
                            <div class="right">
                                <p class="small_tag">NHÓM CỦA CHÚNG TÔI</p>
                                <h2><span class="theme_color">NHÓM CỦA CHÚNG TÔI</span> GỒM NHỮNG THÀNH VIÊN CÓ NIỀM ĐAM
                                    MÊ VỚI THIẾT KẾ WEBSITE</h2>
                                <p class="large">Thông tin về các thành viên</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container mb-5">

        <!-- our-team -->
        <div class="team">

            <div class="row clearfix">
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="media">
                            <img class="align-self-center mr-3" src="images/ourteam/avatar1.jpg" alt="avatar">
                            <div class="media-body">
                                <h4>Lê Hoàng Huy</h4>
                                <h5>Thành viên</h5>
                                <ul class="tag clearfix">
                                    <li class="btn">HTML</li>
                                    <li class="btn">CSS</li>
                                    <li class="btn">JS</li>
                                    <li class="btn">Photoshop</li>
                                </ul>

                                <ul class="social_icons">
                                    <li><a href="https://www.facebook.com/lehoanghuy.97" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.facebook.com/lehoanghuy.97" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/lehoanghuy.97" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-justify mt-3">
                            Tốt nghiệp trường đại học Bách Khoa TpHCM. Có hơn 2 năm kinh nghiệm về thiết kế website.
                            Thông thạo những ngôn ngữ lập trình web mới nhất như HTML5, CSS3, JavaScript, ... <br>
                            Châm ngôn: "Luôn dành 100% nổ lực cho mỗi dự án."
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 offset-lg-1 col-xl-4 offset-xl-2">
                    <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="media">
                            <img class="align-self-center mr-3" src="images/ourteam/avatar2.jpg" alt="avatar">
                            <div class="media-body">
                                <h4>Nguyễn Lục Sâm Bảo</h4>
                                <h5>Thành viên</h5>
                                <ul class="tag clearfix">
                                    <li class="btn">HTML</li>
                                    <li class="btn">CSS</li>
                                    <li class="btn">JS</li>
                                    <li class="btn">Photoshop</li>
                                </ul>

                                <ul class="social_icons">
                                    <li><a href="https://www.facebook.com/sambao1999" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.facebook.com/sambao1999" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/sambao1999" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-justify mt-3">
                            Tốt nghiệp trường đại học Bách Khoa TpHCM. Có hơn 1 năm kinh nghiệm về thiết kế website.
                            Thông thạo những ngôn ngữ lập trình web mới nhất như HTML5, CSS3, JavaScript, ... và những
                            thu
                            viện hot hiện tại.
                        </p>
                    </div>
                </div>
                <!--/.col-lg-4 -->
            </div>
            <!--/.row -->
            <div class="row team-bar">
                <div class="first-one-arrow hidden-xs">
                    <hr>
                </div>
                <div class="first-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-up"></i>
                </div>
                <div class="second-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-down"></i>
                </div>
                <div class="third-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-up"></i>
                </div>
                <div class="fourth-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-down"></i>
                </div>
            </div>
            <!--skill_border-->

            <div class="row clearfix">
                <div class="col-12 col-md-6 col-lg-5 offset-lg-1 col-xl-4 offset-xl-1">
                    <div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="media">
                            <img class="align-self-center mr-3" src="images/ourteam/avatar3.jpg" alt="avatar">
                            <div class="media-body">
                                <h4>Huỳnh Phương Thức</h4>
                                <h5>Thành viên</h5>
                                <ul class="tag clearfix">
                                    <li class="btn">HTML</li>
                                    <li class="btn">CSS</li>
                                    <li class="btn">JS</li>
                                    <li class="btn">Photoshop</li>
                                </ul>

                                <ul class="social_icons">
                                    <li><a href="https://www.facebook.com/gladtoseeyouheree" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.facebook.com/gladtoseeyouheree" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/gladtoseeyouheree" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-justify mt-3">
                            Tốt nghiệp trường đại học Bách Khoa TpHCM. Có hơn 1 năm kinh nghiệm về thiết kế website.
                            Thông thạo những ngôn ngữ lập trình web mới nhất như HTML5, CSS3, JavaScript, ... <br>

                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 offset-lg-1 col-xl-4 offset-xl-2">
                    <div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="media">
                            <img class="align-self-center mr-3" src="images/ourteam/avatar4.png" alt="avatar">
                            <div class="media-body">
                                <h4>Vũ Ngọc Thiên Long</h4>
                                <h5>Thành viên</h5>
                                <ul class="tag clearfix">
                                    <li class="btn">HTML</li>
                                    <li class="btn">CSS</li>
                                    <li class="btn">JS</li>
                                    <li class="btn">Photoshop</li>
                                </ul>

                                <ul class="social_icons">
                                    <li><a href="https://www.facebook.com/ThienLongBKIT" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.facebook.com/ThienLongBKIT" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/ThienLongBKIT" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-justify mt-3">
                            Tốt nghiệp trường đại học Bách Khoa TpHCM. Có hơn 1 năm kinh nghiệm về thiết kế website.
                            Thông thạo những ngôn ngữ lập trình web mới nhất như HTML5, CSS3, JavaScript, ... <br>

                        </p>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--section-->
    </div>

    <!--/.container-->
    <!-- end OUR TEAM -->

    <!-- ====== FOOTER ====== -->
    <?php include("include/footer.php") ?>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="lib/bootstrap/jquery.min.js"></script>
    <script src="lib/bootstrap/popper.min.js"></script>
    <script src="lib/bootstrap/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="lib/pogo-slider/jquery.pogo-slider.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/homepage/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/homepage/wow.min.js"></script>
    <script src="js/homepage/homepage.js"></script>
    <script>
        $(document).ready(function() {
            $("a#home").css("color", "#f2184f");
        })
    </script>
</body>

</html>