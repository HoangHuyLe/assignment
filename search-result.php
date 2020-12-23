<?php
session_start();
include_once('include/dbconnect.php');
$notfound = "";
$products = array();

if (isset($_REQUEST['keysearch'])) {
    $keyseach = $_REQUEST['keysearch'];
    $query = "SELECT * FROM products WHERE Title Like" . "'%$keyseach%'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0) {
        $notfound = "Không tìm thấy kết quả.";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $product = array(
                'title' => $row['Title'],
                'image' => $row['Image'],
                'link' => $row['Link'],
                'completedate' => $row['CompleteDate']
            );
            array_push($products, $product);
        }
    }
    echo '<script>';
    echo 'console.log(' . json_encode($products) . ')';
    echo '</script>';
}

mysqli_close($con);
?>

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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="lib/pogo-slider/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Footer CSS -->
    <link rel="stylesheet" href="css/footer.css" />
    <!-- Contact CSS -->
    <link rel="stylesheet" href="css/contact/contact.css" />

</head>

<body id="contact" class="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- ====== HEADER SECTION ====== -->
    <?php include("include/header.php") ?>

    <!-- Start Banner -->
    <div class="section inner_page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="full">
                        <h3>Kết quả tìm kiếm</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Banner -->


    <!-- section -->
    <div class="section layout_padding mb-5">
        <div class="container">
            <div class="row mb-5">
                <?php
                if ($notfound != '') {
                    echo "<h3>" . $notfound . "</h3>";
                } else {
                    foreach ($products as $product) {
                        echo "<div class='col-4'>";
                        echo '<div class="card">';                       
                        echo '<img class="card-img-top" src="upload/products/' .$product['image']  .'" alt="image">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $product['title'] . '</h5>';
                        echo '<p class="card-text">Link: ' . $product['link']  . '</p>';
                        echo '<p class="card-text">Ngày hoàn thành: ' . $product['completedate']  . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo "</div>";
                    }
                }
                ?>


            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- ====== FOOTER ====== -->
    <?php include("include/footer.php") ?>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>


    <!-- ALL JS FILES -->
    <script src="lib/bootstrap/jquery.min.js"></script>
    <script src="lib/bootstrap/popper.min.js"></script>
    <script src="lib/bootstrap/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/smoothscroll.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>