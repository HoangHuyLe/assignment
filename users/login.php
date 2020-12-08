<?php
session_start();
include("include/dbconnect.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];  
    $query = "SELECT * FROM users WHERE Username='$username' AND Password='$password' ";
    $result = mysqli_query($con, $query);
    if(!$result){
        die("Invalid query: " . mysqli_error($con));
    }       
    if(mysqli_num_rows($result) == 1){
        $account = mysqli_fetch_array($result);
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $account['Id'];
        $_SESSION['logged'] = true;
        header('Location: ../index.php');
        exit;
    }
    else {
        echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không hợp lệ!');</script>";;
    }
}
?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <img src="../images/ultraman_logo.png" alt="logo">
                </div>
                <div class="row mt-5">
                    <img src="images/login_bg.png" alt="bg" class="login-bg">
                </div>
            </div>
            <div class="col-6 px-4 py-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <button type="button" class="facebook">
                            <i class="fa fa-facebook mr-2"></i>
                            Đăng nhập qua Facebook
                        </button>
                    </div>
                    <div class="col-12 col-lg-6">
                        <button type="button" class="google">
                            <i class="fa fa-google mr-2"></i>
                            Đăng nhập qua Google
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="line"></div>
                    <span class="or">Hoặc</span>
                    <div class="line"></div>
                </div>
                <div class="row mt-3">
                    <form class="w-100" method="post">
                        <div class="form-group">
                            <label for="username">Tên tài khoản </label>
                            <input type="username" class="form-control" name="username" id="username"
                                placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Nhập mật khẩu">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100"><i class="fa fa-lock"></i> Đăng nhập</button>
                    </form>
                </div>
                <div class="row mt-4">
                    <p><a href="#">Quên mật khẩu?</a></p>
                    <div class="w-100"></div>
                    <p>Bạn không có tài khoản? <a href="registration.php">Đăng ký</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            &copy; Copyright <strong>Ultraman</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by Ultraman Company
        </div>
    </div>

</body>

</html>