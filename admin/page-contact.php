<?php
session_start();
if(!isset($_SESSION['adminid'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Web Page Contact</title>
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
                    <li class="breadcrumb-item" aria-current="page">Web pages</li>
                    <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                </ol>
            </nav>

            <div class="card">
                <h5 class="card-header"> Cập nhật thông tin liên hệ</h5>
                <div class="card-body">
                    <form id="contact-form">
                        <div class="form-group">
                            <label>Mô tả trang</label>
                            <textarea id="pagedesc" name="pagedesc" class="form-control" rows='4' required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input id="address" name="address" type='text' class="form-control" required >
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email 1</label>
                                    <input id='email1' name="email1" type='text' class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email 2</label>
                                    <input id="email2" name="email2" type='text' class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>SĐT 1</label>
                                    <input id="phone1" name="phone1" type='text' class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>SĐT 2</label>
                                    <input id="phone2" name="phone2" type='text' class="form-control">
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary mr-5" value="Cập nhật"> 
                        <span style="color: green;" id="status"></span>
                    </form>
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
    <script src="js/page-contact.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {            
            $('a#manage-pages').addClass('selected');
            $('a#manage-pages').attr('aria-expanded', 'true');
            $('#menu-pages').addClass('show');
            $('a#page-contact').addClass('selected-1');
        });
    </script>

</body>

</html>