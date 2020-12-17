<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Add User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- add-user style -->
    <link rel="stylesheet" href='css/add-user.css'>
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
                    <li class="breadcrumb-item" aria-current="page">Quản lý thành viên</li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm thành viên</li>
                </ol>
            </nav>
            <div id="respone-status" class="text-center"></div>
            <form id="add-form" class="form row">
                <div class="col-6">
                    <div class="form-control-custom">
                        <label>Tên tài khoản</label>
                        <input type="text" placeholder="hoanghuy123" id="username" name="username" />
                        <i class="fa fa-check-circle"></i>
                        <i class="fa fa-exclamation-circle"></i>
                        <small>Thông báo lỗi</small>
                    </div>
                    <div class="form-control-custom">
                        <label>Mật khẩu</label>
                        <input type="password" placeholder="MatkhauDay" id="password" name="password" />
                        <i class="fa fa-check-circle"></i>
                        <i class="fa fa-exclamation-circle"></i>
                        <small>Thông báo lỗi</small>
                    </div>
                    <div class="form-control-custom">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" placeholder="MatKhauDay" id="password2" name="password2" />
                        <i class="fa fa-check-circle"></i>
                        <i class="fa fa-exclamation-circle"></i>
                        <small>Thông báo lỗi</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-control-custom">
                        <label>Email</label>
                        <input type="email" placeholder="huy@gmail.com" id="email" name="email" />
                        <i class="fa fa-check-circle"></i>
                        <i class="fa fa-exclamation-circle"></i>
                        <small>Thông báo lỗi</small>
                    </div>
                    <div class="form-control-custom">
                        <label>Tên đầy đủ</label>
                        <input type="text" placeholder="Lê Hoàng Huy" id="fullname" name="fullname" />
                        <i class="fa fa-check-circle"></i>
                        <i class="fa fa-exclamation-circle"></i>
                    </div>
                    <div class="form-control-custom">
                        <label>Loại thành viên</label><br>
                        <div class="d-flex align-items-center radio">
                            <input type="radio" id="normal" name="type" value="normal" checked>
                            <label> Normal </label>
                            <input type="radio" id="vip" name="type" value="VIP">
                            <label> VIP </label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-control-custom">
                        <label>Ảnh đại diện</label><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image">
                            <label class="custom-file-label" for="image">Chọn ảnh</label>
                        </div>
                        <small id="image-status">Tệp ảnh phải có đuôi là gif, png, jpg, jpeg</small>
                    </div>
                </div>
                <div class="col-12">
                    <button type='submit' name='add' id="add">Thêm thành viên</button>
                </div>
            </form>
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
    <script src="js/add-user.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
            $('a#manage-users').addClass('selected');
            $('a#manage-users').attr('aria-expanded', 'true');
            $('#menu-users').addClass('show');
            $('a#add-user').addClass('selected-1');

            $(document).ajaxStart(function() {
                $("#wait").css("display", "block");
            });
            $(document).ajaxComplete(function() {
                $("#wait").css("display", "none");
            });

            // The name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").html(fileName);
            });
        });
    </script>
</body>

</html>