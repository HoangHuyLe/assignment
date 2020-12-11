<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Thông tin chung</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-3">
                    <div class="card text-white bg-success text-center box">
                        <div class="card-header">Tổng số Pages</div>
                        <div class="card-body">
                            <h5 class="card-title">5</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-danger text-center box">
                        <div class="card-header">Tổng số thành viên</div>
                        <div class="card-body">
                            <h5 class="card-title">5</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-warning text-center box">
                        <div class="card-header">Yêu cầu từ khách hàng</div>
                        <div class="card-body">
                            <h5 class="card-title">5</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">

                </div>
            </div>
            <div class="line"></div>

        </div>
    </div>

    <!-- ALL JS FILES -->
    <script src="../lib/bootstrap/jquery.min.js"></script>
    <script src="../lib/bootstrap/popper.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                // Close all drop-down menu
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
            $('a#dashboard').addClass('selected');
        });
    </script>
</body>

</html>