<!DOCTYPE html>

<?php 
    session_start();
    if(isset($_SESSION['username']) || empty($_SESSION['username'])) {
      header("Location: ../index.php");
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

	<!-- LOADER -->
	<div id="preloader">
		<div class="loader">
			<img src="../images/loader.gif" alt="#" />
		</div>
	</div>
	<!-- END LOADER -->

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
    $username = "your_name";
    $password = "your_password";
    $hostname = "localhost"; 
    $dbname = "assignment";

    $dbhandle = mysqli_connect($hostname, $username, $password, $dbname);
      if (!$dbhandle) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
    //test
    $sql_user = "SELECT * FROM `users` WHERE `Username` = '{$_SESSION['username']}'";
    $result =  mysqli_query($dbhandle, $sql_user);
    $user = mysqli_fetch_assoc($result);

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
                    <a class="li01 is-active" href="#">Quản lý tài khoản</a>
                  </li>
                  <li>
                    <a class="li02" href="change_pass.php">Đổi mật khẩu</a>
                  </li>
                </ul>
              </div>
              <div class="column columns col-md-8">
                <form method="post" enctype="multipart/form-data" name="inform" onsubmit="return validateForm();">
                  <div class="row">
                    <div class="user-main column col-lg-9">
                      <div class="level title">
                        <p class="level-left">
                          Thông tin tài khoản
                        </p>
                      </div>
                      
                        <div class="form-change-pass user-form">
                          <div class="field">
                            <p class="txt">Email:</p>
                            <p class="control">
                              <input
                                id="email"
                                class="input"
                                type="email"
                                name="user_email"
                                value = "<?php echo $user["Email"] ?>"
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
                            <p class="txt">Họ và Tên</p>
                            <p class="control">
                              <input
                                class="input"
                                type="text"
                                id="fullname"
                                name="fullname"
                                value="<?php echo $user["Fullname"] ?>"
                              />
                            </p>
                          </div>
                          <div class="field">
                            <p class="txt">Điện thoại</p>
                            <p class="control">
                              <input
                                class="input"
                                id="number"
                                name="phone"
                                type="number"
                                value="<?php echo $user['Tel']; ?>"
                              />
                            </p>
                          </div>
                          

                        </div>
                    </div>
                    <div class="column col-lg-3 ">
                      <div class="img d-flex justify-content-center">
                        <img
                          class="image-avatar"
                          id="uploaded_image"
                          src="<?php echo ($user['Image']) == ""? "../upload/user-avatar/noavatar.png":"../upload/user-avatar/".$user['Image'] ; ?>"
                          alt="Avatar"
                        />
                        
                      </div>
                      <input
                        type="file"
                        name="file"
                        id="file"
                        style="display:none"
                      />
                      <div class="d-flex justify-content-center">
                        <button type="button" onclick= "document.getElementById('file').click();" class=" btn btn-danger btn-avatar">Chọn hình</button>
                      </div>
                      
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
    <script>

      let edited = false;

      document.getElementById("sub-btn").addEventListener('click', event => {
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
      require('./validate.php');

      if($_SERVER['REQUEST_METHOD'] === 'POST')  {

        //update inform
        if(validate($_POST['user_email'], $_POST['phone'])) {
          $edit_sql = "UPDATE `users` SET `Email` = '{$_POST['user_email']}', `Fullname` = '{$_POST['fullname']}', `Tel` = '{$_POST['phone']}' WHERE `username` = '{$_SESSION['username']}'";
          mysqli_query($dbhandle, $edit_sql);
        }
       
        //update avatar
        if(!empty($_FILES["file"]["name"])) {
          srand(time());

          // $filename = $_FILES["file"]["name"]; 

          $test = explode('.', $_FILES["file"]["name"]);
          $ext = end($test);
          $name = rand() . '.' . $ext;

          $tempname = $_FILES["file"]["tmp_name"];

          $folder = "../upload/user-avatar/".$name;

          unlink("../upload/user-avatar/".$user['Avatar']);
          $sql_image = "UPDATE `users` SET `Image` = '{$name}' WHERE `Username` = '{$_SESSION['username']}'";
          mysqli_query($dbhandle, $sql_image);

          move_uploaded_file($tempname, $folder);
        }
        ?>
        <script type="text/javascript">
          window.location = "http://localhost/users/edit_information.php";
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

  <script src="../js/Edit_inf/edit_inf.js"></script>

	<!-- ALL JS FILES -->
	<script src="../lib/bootstrap/jquery.min.js"></script>
	<script src="../lib/bootstrap/popper.min.js"></script>
	<script src="../lib/bootstrap/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<!-- <script src="js/contact/contact-form-script.js"></script>
	<script src="../js/contact/form-validator.min.js"></script> -->
	<script src="../js/smoothscroll.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/images-loded.min.js"></script>
  <script src="../js/custom.js"></script>
  <script src="../js/upload_image/upload_image.js"></script>


</body>

</html>