<?php
include("../include/dbconnect.php");

$query = "SELECT NumProduct FROM Page_tbl WHERE PageType = 'home'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

echo $row['NumProduct'];

?>