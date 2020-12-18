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
    $sql_email = "SELECT `Email` FROM `users` WHERE `Username` = '{$_SESSION['username']}'";
    $result =  mysqli_query($dbhandle, $sql_email);
    $email = mysqli_fetch_assoc($result);


    //Check if data already exist in user inf table
    $check = mysqli_query($dbhandle, "SELECT `username` FROM `user_information` WHERE `username` = '{$_SESSION['username']}'");

    if(mysqli_num_rows($check) <= 0) {  //if there is none
      $insert_sql = "INSERT INTO `user_information` (`username`) VALUES ('{$_SESSION['username']}')";
      mysqli_query($dbhandle, $insert_sql);
    }

    $user_sql = mysqli_query($dbhandle, "SELECT * FROM `user_information` WHERE `username` = '{$_SESSION['username']}'");
    $user = mysqli_fetch_assoc($user_sql);
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
                    <a class="li01 is-active" href="#">Quản lý tài khoản</a>
                  </li>
                  <li>
                    <a class="li02" href="change_pass.php">Đổi mật khẩu</a>
                  </li>
                </ul>
              </div>
              <div class="column columns col-lg-8">
                <form method="post" enctype="multipart/form-data" name="inform" onsubmit="return valid();">
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
                                class="input"
                                type="email"
                                name="user_email"
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
                                value="<?php echo $user['Last Name']; ?>"
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
                                value="<?php echo $user['First Name']; ?>"
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
                                value="<?php echo $user['DoB']; ?>"
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
                                value="<?php echo $user['Tel']; ?>"
                              />
                            </p>
                          </div>
                          <div class="field user-field">
                            <span class="txt">Giới tính</span>
                            <input
                              class="input"
                              type="radio"
                              id="sex1"
                              name="sex"
                              value="M"
                              <?php
                                echo ($user['Sex'] == 'M')? 'checked':'';
                              ?>
                            />
                            <label for="sex1">Nam</label>
                            <input
                              class="input"
                              type="radio"
                              id="sex2"
                              name="sex"
                              value="F"
                              <?php
                                echo ($user['Sex'] == 'F')? 'checked':'';
                              ?>
                            />
                            <label for="sex2">Nữ</label>
                          </div>

                        </div>
                    </div>
                    <div class="column col-lg-3 ">
                      <div class="img d-flex justify-content-center">
                        <img
                          class="image-avatar"
                          id="uploaded_image"
                          src="<?php echo $user['Avatar']; ?>"
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
      function valid() {
        if(document.inform.last_name.value.length == 0 || document.inform.first_name.value.length == 0) {
          alert("Please fill in your name.");
          return false;
        }else return true;
      }

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

      if($_SERVER['REQUEST_METHOD'] === 'POST')  {

        //update inform
        $edit_sql = "UPDATE `user_information` SET `Last Name` = '{$_POST['last_name']}', `First Name` = '{$_POST['first_name']}', `DoB` = '{$_POST['birthday']}', `Tel` = '{$_POST['phone']}', `Sex` = '{$_POST['sex']}' WHERE `username` = '{$_SESSION['username']}'";
        mysqli_query($dbhandle, $edit_sql);
        //update email
        mysqli_query($dbhandle, "UPDATE `users` SET `Email` = '{$_POST['user_email']}' WHERE `username` = '{$_SESSION['username']}'");

        //update avatar
        if(!empty($_FILES["file"]["name"])) {
          srand(time());

          // $filename = $_FILES["file"]["name"]; 

          $test = explode('.', $_FILES["file"]["name"]);
          $ext = end($test);
          $name = rand() . '.' . $ext;

          $tempname = $_FILES["file"]["tmp_name"];

          $folder = "./upload/user-avatar/".$name;

          unlink($user['Avatar']);
          $sql_image = "UPDATE `user_information` SET `Avatar` = '{$folder}' WHERE `username` = '{$_SESSION['username']}'";
          mysqli_query($dbhandle, $sql_image);

          move_uploaded_file($tempname, $folder);
        }
        ?>
        <script type="text/javascript">
          window.location = "http://localhost/edit_information.php";
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