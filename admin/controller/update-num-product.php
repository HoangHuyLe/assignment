<?php
include("../include/dbconnect.php");

$new_num = $_GET['new_num'];
$query = "UPDATE Page_tbl SET NumProduct='$new_num' WHERE PageType = 'home'";
mysqli_query($con, $query) or die("Error");

echo "Cập nhật thành công";

?>