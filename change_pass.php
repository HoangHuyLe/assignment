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
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
  <?php 
    session_start();
    include("include/header.php"); 
  ?>
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
    $sql_pass = "SELECT `Password` FROM `users` WHERE `Username` = '{$_SESSION['username']}'";
    $result =  mysqli_query($dbhandle, $sql_pass);
    $pass = mysqli_fetch_assoc($result);
    
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
                    <a class="li01 " href="edit_information.php">Quản lý tài khoản</a>
                  </li>
                  <li>
                    <a class="li02 is-active" href="#">Đổi mật khẩu</a>
                  </li>
                </ul>
              </div>
              <div class="column columns col-lg-8">
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
          window.location = "http://localhost/change_pass.php";
        </script>
        <?php
        
      }
    ?>

	<!-- ====== FOOTER ====== -->
  <?php include("include/footer.php") ?>
	<!-- #footer -->

	<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>


	<!-- ALL JS FILES -->
	<script src="lib/bootstrap/jquery.min.js"></script>
	<script src="lib/bootstrap/popper.min.js"></script>
	<script src="lib/bootstrap/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<!-- <script src="js/contact/contact-form-script.js"></script> -->
	<script src="js/contact/form-validator.min.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/upload_image/upload_image.js"></script>


</body>

</html>