<?php
session_start();
if (!isset($_SESSION['adminid'])) {
    header("Location: index.php");
}

include('include/dbconnect.php');

$msg = "";
$cid = $_REQUEST['cid'];
// Update IsRead = 1
$query = "UPDATE contacts SET IsRead=1 WHERE Id= '$cid'";
mysqli_query($con, $query) or die("Error: " . mysqli_error($con));

// Fetch infor by cid
$query = "SELECT * FROM  contacts WHERE Id='$cid'";
$result = mysqli_query($con, $query);
$info = mysqli_fetch_assoc($result);
$status = ($info['IsContact'] == 0) ? "Chưa liên lạc" : "Đã liên lạc";


if (isset($_POST['remark'])) {
    $query = "UPDATE contacts SET IsContact=1 WHERE Id = '$cid'";
    if(mysqli_query($con, $query)){
        $msg = "Cập nhật thành công";
        header("Refresh:1");
    } 
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
                    <li class="breadcrumb-item " aria-current="page"><a href="manage-contact.php">Quản lý liên hệ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết liên hệ</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td scope="row"><b>Tên khách hàng </b></td>
                            <td><?php echo $info['Name'] ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><b>Email </b></td>
                            <td><?php echo $info['Email'] ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><b>Chủ đề </b></td>
                            <td><?php echo $info['Subject'] ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><b>Tin nhắn </b></td>
                            <td><?php echo $info['Message'] ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><b>Ngày gửi </b></td>
                            <td><?php echo $info['PostingDate'] ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><b>Trạng thái xử lý </b></td>
                            <td><?php echo $status ?></td>
                        </tr>
                    </table>
                    <hr>
                    <form method='post' onsubmit="return confirm('Bạn có chắn chắn muốn cập nhật?')">
                        <button type="submit" class="btn btn-outline-info" name='remark'>Đánh dấu đã liên lạc</button>
                    </form>
                    <p style="color: green; margin-top: 1rem"><?php echo $msg ?></p>
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
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('a#manage-contact').addClass('selected');
        });
    </script>
</body>

</html>