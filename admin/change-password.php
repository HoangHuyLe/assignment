<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Change Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once('include/header.php') ?>

    <div class="wrapper">
        <!-- Side bar -->
        <?php include_once('include/sidebar.php') ?>
        <!-- Page Content  -->
        <div id="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Thay đổi mật khẩu</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form id="change-password-form">
                                <input type="hidden" id="userid" value="<?php echo $_SESSION['userid'] ?>">
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input id="username" name="username" type='text' class="form-control" value="<?php echo $_SESSION['username'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu cũ</label>
                                    <input id="old-password" name="old-password" type='password' class="form-control" required>
                                    <small id="status0" style="color: red;"></small>                                    
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input id="new-password" name="new-password" type='password' class="form-control" required>
                                    <small id="status1" style="color: red;"></small>
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận lại mật khẩu</label>
                                    <input id="password2" name="password2" type='password' class="form-control" required>
                                    <small id="status2" style="color: red;"></small>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary" value="Cập nhật">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- loading indicator -->
    <div id="wait">
        <img src='images/ajax-loader.gif' alt="loader">
    </div>

    <!-- ALL JS FILES -->
    <script src="../lib/bootstrap/jquery.min.js"></script>
    <script src="../lib/bootstrap/popper.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/change-password.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {           
            $('a#change-password').addClass('selected');            
        });
    </script>
</body>

</html>