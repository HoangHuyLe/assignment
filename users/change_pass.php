<!DOCTYPE html>

<?php 
    session_start();
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      header("Location: login.php");
    }
?>

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
      href="../css/edit_inform/styles.css"
    />

	<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css" />
  <!-- Pogo Slider CSS -->
  <link rel="stylesheet" href="../lib/pogo-slider/pogo-slider.min.css" />
  <!-- Ionicons CSS -->
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <!-- Lightbox CSS -->
  <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <!-- Owlcarousel CSS -->
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <!-- Site CSS -->
  <link rel="stylesheet" href="../css/style.css" />
  <!-- Footer CSS -->
  <link rel="stylesheet" href="../css/footer.css" />
  <!-- Homepage CSS-->
  <link rel="stylesheet" href="../css/homepage/animate.min.css" />
  <link rel="stylesheet" href="../css/homepage/homepage.css" />
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="../css/responsive.css" />
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body id="contact" class="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

	<!-- ====== HEADER SECTION ====== -->
  <header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="../images/ultraman_logo.png" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="index.php" id="home">Trang chủ</a></li>
                    <li><a class="nav-link" href="about.php" id="about">Giới thiệu</a></li>
                    <li><a class="nav-link" href="services.php" id="services">Dịch vụ</a></li>
                    <li><a class="nav-link" href="pricelist.php" id="pricelist">Bảng giá</a></li>
                    <li><a class="nav-link" href="contact.php" id="contact">Liên hệ</a></li>
                    <?php
                    if (isset($_SESSION['username']) and !empty($_SESSION['username'])) {
                        if(isset($_SESSION['userimage'])){
                            $avatar = '<img src=../"'.$_SESSION["userimage"].'" class="img-thumbnail mr-2" style="height: 30px;"  />';
                        } else {
                            $avatar = '<i class="fa fa-user-circle mr-2"></i>';
                        }
                        echo 
                        " <div class='dropdown'>
                            <button class='btn dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"
                            . $avatar
                            . $_SESSION['username']
                            . "</button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' href='edit_information.php'>Trang cá nhân</a>
                                <a class='dropdown-item' href='logout.php'>Đăng xuất</a>                                        
                            </div>       
                        </div>                                
                        ";
                    } else {
                        echo 
                        " <li><a class='nav-link' style='background:#f2184f;color:#fff;' href='users/login.php'>Đăng nhập</a>
                            </li>
                        ";
                    }
                    ?>

                </ul>
            </div>
            <div class="search-box">
                <input type="text" class="search-txt" placeholder="Tìm kiếm sản phẩm" id="key">
                <a class="search-btn" href="javascript:;" onclick = "this.href='search-result.php?keysearch=' + document.getElementById('key').value">
                    <img src="../images/search_icon.png" alt="#" />
                </a>
            </div>
        </div>
    </nav>
  </header>
	<!-- End header -->

  <?php
    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "assignment";

    $dbhandle = mysqli_connect($hostname, $username, $password, $dbname);
      if (!$dbhandle) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
    //test
    $sql_pass = "SELECT `Password` FROM `users` WHERE `Username` = '{$_SESSION['username']}'";
    $result =  mysqli_query($dbhandle, $sql_pass);
    $pass = mysqli_fetch_assoc($result);
    
  ?>
	
	<div class="outsite">
      <title>Sửa Thông Tin Cá Nhân</title>
      <section class="main-content" style="background-color: rgb(233, 233, 233);">
        <div class="container-fluid">
          <div class="back-pad" style="padding-right: 75px; padding-left: 75px;">
            <div class="messages columns row ad">
              <div class="column col-md-4">
                <ul class="nav-user">
                  <li>
                    <a class="li01 " href="edit_information.php">Quản lý tài khoản</a>
                  </li>
                  <li>
                    <a class="li02 is-active" href="#">Đổi mật khẩu</a>
                  </li>
                </ul>
              </div>
              <div class="column columns col-md-8">
                <form method="post" enctype="multipart/form-data" name="inform">
                  <div class="row">
                    <div class="user-main column col-lg-9">
                      <div class="level title">
                        <p class="level-left">
                          Đổi mật khẩu
                        </p>
                      </div>
                      
                        <div class="form-change-pass user-form">
                          <div class="field">
                            <p class="txt">Nhập mật khẩu cũ:</p>
                            <p class="control">
                              <input
                                class="input"
                                type="password"
                                name="old_pass"
                              />
                            </p>
                          </div>
                        </div>
                        <div class="form-change-pass user-form">
                          <div class="field">
                            <p class="txt">Nhập mật khẩu mới:</p>
                            <p class="control">
                              <input
                                class="input"
                                type="password"
                                name="new_pass"
                              />
                            </p>
                          </div>
                          <div class="field">
                            <p class="txt">Xác nhận lại mật khẩu:</p>
                            <p class="control">
                              <input
                                class="input"
                                type="password"
                                name="confirm_pass"
                              />
                            </p>
                          </div>

                        </div>
                    </div>
                    <div class="column col-lg-3 ">

                    </div>
                  </div>
                  <div class="row">
                    <div class="field col-lg-9">
                      <p class="control">
                        <div class="d-flex justify-content-center">
                          <button style="margin-bottom:20px" id="sub-btn" class="btn btn-danger" name= "upload" type="submit" >
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
    
    <script type="text/javascript">
      
      let edited = false;

      document.getElementById("sub-btn").addEventListener('click', event => {
          if(document.inform.old_pass.value != <?php echo $pass['Password']; ?> ) { //f password insecurity
            alert("Mật khẩu cũ không khớp.");
            event.preventDefault();
          }else if(document.inform.new_pass.value == "" || document.inform.confirm_pass.value == "") {
            alert("Mật khẩu mới không hợp lệ.");
            event.preventDefault();
          }else if(document.inform.new_pass.value != document.inform.confirm_pass.value) {
            alert("Mật khẩu nhập lại không khớp.");
            event.preventDefault();
          }
          
          edited = true;
      })

      document.querySelectorAll('.input').forEach(item => {
        item.addEventListener('click', event => {
          window.addEventListener("beforeunload", e => {
            if(edited) {
              return false;
            }else {
              e.returnValue = "Blah Blah...";
            }
            
          })
        })
      })

    </script>

    <?php

      if($_SERVER['REQUEST_METHOD'] === 'POST')  {
        $change_pass ="";
        $sql_pass = "UPDATE `users` SET `Password` = '{$_POST['new_pass']}' WHERE `Username` = '{$_SESSION['username']}'";
        mysqli_query($dbhandle, $sql_pass);
        
        ?>
        <script type="text/javascript">
          alert("Cập nhật thành công")
          window.location = "http://localhost/assignment/users/change_pass.php";
        </script>
        <?php
        
      }

      mysqli_close($dbhandle);
    ?>

	<!-- ====== FOOTER ====== -->
  <footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <img src="../images/ultraman_logo.png" alt="logo">
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
                        <strong>Điện thoại:</strong> (+84) 358 12 17 19<br>
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
                    <h4>Yêu cầu tư vấn</h4>
                    <p> Điền thông tin số điện thoại hoặc email để nhận cuộc gọi, email từ chuyên viên tư vấn thiết
                        kế website</p>
                    <form>
                        <input type="email" name="email"><input type="submit" value="Gửi">
                    </form>
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
  </footer>
	<!-- #footer -->

	<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>


	<!-- ALL JS FILES -->
	<script src="../lib/bootstrap/jquery.min.js"></script>
	<script src="../lib/bootstrap/popper.min.js"></script>
	<script src="../lib/bootstrap/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<!-- <script src="../js/contact/contact-form-script.js"></script> -->
	<!-- <script src="../js/contact/form-validator.min.js"></script> -->
	<script src="../js/smoothscroll.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/images-loded.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/upload_image/upload_image.js"></script>


</body>

</html>