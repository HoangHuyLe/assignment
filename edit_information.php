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

	<link
      rel="stylesheet"
      type="text/css"
      href="./css/edit_inform/styles.css"
    />

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
	<!-- Contact CSS -->
	<link rel="stylesheet" href="css/contact/contact.css" />

</head>

<body id="contact" class="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

	<!-- LOADER -->
	<div id="preloader">
		<div class="loader">
			<img src="images/loader.gif" alt="#" />
		</div>
	</div>
	<!-- END LOADER -->

	<!-- ====== HEADER SECTION ====== -->
	<header class="top-header">
		<nav class="navbar header-nav navbar-expand-lg ">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html"><img src="images/ultraman_logo.png" alt="image"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
					aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
					<ul class="navbar-nav">
						<li><a class="nav-link" href="index.html">Trang chủ</a></li>
						<li><a class="nav-link" href="about.html">Giới thiệu</a></li>
						<li><a class="nav-link" href="services.html">Dịch vụ</a></li>
						<li><a class="nav-link" href="pricelist.html">Bảng giá</a></li>
						<li><a class="nav-link" style="color: #f2184f" href="contact.html">Liên hệ</a></li>
						<li><a class="nav-link" style="background:#f2184f;color:#fff;" href="#">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="search-box">
					<input type="text" class="search-txt" placeholder="Search">
					<a class="search-btn">
						<img src="images/search_icon.png" alt="#" />
					</a>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

  <?php
    $username = "your_name";
    $password = "your_password";
    $hostname = "localhost"; 
    $dbname = "assignment";

    $dbhandle = mysqli_connect($hostname, $username, $password, $dbname);
      if (!$dbhandle) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
    //test
    $sql_email = "SELECT `Email` FROM `users` WHERE `id` = 1";
    $result =  mysqli_query($dbhandle, $sql_email);
    $email = mysqli_fetch_assoc($result);


    //Check if data already exist
    $is_exist = false;
    $user_sql = "";
    $check = mysqli_query($dbhandle, "SELECT `Uid` FROM `user_information` WHERE `Uid` = 1");

    if(mysqli_num_rows($check) > 0) {
      $is_exist = true;
      $user_sql = mysqli_query($dbhandle, "SELECT * FROM `user_information` WHERE `Uid` = 1");
      $user = mysqli_fetch_assoc($user_sql);
    }
  ?>
	
	<div class="outsite">
      <title>Sửa Thông Tin Cá Nhân</title>
      <section class="main-content" style="background-color: rgb(233, 233, 233);">
        <div class="container-fluid">
          <div style="padding-right: 75px; padding-left: 75px;">
            <div class="messages columns row">
              <div class="column col-lg-4">
                <ul class="nav-user">
                  <li>
                    <a class="li01 is-active" href="">Quản lý tài khoản</a>
                  </li>
                  <li>
                    <a class="li02" href="">Đổi mật khẩu</a>
                  </li>
                  <li>
                    <a class="li03" href="">Services</a>
                  </li>
                </ul>
              </div>
              <div class="column columns col-lg-8">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="user-main column col-lg-9">
                      <div class="level title">
                        <p class="level-left">
                          Thông tin tài khoản
                        </p>
                      </div>
                      
                        <div class="form-change-pass">
                          <div class="field">
                            <p class="txt">Email:</p>
                            <p class="control">
                              <input
                                class="input"
                                type="email"
                                disabled=""
                                value = "<?php echo $email["Email"] ?>"
                              />
                            </p>
                          </div>
                        </div>
                        <div class="level title user-title">
                          <p class="level-left">
                            Thông tin cá nhân
                          </p>
                        </div>
                        <div class="form-change-pass user-form">
                          <div class="field">
                            <p class="txt">Họ</p>
                            <p class="control">
                              <input
                                class="input"
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="<?php echo ($is_exist)? $user['Last Name']:''; ?>"
                              />
                            </p>
                          </div>
                          <div class="field">
                            <p class="txt">Tên</p>
                            <p class="control">
                              <input
                                class="input"
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="<?php echo ($is_exist)? $user['First Name']:''; ?>"
                              />
                            </p>
                          </div>
                          <div class="field">
                            <p class="txt">Ngày sinh</p>
                            <p class="control">
                              <input
                                class="input"
                                type="date"
                                id="birthday"
                                name="birthday"
                                value="<?php echo ($is_exist)? $user['DoB']:''; ?>"
                              />
                            </p>
                          </div>
                          <div class="field">
                            <p class="txt">Điện thoại</p>
                            <p class="control">
                              <input
                                class="input"
                                id="phone"
                                name="phone"
                                type="number"
                                value="<?php echo ($is_exist)? $user['Tel']:''; ?>"
                              />
                            </p>
                          </div>
                          <div class="field user-field">
                            <span class="txt">Giới tính</span>
                            <input
                              type="radio"
                              id="gender1"
                              name="gender"
                              value="1"
                              checked=""
                            />
                            <label for="gender1">Nam</label>
                            <input
                              type="radio"
                              id="gender2"
                              name="gender"
                              value="0"
                            />
                            <label for="gender2">Nữ</label>
                          </div>

                        </div>
                    </div>
                    <div class="column col-lg-3 ">
                      <div class="img d-flex justify-content-center">
                        <img
                          class="image-avatar"
                          src="<?php echo $user['Avatar']; ?>"
                          alt="Avatar"
                        />
                        
                      </div>
                      <input
                        type="file"
                        name="file"
                        id="uploadavatar"
                        style="display: none"
                      />
                      <div class="d-flex justify-content-center">
                        <button type="button" onclick= "document.getElementById('uploadavatar').click();" class=" btn btn-danger btn-avatar">Chọn hình</button>
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="field col-lg-9">
                      <p class="control">
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-danger" name= "upload" type="submit" >
                            Lưu
                          </button>
                        </div>
                        
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>

    <?php
      if($_SERVER['REQUEST_METHOD'] === 'POST')  {
        
        // if($is_exist) {
        //   $edit_sql = "UPDATE `user_information` SET `Last Name` = '', `First Name` = '', `DoB` = '', `Tel` = '', `Sex` = ''";
        //   mysqli_query($dbhandle, $edit_sql);
        // }else {
        //   $edit_sql = "INSERT INTO `users` (`Last Name`, `First Name`, `DoB`, `Tel`, `Sex`) VALUES ('','','','','')";
        //   mysqli_query($dbhandle, $edit_sql);
        // }

        if(isset($_POST['upload'])) {

          $filename = $_FILES["file"]["name"]; 
          $tempname = $_FILES["file"]["tmp_name"];

          $folder = "./images/edit_inform/".$filename;

          // $sql_image = "INSERT INTO `user_information` (`Avatar`) VALUES (`$filename`) WHERE `id` = ";
          // mysqli_query($dbhandle, $sql_image);

          move_uploaded_file($tempname, $folder);
        }
        
      }
    ?>

	<!-- ====== FOOTER ====== -->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-3 col-md-6 footer-info">
						<img src="images/ultraman_logo.png" alt="logo">
						<p class="text-justify"> Ultraman là công ty thiết kế web chuyên nghiệp uy tín có trụ sở chính
							tại Tp HCM. Chúng tôi
							thiết kế web theo chuẩn SEO, chuẩn di động. Áp dụng những công nghệ tiên tiến nhất hiện nay
							để thiết kế website như HTML5, CSS3, PHP, Asp.net. Nhằm mang lại sự hiệu quả thực sự cho
							khách hàng</p>
					</div>

					<div class="col-lg-3 col-md-6 footer-links">
						<h4>Links</h4>
						<ul>
							<li><i class="ion-ios-arrow-right"></i> <a href="#">Trang chủ</a></li>
							<li><i class="ion-ios-arrow-right"></i> <a href="#">Giới thiệu</a></li>
							<li><i class="ion-ios-arrow-right"></i> <a href="#">Dịch vụ</a></li>
							<li><i class="ion-ios-arrow-right"></i> <a href="#">Bảng giá</a></li>
							<li><i class="ion-ios-arrow-right"></i> <a href="#">Liên hệ</a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-md-6 footer-contact">
						<h4>Liên hệ</h4>
						<p>
							<strong>Trụ sở chính: </strong> 60 Nguyễn Đình Chiểu, P.Đakao, Q.1, TPHCM <br>
							<strong>Điện thoại:</strong> (+84) 358 121 719<br>
							<strong>Email:</strong> info@ultraman.com<br>
						</p>

						<div class="social-links">
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>

					</div>

					<div class="col-lg-3 col-md-6 footer-advice">
						<!-- <h4>Yêu cầu tư vấn</h4>
						<p> Điền thông tin số điện thoại hoặc email để nhận cuộc gọi, email từ chuyên viên tư vấn thiết
							kế website</p>
						<form>
							<input type="email" name="email"><input type="submit" value="Gửi">
						</form> -->
					</div>

				</div>
			</div>
		</div>

		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong>Ultraman</strong>. All Rights Reserved
			</div>
			<div class="credits">
				Designed by Ultraman Company
			</div>
		</div>
	</footer><!-- #footer -->

	<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>


	<!-- ALL JS FILES -->
	<script src="lib/bootstrap/jquery.min.js"></script>
	<script src="lib/bootstrap/popper.min.js"></script>
	<script src="lib/bootstrap/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/contact/contact-form-script.js"></script>
	<script src="js/contact/form-validator.min.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/custom.js"></script>


</body>

</html>