<?php
session_start();
include("include/dbconnect.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];    
    $query = "SELECT * FROM admin_tbl WHERE Username='$username' AND Password='$password' ";
    $result = mysqli_query($con, $query);    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $row['Id'];
        $_SESSION['username'] = $username;        
        header('Location: dashboard.php');
        
    } else {
        $message = "Tài khoản hoặc mật khẩu không hợp lệ!";
    }    
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ultraman | Admin login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../images/ultraman_logo.png" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <h3 class="title">Admin Panel</h3>
                </div>                             
                <div class="d-flex justify-content-center">                                    
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_user" value="" required placeholder="Tên tài khoản">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value="" required placeholder="Mật khẩu">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="login" class="btn login_btn">Đăng nhập</button>
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <p style="color: #c0392b;"> <?php if(!empty($message)) echo $message ?> </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>