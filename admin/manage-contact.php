<?php
session_start();
if (!isset($_SESSION['adminid'])) {
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
    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
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
                    <li class="breadcrumb-item active" aria-current="page">Quản lý liên hệ</li>
                </ol>
            </nav>
            <div>
                <table id="tbl-contacts" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên khách hàng</th>                            
                            <th scope="col">SĐT</th>
                            <th scope="col">Chủ đề</th>
                            <th scope="col">Ngày gửi</th>
                            <th scope="col">Đã đọc?</th>                            
                            <th scope="col" width="20%">Thao tác</th>
                        </tr>
                    </thead>
                </table>
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
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/manage-contact.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('a#manage-contact').addClass('selected');
        });
    </script>
</body>

</html>