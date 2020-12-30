<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng ký</title>

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
            <div class="col-6" id='leftcol-register'>
                <div class="row">
                    <img src="../images/ultraman_logo.png" alt="logo">
                </div>
                <div class="row mt-5">
                    <img src="images/login_bg.png" alt="bg" class="login-bg">
                </div>
            </div>
            <div class="col-12 col-sm-6 px-4 py-3">
                <div class="row">
                    <a href="login.php">
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        Quay lại trang Đăng nhập
                    </a>
                </div>
                <div class="row mt-2">
                    <div class="line"></div>
                    <span class="or">Hoặc</span>
                    <div class="line"></div>
                </div>
                <div class="row mt-3">
                    <span id="register-status" style="font-size:15px;"></span>
                    <form class="w-100" method="post" onsubmit="insertAccount()">
                        <div class="form-group">
                            <label for="username">Tên tài khoản </label>
                            <input type="text" class="form-control" name="username" id="username" onblur="validateUsername()" required placeholder="Nhập tên tài khoản">
                            <span id="username-status" style="font-size:12px;"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Địa chỉ Email </label>
                            <input type="email" class="form-control" name="email" id="email" onblur="validateEmail()" required placeholder="Nhập email hợp lệ">
                            <span id="email-status" style="font-size:12px;"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" onblur="validatePassword()" required placeholder="Nhập mật khẩu">
                            <span id="password-status" style="font-size:12px;"></span>
                        </div>
                        <div class="form-group">
                            <label for="repassword">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="repassword" id="repassword" onblur="validateRepassword()" required placeholder="Nhập lại mật khẩu">
                            <span id="repassword-status" style="font-size:12px;"></span>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </form>
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

    <!-- ALL JS FILES -->
    <script src="../lib/bootstrap/jquery.min.js"></script>
    <script src="../lib/bootstrap/popper.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/registration.js"></script>
    <script>
        function insertAccount() {            
            $.ajax({
                url: "insert-account.php",
                data: {
                    username: $("#username").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    repassword: $("#repassword").val()
                },
                type: "POST",
                success: function(data) {
                    $("#register-status").html(data);
                },
                error: function() {}
            });
            event.preventDefault();
        }
    </script>
</body>

</html>